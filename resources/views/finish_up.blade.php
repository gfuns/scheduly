@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="appointly col-md-10">
            <div class="card">
                <div class="no-padding card-body">

                    <div class="row col-md-12">
                        <div class="left-panel col-md-5">
                            <div class="arrow-back" onclick="history.back()">
                                <span class="left-panel-icon"><i class="fas fa-arrow-left fa-2x"></i><span>
                            </div> 
                            <div class="personnel-name">Gabriel Nwankwo</div> 
                            <div class="selected-schedule">30 Minutes Meeting</div>
                            <div class="icon"><span><i class="fas fa-clock"></i></span> 30 mins</div>
                            <div class="icon"><span><i class="far fa-calendar-alt"></i></span> 09:00 - 09:30, Thursday, September 8, 2022</div>
                            <div class="icon"><span><i class="fas fa-globe-africa"></i></span> West Africa Time</div>
                        </div>
                        <div class="right-panel col-md-7">
                            <div class="right-panel-heading">Enter Details</div>
                            <div class="appointment-form">
                                <form method="POST" action="{{ route('login') }}" class="">
                                    @csrf
                                        <div class="form-element row mb-3">
                                            <label for="name" class="form-label col-md-12 col-form-label ">Name *</label>
                                            <div class="col-md-10">
                                                <input id="name" type="text" class="form-input form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-element row mb-3">
                                            <label for="email" class="form-label col-md-12 col-form-label ">Email *</label>
                                            <div class="col-md-10">
                                                <input id="email" type="email" class="form-input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-element row mb-3">
                                            <label for="email" class="form-label col-md-12 col-form-label ">Please share anything that will help prepare for our meeting.</label>
                                            <div class="col-md-10">
                                                <textarea id="additional_info"  class="form-control @error('additional_info') is-invalid @enderror" name="additional_info" value="{{ old('additional_info') }}" autocomplete="additional_info" autofocus style="resize:none" rows="5"></textarea>

                                                @error('additional_info')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-element row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                   Schedule Appointment
                                                </button>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- <div class="row col-md-12">
                        <div class="col-md-6" style="border-right: 1px solid #ccc">Box 1</div>
                        <div class="col-md-6">Box 2</div>
                    </div> -->
@endsection
