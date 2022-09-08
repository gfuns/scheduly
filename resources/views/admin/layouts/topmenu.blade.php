 <!-- Navbar section -->
 <nav class="navbar navbar-expand-md navbar-light d-none d-md-flex" id="topbar">
    <div class="container-fluid dashboard-nav-pad">
      <!-- Form -->
      <form class="form-inline mr-4 d-none d-md-flex">
        <div class="input-group input-group-flush input-group-merge">
          <!-- Input -->

        </div>
      </form>

      <!-- User -->
      <div class="navbar-user">
        <!-- Dropdown -->
        <div class="dropdown">
          <!-- Toggle -->
          <span href="#" class="avatar avatar-sm avatar-online dropdown-toggle" role="button"
          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="{{asset('images/user-default.jpg')}}" alt="..." class="rounded-circle" width="40px">
        </span>

        <!-- Menu -->
        <div class="dropdown-menu dropdown-menu-right">
          <!-- <a href="#" class="dropdown-item">Profile</a> -->
          <a href="{{ route('admin.settings') }}" class="dropdown-item">Account Settings</a>
          <hr class="dropdown-divider">
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">Logout</a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </div>
    </div>
  </div>
</nav>
<!-- Navbar section end -->
