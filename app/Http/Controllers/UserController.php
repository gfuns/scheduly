<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\CalendarSettings;
use App\Models\AppointmentRequests;
use Illuminate\Support\Facades\Hash;
use Auth;
use SweetAlert;
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
        $recentRequests = AppointmentRequests::where("user_id", Auth::user()->id)->whereDate("created_at", today())->limit(10)->get();
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
        return view('users.request_appointment');
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


}
