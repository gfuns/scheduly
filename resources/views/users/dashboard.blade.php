@extends('users.layouts.app')

@section('content')
@section('title', 'Scheduly  - Home')
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
          <!-- Pretitle -->
          <h6 class="header-pretitle">
            Dashboard
          </h6>
          <!-- Title -->
          <h1 class="header-title">
            Hello, {{ucwords(strtolower(Auth::user()->first_name))}}!
          </h1>
        </div>
      </div> <!-- / .row -->
    </div>
  </div>


  <div class="row mt-5">

    <div class="col-12 col-lg-12 col-xl">

      <!-- Card -->
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col">
                <span class="h2 mb-0">Welcome to my appointment scheduling page. Please click the button below to request for an appoint.</span>
            </div>
          </div> 
          <div class="btn-group" style="padding-top: 20px">
              <a href="{{route('user.requestAppointment')}}" class="btn btn-dark btn-sm">Create Appointment Request</a>
          </div>
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
<div class="card" data-toggle="lists" data-options='{"valueNames": ["ref", "amount", "service", "payment-method", "orders-status", "date"]}'>
  <div class="card-header">
    <div class="row align-items-center">
      <div class="col">

        <!-- Search -->
        <form class="row align-items-center" method="post" action="">
          <div class="col-auto pr-0">
            <span class="fe fe-search text-muted"></span>
          </div>
          <div class="col">
            <input type="search" name="search" value="" class="form-control form-control-flush search" placeholder="Search Appointment Requests">
          </div>
        </form>

      </div>

    </div> <!-- / .row -->
  </div>
  <div class="b-table">
    <table class="table has-mobile-cards">
      <thead>
        <tr>
          <th>S/No</th>
          <th>User</th>
          <th>Appointment Date</th>
          <th>Status</th>
          <th>Date Received</th>
        </tr>
      </thead>
  <tbody class="list">
<!--     
    <tr>
      <td class="ref">
        A
      </td>
      <td class="amount">
        &#8358;0
      </td>
      <td class="service">
        B
      </td>
      <td class="orders-status">
        <div class="badge 
        
        {{'badge-soft-warning'}}
         {{'badge-soft-success'}}
        {{'badge-soft-danger'}} 
        ">
        D
      </div>
    </td>
    <td class="date">
      C
    </td>
  </tr> -->
</tbody>
</table>
</div>
<div class="text-70 text-center">
  <li class='fa fa-frown'></li>
  <br>
  <p class="text-14">No Record found!</p>
</div>
</div>

<nav aria-label="Page navigation example">

</nav>

</div>
</div> <!-- / .row -->
</div>
</div>

@endsection