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
                <div class="calendar-title">Set your weekly hours</div>

                    <div class="row">
                        <div class="col-md-4 appointment-left-box">
                                <div class="custom-card">{{$cal->day_full}}</div>
                                <div class="custom-card">Availability: {{date_format(new DateTime($cal->start_time), 'H:iA')}} - {{date_format(new DateTime($cal->stop_time), 'g:iA')}}</div>
                        </div>

                        <div class="col-md-8">
                        <form method="post" action="{{route('user.sendAppointmentRequest')}}" class="mb-4">
                             @csrf
                            <div class="right-box-form">

                                <div class="col-12">
                                    <!-- Preferred Date -->
                                    <div class="form-group">
                                        <label class="right-form-label">Select your preferred date</label>
                                        <select name="preferred_date" class="form-control{{ $errors->has('preferred_date') ? ' is-invalid' : '' }}" required="required">
                                            @foreach($availableDates as $availDates)
                                            <option value="{{date_format($availDates, 'Y-m-d')}}">{{$cal->day_full}} - {{date_format($availDates, 'jS F, Y')}}</option>
                                            @endforeach
                                        </select>
                                        @error('preferred_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <!-- Select Time -->
                                    <div class="form-group">
                                        <label class="right-form-label">Select your preferred time</label>
                                        <select name="preferred_time" class="form-control{{ $errors->has('preferred_time') ? ' is-invalid' : '' }}" required="required">
                                            @foreach($availableTimes as $availTime)
                                            <option value="{{$availTime}}">{{date_format(new DateTime($availTime), 'g:iA')}}</option>
                                            @endforeach
                                        </select>
                                        @error('preferred_time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <!-- Select Duration -->
                                    <div class="form-group">
                                        <label class="right-form-label">Select duration</label>
                                        <select name="duration" class="form-control{{ $errors->has('duration') ? ' is-invalid' : '' }}" required="required">
                                            <option value="1">1 Hour Meeting</option>
                                            <option value="2">2 Hours Meeting</option>
                                            <option value="">Beyond 2 Hours Meeting</option>
                                        </select>
                                        @error('duration')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <!-- Select Duration -->
                                    <div class="form-group">
                                        <label class="right-form-label">Please provide any additional info that will help me prepare for the meeting</label>
                                        <textarea name="additional_info" class="form-control{{ $errors->has('additional_info') ? ' is-invalid' : '' }}" placeholder="" style="resize:none" rows="5"></textarea>
                                        @error('additional_info')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block">Request Appointment</button>
                            </div>
                        </form>
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