@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="appointly col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="row col-md-12">
                    <div class="appointly-heading col-md-12">
                        <div class="col-md-4 offset-md-4">
                            <p class="personnel-name">Gabriel Nwankwo</p>
                            <p class="intro-text">Welcome to my scheduling page. Please follow the instructions to add an event to my calendar.</p>
                        </div>
                    </div>

                        <div class="col-md-6">
                            <div class="schedule-type">
                                <a href="/calendar">
                                    <div class="schedule-item">
                                        <p><span class="icon-before"><i class="fas fa-circle"></i></span> 30 Minutes Meeting <span class="icon-after"><i class="fas fa-caret-right fa-2x"></i></span></p>
                                        <span class="item-description">Click to schedule a 30 Minutes Meeting with me</span>
                                    </div>
                                </a>
                            </div>
                            <div class="schedule-type">
                                <a href="/calendar">
                                    <div class="schedule-item">
                                        <p><span class="icon-before"><i class="fas fa-circle"></i></span> 1 Hour Meeting <span class="icon-after"><i class="fas fa-caret-right fa-2x"></i></span></p>
                                        <span class="item-description">Click to schedule a 1 Hour Meeting with me</span>
                                    </div>
                                </a>
                            </div>  
                        </div>
                        <div class="col-md-6">&nbsp;</div>
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
