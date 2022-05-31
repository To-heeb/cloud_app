<!DOCTYPE html>
<html>
<head>
	<title>List ALL Students</title>
</head>
<body>
	<h2>{{$institution}}</h2>
	<h3>{{$title}}</h3>
	@if(session('success'))
		<div class="alert alert-success">
			{{session('success')}}
		</div>
	@endif
	<!-- You can display more than one session value -->
	<table class="table table">
		<thead>
			
			<tr>
				<th>Student Name</th>
				<th>GPA</th>
			</tr>
		</thead>
		<tbody>
			@foreach($scores as $key=> $value)
			<tr>
				<td>{{$key}}</td>
				<td>{{$value}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>