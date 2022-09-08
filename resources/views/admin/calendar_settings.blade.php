@extends('admin.layouts.app')

@section('content')
@section('title', 'Scheduly  - Calendar Settings')

<!-- MAIN CONTENT -->
<div class="main-content bg-fixed-bottom" >

    @include('admin.layouts.topmenu')

<div class="container-fluid" style="min-height: 500px;">

    <div class="row justify-content-center">
        <div class="col-12 col-lg-8 col-xl-8">

    <!-- Header -->
    <div class="header mt-md-5">
        <div class="header-body">
            <div class="row align-items-center">
                <div class="col">

                    <!-- Pretitle -->
                    <h6 class="header-pretitle">
                        My Account
                    </h6>

                    <!-- Title -->
                    <h1 class="header-title">
                        Settings
                    </h1>

                </div>
            </div> <!-- / .row -->
            <div class="row align-items-center">
                <div class="col">

                    <!-- Nav -->
                    <ul class="nav nav-tabs nav-overflow header-tabs">
                        <li class="nav-item">
                            <a href="{{route('admin.settings')}}" class="nav-link">
                                Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.password')}}" class="nav-link">
                                Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.calendarSettings')}}" class="nav-link active">
                                Calendar Settings
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-12 col-xl-12">
        <!-- Form -->
        <div class="card">
            <div class="card-body">
                <div class="calendar-title">Set your weekly hours</div>
                @foreach($calendarSettings as $cal)
                <div class="row calendar-item">

                    <div id="el1" class="group-day">
                        <div class="checkbox-label">
                            <input id="{{$cal->week_day}}" class="largeCheckbox" type="checkbox" name="{{$cal->week_day}}_checkbox" value="{{$cal->week_day}}" onclick="toggleActive(this)" @if($cal->status == 1) checked @endif/>
                        </div>

                        <div class="day-label">{{$cal->week_day}}</div> 
                    </div>

                    <div id="el2" class="group-calendar-input">
                        <div id="activate{{$cal->week_day}}"  @if($cal->status == 0) style="display:none" @endif>
                            <div class="timer-label">
                                <input id="{{$cal->week_day}}_start" type="time" name="opening_time" value="{{$cal->start_time}}" class="form-control mb-3 " onchange="updateStartTime(this)"/>
                            </div>

                            <div class="separator-label"> <i class="fa fa-minus icon-label"></i> </div>

                            <div class="timer-label">
                                <input id="{{$cal->week_day}}_stop" type="time" name="closing_time" value="{{$cal->stop_time}}" class="form-control mb-3 " onchange="updateStopTime(this)"/>
                            </div>
                        </div>
                        <div id="deactivate{{$cal->week_day}}" class="unavailable-label" @if($cal->status == 1) style="display:none" @endif>
                            <span >Unavailable</span>
                        </div>
                    </div>

                    <div id="el3" class="group-calendar-icons">
                        <div class="trash-label pull-right">
                            <i class="fa fa-trash icon-label"></i></a>
                        </div>

                        <div class="trash-label pull-right">
                            <i class="fa fa-plus icon-label"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
                
        </div>
    </div>
</div>

</div>
</div> <!-- / .row -->
</div>
</div>


@endsection