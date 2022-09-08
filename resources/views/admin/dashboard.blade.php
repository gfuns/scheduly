@extends('admin.layouts.app')

@section('content')
@section('title', 'Scheduly  - Home')
<div class="main-content bg-fixed-bottom" >
    
    @include('admin.layouts.topmenu')

<div class="container-fluid" style="min-height: 500px;">

  <div class="row justify-content-center">
    <div class="col-12 col-lg-10 col-xl-10">

  <!-- Header -->
  <div class="header mt-md-5">
    <div class="header-body">
      <div class="row align-items-center">
        <div class="col">
          <!-- Pretitle -->
          <h6 class="header-pretitle">
            Dashboard
          </h6>
          <!-- Title -->
          <h1 class="header-title">
            Welcome, {{ucwords(strtolower(Auth::user()->first_name))}}!
          </h1>
        </div>
      </div> <!-- / .row -->
    </div>
  </div>


  <div class="row mt-5">

    <div class="col-12 col-lg-6 col-xl">

      <!-- Card -->
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col">

              <!-- Title -->
              <h6 class="card-title text-uppercase text-muted mb-2">
                Registered Users
              </h6>

              <!-- Heading -->
              <span class="h2 mb-0">{{number_format($params['registeredUsers'])}}</span>

            </div>

          </div> <!-- / .row -->
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-6 col-xl">

      <!-- Card -->
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col">
              <!-- Title -->
              <h6 class="card-title text-uppercase text-muted mb-2">
                Appointment Requests
              </h6>

              <!-- Heading -->
              <span class="h2 mb-0">{{number_format($params['appointmentRequests'])}}</span>
            </div>
            <div class="col-auto">
              <!-- Icon -->
              <span class="h2 fe fe-dollar-sign text-muted mb-0"></span>
            </div>
          </div> <!-- / .row -->
        </div>
      </div>

    </div>

  </div>

  <!-- Header -->
  <div class="header md-5">
    <div class="header-body">
      <div class="row align-items-center">
        <div class="col">
          <!-- Title -->
          <h1 class="header-title">
            Recent Appointment Requests
          </h1>
        </div>
      </div> <!-- / .row -->     
    </div>
  </div>

<!-- Card -->
<div class="card">
  <div class="card-header">
    <div class="row align-items-center">
      <div class="col">

        <!-- Search -->
        <form class="row align-items-center" method="post" action="">
          <div class="col-auto pr-0">
            <span class="fe fe-search text-muted"></span>
          </div>
          <div class="col">
            <input id="search-input" type="search" name="search" value="" onkeyup="filterRecords()" class="form-control form-control-flush search" placeholder="Search Appointment Requests">
          </div>
        </form>

      </div>

    </div> <!-- / .row -->
  </div>
  <div class="table-responsive">
        <table id="search-table" class="table table-nowrap card-table">
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
                @foreach ($recentRequests as $req)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$req->user->first_name." ".$req->user->last_name}}</td>
                    <td>{{date_format(new DateTime($req->appointment_date), 'l - jS F, Y')}}</td>
                    <td>{{date_format(new DateTime($req->appointment_time), 'H:iA')}}</td>
                    <td>{{$req->duration}} Hour(s)</td>
                    <td>{{$req->status == "Cancelled" ? "Cancelled by you" : $req->status}}</td>
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
</div>
@if(count($recentRequests) == 0)
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