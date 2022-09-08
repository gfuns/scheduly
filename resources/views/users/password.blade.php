@extends('users.layouts.app')

@section('content')
@section('title', 'Scheduly  - Change Password')

<!-- MAIN CONTENT -->
<div class="main-content bg-fixed-bottom" >

    @include('users.layouts.topmenu')

<div class="container-fluid" style="min-height: 500px;">

    <div class="row justify-content-center">
        <div class="col-12 col-lg-6 col-xl-6">

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
                            <a href="{{route('user.settings')}}" class="nav-link">
                                Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user.password')}}" class="nav-link  active">
                                Password
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
                <form method="post" action="{{route('user.updatePassword')}}" class="mb-4">
                @csrf
                   <div class="row">
                    <div class="col-12 col-md-12">
                        <!-- Phone -->
                        <div class="form-group">
                            <label>
                                Old Password
                            </label>
                            <input type="password" name="old_password" class="form-control mb-3 " placeholder="Old Password" required="required">
                            @error('old_password')
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
                                New Password
                            </label>
                            <input type="password" name="new_password" class="form-control mb-3 " placeholder="New Password" required="required" minlength="8">
                            @error('new_password')
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
                                Confirm Password
                            </label>
                            <input type="password" name="password_confirmation" class="form-control mb-3 " placeholder="Confirm Password" required="required" minlength="8">
                            @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            
                        </div>
                    </div>
                </div> <!-- / .row -->

                <div class="row">
                    <div class="col-12 col-md-12">

                        <button type="submit" class="btn btn-primary btn-block">Update Password</button>

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