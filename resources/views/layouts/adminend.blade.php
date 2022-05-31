<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{config('app.name', 'Cloudy')}}| @yield('title')</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet" href="{{ asset('css/admin.css')}}">

	<!-- External Stylesheet -->
	<style type="text/css" href="">

	</style>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				{{config('app.name','Cloudy')}}
			</div>
			<div class="col-md-6 text-right">
				{{ Auth::user()->name }}<br>
				{{ Auth::user()->email }}
				<img src="{{asset('images/avatar1.png')}}" class="topimg rounded-circle" width="45" height="45">
			</div>
		</div>

		<div class="row">
			<div class="col-md-3">
				Navigation
				<ul>
					<li><a href="">Dashboard</a></li>
					<li><a href="{{route('contacts.index')}}">Contact</a></li>
					<li><a href="{{route('students.index')}}">Student</a></li>
					<li><a href="">Settings</a></li>
					<li><a href="">Logout</a></li>
				</ul>
			</div>
			<div class="col-md-9">
				@yield('content')
			</div>
		</div>
		<div>

		</div>
	</div>
</body>

</html>