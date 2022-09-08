@extends('admin.layouts.app')

@section('content')
@section('title', 'Scheduly  - Registered Users')

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
                        Registered Users
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
                        placeholder="Search User Records">
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
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email Address</th>
                    <th>Phone Number</th>
                    <th>Organization</th>
                    <th>Registration Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="list">
                @foreach ($users as $user)
                <tr>
                    <td>{{$marker['index']++}}</td>
                    <td>{{$user->first_name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone == null ? 'Nil' : $user->phone}}</td>
                    <td>{{$user->organization == null ? 'Nil' : $user->organization}}</td>
                    <td>{{$user->created_at}}</td>
                    <td><a href="{{route('admin.deleteUser', [$user->id])}}" onclick="return confirm('Are you sure you want to delete this user?');"><div class="badge badge-soft-danger"><i class="fa fa-trash"></i> Delete User</div></a></td>                    
                </tr>
            @endforeach
        </tbody>
    </table>
    <div> 
        <span class="paginate-desc">Showing {{$marker['begin']}} to {{$marker['end']}} of {{number_format($totalRecord)}} Records</span>                 
        <span class="paginate">{{$users->links()}}</span>
    </div>
</div>



@if(count($users) == 0)
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