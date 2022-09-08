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