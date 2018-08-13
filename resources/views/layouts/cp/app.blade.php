<!doctype html>
<html lang="en">
<head>
	<title>Dashboard | Klorofil - Free Bootstrap Dashboard Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/linearicons/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/chartist/css/chartist-custom.css') }}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="{{ route('cp.home') }}"><img src="{{ asset('assets/img/logo-dark.png') }}" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a 
								href="#" 
								class="dropdown-toggle" 
								data-toggle="dropdown"
							>
								<img 
									src="{{ asset('assets/img/user.png')}}" 
									class="img-circle" 
									alt="Avatar"
								> 
								<span>{{ auth()->user()->name }}</span> 
								<i class="icon-submenu lnr lnr-chevron-down"></i>
							</a>
							<ul class="dropdown-menu">
								<li><a href="{{ route('cp.settings.index') }}"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
								<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                </form>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li>
							<a href="{{ route('cp.home') }}" class="{{ Route::currentRouteName() == 'cp.home' ? 'active' : '' }}"><i class="lnr lnr-home"></i> 
							<span>Dashboard</span></a>
						</li>
						<li>
							<a href="{{ route('cp.services.index') }}" class="{{ Route::currentRouteName() == 'cp.services.index' || Route::currentRouteName() == 'cp.services.create' || Route::currentRouteName() == 'cp.services.edit' ? 'active' : '' }}"><i class="lnr lnr-store"></i> 
							<span>Services</span></a>
						</li>
						<li>
							<a href="{{ route('cp.hotels.index') }}" class="{{ Route::currentRouteName() == 'cp.hotels.index' || Route::currentRouteName() == 'cp.hotels.create' || Route::currentRouteName() == 'cp.hotels.edit' ? 'active' : '' }}"><i class="lnr lnr-apartment"></i> 
							<span>Hotels</span></a>
						</li>
						<li>
							<a href="{{ route('cp.sliders.index') }}" class="{{ Route::currentRouteName() == 'cp.sliders.index' || Route::currentRouteName() == 'cp.sliders.create' || Route::currentRouteName() == 'cp.sliders.edit' ? 'active' : '' }}"><i class="lnr lnr-screen"></i> 
							<span>Sliders</span></a>
						</li>
						<li>
							@php
								$active = str_is("*cp.modules.car*", Route::currentRouteName()) ? ' active' : ' collapsed';
								$in = str_is("*cp.modules.car*", Route::currentRouteName()) ? ' in' : null;
								$activeCategory = str_is("*cp.modules.car_categories*", Route::currentRouteName()) ? 'active' : null;
								$activeCar = str_is("*cp.modules.cars*", Route::currentRouteName()) ? 'active' : null;
							@endphp
							<a href="#modules" data-toggle="collapse" class="{{ $active }}" aria-expanded="true">
								<i class="lnr lnr-file-empty"></i> 
								<span>Modules</span>
								<i class="icon-submenu lnr lnr-chevron-left"></i>
							</a>
							<div id="modules" class="collapse{{ $in }}" aria-expanded="true" style="">
								<ul class="nav">
									{{-- <li><a href="{{ route('cp.modules.cars.index') }}" class="{{ $activeCar }}">Cars</a></li> --}}
								</ul>
							</div>
						</li>
						<li>
							<a href="{{ route('cp.settings.index') }}" class="{{ Route::currentRouteName() == 'cp.settings.index' ? 'active' : '' }}"><i class="lnr lnr-cog"></i> 
							<span>Settings</span></a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				@yield('content')
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/chartist/js/chartist.min.js') }}"></script>
	<script>
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
	</script>
	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>