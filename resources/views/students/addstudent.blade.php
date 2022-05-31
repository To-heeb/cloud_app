<!DOCTYPE html>
<html>
<head>
	<title>{{$title}}</title>
	 <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2>{{$institution}}</h2>
				<h3>{{$title}} {{session('matricno')}}</h3>
				@if($errors->any())
				<div class="alert alert-danger">
					<ul>
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
					</ul>
				</div>
				@endif
				<form method="post" action="{{route('student.store')}}" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
					<label>Faculty</label>
					<select name="faculty" id="faculty" class="form-control">
					<option>Choose option</option>
					@foreach($faculties as $key=>$value)
					<option value="{{$key}}" @if($key==old('faculty')) selected @endif>{{$value}}</option>
					@endforeach
					</select>
					</div>
					<div class="form-group">
						<label>Fullname</label>
						<input type="text" name="fullname" id="fullname" class="form-control" value="{{old('fullname')}}">
						<!-- to retain value the name of the form will be in the old -->
					</div>

					<div class="form-group">
						<label>Email Address</label>
						<input type="email" name="emailaddress" id="emailaddress" class="form-control" value="{{old('emailaddress')}}">
					</div>
					<div class="form-group">
						<label>Biography</label>
						<textarea name="biography" id="biography" class="form-control" value="{{old('biography')}}"></textarea>
					</div>
					<div class="form-group">
						<label>Date of Birth</label>
						<input type="date" name="dob" id="dob" class="form-control" value="{{old('dob')}}">
					</div>
					<div class="form-group">
						<label>Profile Photo</label>
						<input type="file" name="profilephoto" id="profilephoto" class="form-control">
					</div>
					<button type="submit" name="submit" class="btn btn-primary">Add Student</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>