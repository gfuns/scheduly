@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="appointly col-md-7">
            <div class="arrow-back-section row mb-3" onclick="history.back()">
                <div class="arrow-back">
                    <span class="left-panel-icon"><i class="fas fa-arrow-left"></i><span> 
                </div>
                <div class="arrow-back-text"> Go Back </div>
            </div>

            <div class="card">             
                <div class="appointly-reg-header card-header">Create Your Account</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="first_name" class="form-label col-md-4 col-form-label text-md-end">Your First Name *</label>

                            <div class="col-md-7">
                                <input id="first_name" type="text" class="form-input form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="last_name" class="form-label col-md-4 col-form-label text-md-end">Your Last Name *</label>

                            <div class="col-md-7">
                                <input id="last_name" type="text" class="form-input form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="form-label col-md-4 col-form-label text-md-end">Your Email Address *</label>

                            <div class="col-md-7">
                                <input id="email" type="email" class="form-input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="organization" class="form-label col-md-4 col-form-label text-md-end">Your Organization</label>

                            <div class="col-md-7">
                                <input id="organization" type="text" class="form-input form-control @error('organization') is-invalid @enderror" name="organization" value="{{ old('organization') }}" autocomplete="organization">

                                @error('organization')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="form-label col-md-4 col-form-label text-md-end">Choose a Password *</label>

                            <div class="col-md-7">
                                <input id="password" type="password" class="form-input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="form-label col-md-4 col-form-label text-md-end">Confirm Password *</label>

                            <div class="col-md-7">
                                <input id="password-confirm" type="password" class="form-input form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="login-text" class="form-label col-md-4 col-form-label text-md-end">Already have an Account?</label>

                            <label for="login" class="col-md-7 col-form-label"><a class="form-label-link" href="/login">Sign In Instead</a></label>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-7 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Create Account
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
