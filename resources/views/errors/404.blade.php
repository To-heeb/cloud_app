<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
	<div>
        <h3>Sorry this page is not available</h3>
    </div>
</body>
</html>