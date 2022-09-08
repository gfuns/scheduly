@extends('admin.layouts.app')

@section('content')
@section('title', 'Scheduly  - Appointment Requests')

<!-- MAIN CONTENT -->
<div class="main-content bg-fixed-bottom" >

    @include('admin.layouts.topmenu')


<div class="container-fluid" style="min-height: 500px;">

    <div class="row justify-content-center">
        <div class="col-12 col-lg-12 col-xl-12">
           
    <!-- Header -->
    <div class="header md-5">
        <div class="header-body">
            <div class="row align-items-center">
                <div class="col">
                    <!-- Title -->
                    <h1 class="header-title">
                        Appointment Requests
                    </h1>
                </div>
            </div> <!-- / .row -->
        </div>
    </div>

    <!-- Card -->
    <div class="card" data-toggle="lists">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">

                <!-- Search -->
                <form class="row align-items-center">
                    <div class="col-auto pr-0">
                        <span class="fe fe-search text-muted"></span>
                    </div>
                    <div class="col">
                        <input id="search-input" type="search" name="search" value="" onkeyup="filterRecords()" class="form-control form-control-flush search"
                        placeholder="Search Appointment Requests">
                    </div>
                </form>

            </div>

        </div> <!-- / .row -->
    </div>
    <div class="table-responsive">
        <table id="search-table" class="table table-nowrap card-table cs-sty">
            <thead>
                <tr>
                    <th>S/No.</th>
                    <th>User</th>
                    <th>Appointment Date</th>
                    <th>Time</th>
                    <th>Duration</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="list">
                @foreach ($appointmentRequests as $req)
                <tr>
                    <td>{{$marker['index']++}}</td>
                    <td>{{$req->user->first_name." ".$req->user->last_name}}</td>
                    <td>{{date_format(new DateTime($req->appointment_date), 'l - jS F, Y')}}</td>
                    <td>{{date_format(new DateTime($req->appointment_time), 'H:iA')}}</td>
                    <td>{{$req->duration}} Hour(s)</td>
                    <td>{{$req->status == "Cancelled" ? "Cancelled by user" : $req->status}}</td>
                    <td>
                        @if($req->status == "Pending")
                        <a href="{{route('user.cancelAppointment', [$req->id])}}" onclick="return confirm('Are you sure you want to cancel this request?');"><div class="badge badge-soft-danger"><i class="fa fa-times"></i> Cancel Request</div></a>
                        @else
                            <div class="badge badge-soft-dark" style="cursor:pointer"><i class="fa fa-times"></i> Cancel Request</div>
                        @endif
                    </td>                     
                </tr>
            @endforeach
        </tbody>
    </table>
    <div> 
        <span class="paginate-desc">Showing {{$marker['begin']}} to {{$marker['end']}} of {{number_format($totalRecord)}} Records</span>                 
        <span class="paginate">{{$appointmentRequests->links()}}</span>
    </div>
</div>



@if(count($appointmentRequests) == 0)
<div class="text-70 text-center">
    <li class='fa fa-frown'></li>
    <br>
    <p class="text-14">No Record found!</p>
</div>
@endif
</div>

<nav aria-label="Page navigation example">

</nav>

</div>
</div> <!-- / .row -->
</div>
</div>



@endsection