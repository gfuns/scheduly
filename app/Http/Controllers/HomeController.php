<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\CalendarSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use SweetAlert;
class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role == 2){
            $params = [
                'registeredUsers' => User::where("role", 1)->count(),
                'appointmentRequests' => 0,
            ];
            return view('admin.dashboard', compact('params'));
        }else{
            return view('home');
        }
        
    }


    /**
     * Show the administrative settings page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function settings(){
        return view('admin.profile');
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
     * Show the administrative settings page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function changePassword(){
        return view('admin.password');
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
     * Show the registered users page.
     *
     * @param  Illuminate\Http\Request  $request
     * @return \App\Models\User
     */
    public function registeredUsers(){
        $users = User::where("role", 1)->get();
        return view('admin.registered_users', compact('users'));
    }


    /**
     * Remove a user instance fron storage.
     *
     * @return \App\Models\User
     */
    public function deleteUser($id){
        $users = User::find($id)->delete();
        alert()->success('User Deleted Successfully.', 'Success!')->persistent('Dismiss');
        return back();
    }


    public function calendarSettings(){
        $calendarSettings = CalendarSettings::all();
        return view('admin.calendar_settings', compact('calendarSettings'));
    }


    public function activateCalendarDay(Request $request){
        $settings = CalendarSettings::where("week_day", $request->day)->first();
        $settings->status = $settings->status == 0 ? 1 : 0;
        if($settings->save()){
            return response()->json(['success' => 'Changes Saved']);
        }else{
            return response()->json(['erorr' => 'Something Went Wrong']);
        }
        
    }


    public function updateStartTime(Request $request){
        $settings = CalendarSettings::where("week_day", preg_replace('/_start/', '', $request->day))->first();
        $settings->start_time = $request->starttime;
        if($settings->save()){
            return response()->json(['success' => 'Changes Saved']);
        }else{
            return response()->json(['erorr' => 'Something Went Wrong']);
        }
    }

    public function updateStopTime(Request $request){
        $settings = CalendarSettings::where("week_day", preg_replace('/_stop/', '', $request->day))->first();
        $settings->stop_time = $request->stoptime;
        if($settings->save()){
            return response()->json(['success' => 'Changes Saved']);
        }else{
            return response()->json(['erorr' => 'Something Went Wrong']);
        }
    }

}