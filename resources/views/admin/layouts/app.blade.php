<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@include('admin.layouts.header')
<body>
	<!-- Sidebar section -->
	<nav class="navbar navbar-vertical fixed-left navbar-expand-md side-nav-bg" id="sidebar">
		<div class="container-fluid">

			<!-- Toggler -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse"
			aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			<i class="fa fa-bars" style="color: white"></i>
			</button>

		<!-- Brand -->
		<a class="navbar-brand" href="/">
			<img src="{{asset('images/logo.png')}}" class="navbar-brand-img
			mx-auto" alt="Scheduly">
		</a>

		

		<!-- Collapse -->
		@include('admin.layouts.sidebar')
		<!-- / .navbar-collapse -->

	</div>
</nav>


<!-- Sidebar section end -->

<!-- MAIN CONTENT -->

@yield('content')
<!-- Footer section -->
<footer>

</footer>

@include('admin.layouts.js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('sweet::alert')

</body>
</html>
