<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title}}</title>

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
			<h1>{{$title??'Welcome to Our About Us page'}}</h1>
			<h2>{!!$content!!}</h2>
		</div>
		<div class="row">
			<div class="col-4">
				<h3>How it works</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sollicitudin scelerisque felis id malesuada. Aenean tincidunt et augue vel rhoncus. Ut eget libero in enim gravida accumsan. Phasellus eu lorem eget purus vestibulum eleifend. Phasellus lobortis euismod est et vehicula. Maecenas sem tortor, consectetur nec sem gravida, ultrices gravida erat. Phasellus hendrerit magna non eleifend accumsan. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam consectetur, eros nec scelerisque hendrerit, risus magna commodo sapien, non sagittis tortor nisl vel justo. Nunc vitae justo non nulla sagittis rutrum ac non nunc. Aliquam euismod mauris in tincidunt rhoncus. Sed quis euismod purus. Maecenas sodales lobortis dolor vitae tincidunt. Etiam hendrerit metus a turpis semper rhoncus non id tortor. Vestibulum sollicitudin, purus ut lobortis auctor, lectus dui egestas dui, vitae luctus leo magna quis tellus.

				</p>
			</div>
			<div class="col-4">
				<iframe width="" height="420" src="https://www.youtube.com/embed/CvJG4sQhzsw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			<div class="col">
				<h4>Get started</h4>
				<img src="{{ asset('images/computer1.jpg')}}" class="img-fluid">
			</div>
		</div>
		<div class="text-center bg-primary">Copyright &copy; {{date('Y')}}copyright, {{config('app.name','Cloudy')}}</div>
	</div>
</body>
</html>