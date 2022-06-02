<!DOCTYPE html>
<html>
<head>
	<title>List ALL Students</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
	
	<!-- You can display more than one session value -->
	<div class="container mt-3">
		{{-- <h1 class="text-lead">Student Table</h1> --}}
		<h2 class="text-lead">{{$institution}}</h2>
		<h3 class="text-lead">{{$title}}</h3>
		@if(session('success'))
		<div class="alert alert-success mt-2">
			{{session('success')}}
		</div>
	   @endif
		<a href="{{route('students.create')}}" class="btn btn-secondary btn-lg my-3">Add New Student</a>
		<table class="table table-bordered table-striped">
			<thead class="bg-dark text-white">
				<tr>
					<th>#</th>
					<th>Profile Image</th>
					<th>Fullname</th>
					<th>Email Address</th>
					<th>Date of birth</th>
					<th>Faculty</th>
					<th>Biography</th>
					<th>Action</th>
				</tr>
			</thead>
			@php $kounter = 1;@endphp
			<tbody>
				@foreach($students as $student)
				<tr>
					<td>{{ $kounter++;}}</td>
					<td><img src="{{asset('profilephotos/'.$student->profile_photo)}}" alt="" class="topimg rounded-circle" width="45" height="45"></td>
					<td>{{$student->fullname}}</td>
					<td>{{$student->emailaddress}}</td>
					<td>{{$student->dob}}</td>
					<td>{{$student->faculty}}</td>
					<td>{{$student->biography}}</td>
					<td>
						<a href="{{route('students.edit', ['student'=>$student->student_id])}}" class='btn btn-primary btn-sm mx-3'>Edit</a>

						<form method="post" action="{{route('students.destroy', ['student'=>$student->student_id])}}">
							@csrf
							<input type="hidden" name="_method" value="DELETE">
							<button type="submit" name="btndelete" class="btn btn-danger btn-sm">Delete</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	
</body>
</html>