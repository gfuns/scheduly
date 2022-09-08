<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function calendar(){
        return view('calendar');
    }

    public function finishUp(){
        return view('finish_up');
    }
}
