@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="appointly col-md-10">
            <div class="card">
                <div class="no-padding card-body">

                    <div class="row col-md-12">
                        <div class="left-panel col-md-6">
                            <div class="arrow-back" onclick="history.back()">
                                <span class="left-panel-icon"><i class="fas fa-arrow-left fa-2x"></i><span>
                            </div> 
                            <div class="personnel-name">Gabriel Nwankwo</div> 
                            <div class="selected-schedule">30 Minute Meeting</div>
                            <div class="icon"><span><i class="fas fa-clock"></i></span> 30 mins</div>
                        </div>
                        <div class="right-panel col-md-6">
                            <div class="right-panel-heading">Select a Date & Time</div>
                            <a href="/finish-up"><button class="btn btn-primary">Finish</button></a>
                            <div class="calendar-display">
                                @include('partials.calendar')
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
