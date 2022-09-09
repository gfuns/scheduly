@extends('users.layouts.app')

@section('content')
@section('title', 'Scheduly  - Request Appointment')

<!-- MAIN CONTENT -->
<div class="main-content bg-fixed-bottom" >

    @include('users.layouts.topmenu')

<div class="container-fluid" style="min-height: 500px;">

    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-10">

    <!-- Header -->
    <div class="header mt-md-5">
        <div class="header-body">
            <div class="row align-items-center">
                <div class="col">
                    <!-- Title -->
                    <h1 class="header-title">
                        Request An Appointment
                    </h1>

                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-12 col-xl-12">
        <!-- Form -->
        <div class="card">
            <div class="card-body">
                <div class="calendar-title">Select your preferred day</div>
                    <div class="row">
                        <div class="col-md-4 appointment-left-box">
                            @foreach($calendarSettings as $cal)
                                <a href="{{route('user.showFillableAppointmentForm', [strtolower($cal->week_day)])}}"><div class="custom-card">{{$cal->day_full}}</div></a>
                            @endforeach
                        </div>

                        <div class="col-md-8">
                            <div class="right-box-info">Details will appear here as soon as you select a day</div>
                        </div>
                    </div>

                
        </div>
    </div>
</div>

</div>
</div> <!-- / .row -->
</div>
</div>


@endsection