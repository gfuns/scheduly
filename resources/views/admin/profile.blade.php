@extends('admin.layouts.app')

@section('content')
@section('title', 'Scheduly  - Update Profile')
<!-- MAIN CONTENT -->
<div class="main-content bg-fixed-bottom" >

    @include('admin.layouts.topmenu')
   
<div class="container-fluid" style="min-height: 500px;">

    <div class="row justify-content-center">
        <div class="col-12 col-lg-8 col-xl-6">
        

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
                            <a href="{{route('admin.settings')}}" class="nav-link active">
                                Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.password')}}" class="nav-link">
                                Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.calendarSettings')}}" class="nav-link">
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
                <form method="post" action="{{route('admin.updateProfile')}}" class="mb-4">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <!-- First name -->
                            <div class="form-group">
                                <label>
                                    First name
                                </label>
                                <input type="text" name="first_name" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" value="{{Auth::user()->first_name}}" placeholder="First Name" required="required">
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <!-- Last name -->
                            <div class="form-group">
                                <label>
                                    Last name
                                </label>
                                <input type="text" name="last_name" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" value="{{Auth::user()->last_name}}" placeholder="Last Name" required="required">
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <!-- Last name -->
                            <div class="form-group">
                                <label>
                                    Email Address
                                </label>
                                <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{Auth::user()->email}}" placeholder="name@address.com" required="required">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <!-- Email address -->
                            <div class="form-group">
                                <label>
                                    Phone Number
                                </label>
                                <input type="text" name="phone" class="form-control mb-3 " placeholder="(___)___-____"
                                data-mask="(000) 000-0000" value="{{Auth::user()->phone}}">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <!-- Phone -->
                            <div class="form-group">
                                <label>
                                    Organization
                                </label>
                                <input type="text" name="organization" class="form-control mb-3 " value="{{Auth::user()->organization}}">
                                @error('organization')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                    </div> <!-- / .row -->

                    <!-- Divider -->
                    <hr>


                    <div class="row">
                        <div class="col-12 col-md-12">

                            <!-- Card -->
                            <div class="card bg-light border md-4">
                                <div class="card-body">

                                    <p class="mb-2">
                                        Note:
                                    </p>

                                    <p class="small text-muted mb-2">
                                        The Below mentioned fields requires your Real Identity
                                    </p>

                                    <ul class="small text-muted pl-4 mb-0">
                                        <li>
                                            First Name
                                        </li>
                                        <li>
                                            Last Name
                                        </li>
                                        <li>
                                            Email Address
                                        </li>
                                        <li>
                                            Phone Number
                                        </li>
                                        <li>
                                            Organization
                                        </li>                                        
                                    </ul>

                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Save Details</button>

                        </div>

                    </div> <!-- / .row -->

                </form>
            </div>
        </div>
    </div>
</div>
</div> <!-- / .row -->
</div>
</div>

@endsection