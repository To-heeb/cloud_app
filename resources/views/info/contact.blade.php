<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - {{$title??''}}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<style type="text/css">
		#coverImg{
			background-image: url("{{ asset('images/african-woman-teaching-children-class.jpg') }}");
			background-repeat: no-repeat;
			background-size: cover;
		}
	</style>
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light text-light bg-primary">
		  <a class="navbar-brand" href="#">Navbar</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav">
		      <li class="nav-item active">
		        <a class="nav-link" href="{{url('/profile')}}">Home <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">About Us</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Services</a>
		      </li>
		    </ul>
		    <ul class="ml-auto navbar-nav">
		    	<li class="nav-item">
		    		<a class="nav-link" href="#">Login</a>
		    	</li>
		    	<li class="nav-item">
		    		<a class="nav-link" href="#">register</a>
		    	</li>
		    </ul>
		  </div>
		</nav>
		<div>
		
		</div>
		<div class="col-12 mb-3" style="height: 400px" id="coverImg">
			
		</div>
		<div>
			<h1>{{$title}}</h1>
			<h2>Welcome {{$lastname??''}} {{$firstname??''}}</h2>
		</div>
            <div>
            
            </div>
		</div>
		<div class="text-center bg-primary">Copyright &copy; {{date('Y')}}copyright, {{config('app.name','Cloudy')}}</div>
	</div>
</body>
</html>