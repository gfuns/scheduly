<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\CalendarSettings;
use App\Models\AppointmentRequests;
use Illuminate\Support\Facades\Hash;
use Auth;
use SweetAlert;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function dashboard(){
        $recentRequests = AppointmentRequests::orderBy("id", "desc")->where("user_id", Auth::user()->id)->whereDate("created_at", today())->limit(5)->get();
        return view('users.dashboard', compact('recentRequests'));
    }

    
    /**
     * Show the user settings page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function settings(){
        return view('users.profile');
    }


    /**
     * Updates a user instance after a successful validation.
     *
     * @param  Illuminate\Http\Request  $request
     * @return \App\Models\User
     */
    public function updateProfile(Request $request){
        $validatedData = $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                ]);
            
            $user = Auth::user();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->organization = $request->organization;
            if($user->save()){
                alert()->success('Profile Updated Successfully.', 'Successful')->persistent("Dismiss");
                return back();
            }else{
                alert()->error('Something went wrong!', 'Error')->persistent("Dismiss");
                return back();
            }
        
    }


    /**
     * Show the users password update page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function changePassword(){
        return view('users.password');
    }


      /**
     * Updates a user instance after a successful validation.
     *
     * @param  Illuminate\Http\Request  $request
     * @return \App\Models\User
     */
    public function updatePassword(Request $request){
        $validatedData = $request->validate([
                'old_password' => 'required',
                'new_password' => 'required',
                'password_confirmation' => 'required',
                ]);

        $user = Auth::user();
        if ($request->new_password != $request->password_confirmation) {
            alert()->error('New Password and Confirm Password do not match.', 'Error!')->persistent('Dismiss');
            return back();
        }
        if (!Hash::check($request->old_password, $user->password)) {
            alert()->error('The old password provided is wrong.', 'Error!')->persistent('Dismiss');
            return back();
        } else {
            $user->password = Hash::make($request->new_password);
            if ($user->save()) {
                alert()->success('Password Changed Successfully.', 'Success!')->persistent('Dismiss');
                return back();
            } else {
                alert()->error('Password Change Failed.', 'Error!')->persistent('Dismiss');
                return back();
            }
        }
        
    }


     /**
     * Show the users appointment request page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showAppointmentForm(){       
        $calendarSettings = CalendarSettings::where("status", 1)->get();
        return view('users.request_appointment', compact("calendarSettings"));
    }

      /**
     * Show the users appointment request page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showFillableAppointmentForm($day){        
        $cal = CalendarSettings::where("week_day", strtoupper($day))->first();
        $availableDates = Collect($this->availableDates(strtolower($cal->day_full)));
        $availableTimes = $this->availableTimes($cal->start_time, $cal->stop_time);
        return view('users.appointment_form', compact("cal", "day", "availableDates", "availableTimes"));
    }


    /**
     * Create an appointment request instance.
     *
     * @param  Illuminate\Http\Request  $request
     * @return \App\Models\AppointmentRequests
     */
    public function requestAppointment(Request $request){
        $validatedData = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'password_confirmation' => 'required',
            ]);
    }


    public function appointmentRequests(){
        $totalRecord = AppointmentRequests::where("user_id", Auth::user()->id)->count();
        $marker = $this->getMarkers($totalRecord, request()->page);
        $appointmentRequests = AppointmentRequests::orderBy("id", "desc")->where("user_id", Auth::user()->id)->paginate(10);
        return view('users.appointment_requests', compact('appointmentRequests', 'totalRecord', 'marker'));
    }


    public function cancelAppointment($id){
        $request = AppointmentRequests::find($id);
        $request->status = "Cancelled";
        if($request->save()){
            alert()->success('Appointment Request Cancelled.', 'Success!')->persistent('Dismiss');
            return back();
        }else{
            alert()->error('Something Went Wrong.', 'Error!')->persistent('Dismiss');
            return back();
        }
    }


    public function getMarkers($lastRecord, $pageNum){
        if($pageNum == null){
            $pageNum = 1;
        }
        $end = (10 * ((int)$pageNum));
        $marker = array();
        if((int)$pageNum == 1){
            $marker["begin"] = (int)$pageNum;
            $marker["index"] = (int)$pageNum;
        }else{
            $marker["begin"] = number_format(((10 * ((int)$pageNum))-9),0);
            $marker["index"] = number_format(((10 * ((int)$pageNum))-9),0);
        }

        if($end > $lastRecord){
            $marker["end"] = number_format($lastRecord,0);
        }else{
            $marker["end"] = number_format($end,0);
        }

        return $marker;
    }


    public function availableDates($day)
    {   
        $firstDay = "first ".$day." of this month";
        $lastDay = "first ".$day." of next month";
        return new \DatePeriod(
            Carbon::parse($firstDay),
            CarbonInterval::week(),
            Carbon::parse($lastDay)
        );
    }


    public function availableTimes($startTime, $stopTime)
    {   
        $startTime = explode(":",$startTime);
        $stopTime = explode(":",$stopTime);
        $timeBegins = $startTime[0];
        $timeEnds = $stopTime[0];

        $availableTimes = collect();
        for($ctr = $timeBegins; $ctr <= $timeEnds; $ctr++){
            $time = $this->padNumber($ctr).":00:00";
            $availableTimes->add($time);
        }

        return $availableTimes;
    }



    public function padNumber($num){
        if(strlen($num) < 2){
            return "0".$num;
        }else{
            return $num;
        }
    }


}
