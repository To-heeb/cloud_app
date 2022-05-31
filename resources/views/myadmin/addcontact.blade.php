@extends('layouts.adminend')

@section('title', 'Add Contact')

@section('content')  
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2></h2>
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
				<form method="post" action="{{route('contacts.store')}}" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label>Fullname</label>
						<input type="text" name="fullname" id="fullname" class="form-control" value="{{old('fullname')}}">
						<!-- to retain value the name of the form will be in the old -->
					</div>
					<div class="form-group">
						<label>Phone Number</label>
						<input type="text" name="phonenumber" id="phonenumber" class="form-control" value="{{old('phonenumber')}}">
						<!-- to retain value the name of the form will be in the old -->
					</div>
					<div class="form-group">
						<label>Short Name</label>
						<input type="text" name="shortname" id="shortname" class="form-control" value="{{old('shortname')}}">
						<!-- to retain value the name of the form will be in the old -->
					</div>
					<div class="form-group">
						<label>Biography</label>
						<textarea name="biography" id="biography" class="form-control">{{old('biography')}}</textarea>
						<!-- to retain value the name of the form will be in the old -->
					</div>
					<div class="form-group">
						<label>Email Address</label>
						<input type="email" name="emailaddress" id="emailaddress" class="form-control" value="{{old('emailaddress')}}">
					</div>
					<div class="form-group">
						<label>Gender</label>
						<div>
							<input type="radio" name="gender" id="gender1" value="Male" @if(old('gender')=='Male') checked @endif><br>Male<br>
							<input type="radio" name="gender" id="gender2" value="Female"  @if(old('gender')=='Female') checked @endif><br>Female

						</div>
					</div>
					<div class="form-group">
						<label>Contact Address</label>
						<textarea name="contactaddress" id="contactaddress" class="form-control">{{old('contactaddress')}}</textarea>
					</div>
					<div class="form-group">
						<label>Meet At Where?</label>
						<input type="text" name="meet_at" id="meet_at" class="form-control" value="{{old('meet_at')}}">
					</div>
					<button type="submit" name="submit" class="btn btn-primary">Add Contact</button>
				</form>
			</div>
		</div>
	</div>
@endsection