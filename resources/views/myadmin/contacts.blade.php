@extends('layouts.adminend')

@section('title', 'List of Contacts')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<a href="{{route('contacts.create')}}" class="btn btn-primary my-5">Add Contact</a>
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Fullname</th>
						<th>Alias</th>
						<th>Biography</th>
						<th>Gender</th>
						<th>Phone Number</th>
						<th>Email Address</th>
						<th>Meet At</th>
						<th>Home Address</th>
						<th></th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($mycontacts as $key=>$value)

					<tr>
						<td>{{$key+1}}</td>
						<td>{{$value->fullname}}</td>
						<td>{{$value->shortname}}</td>
						<td>{{$value->biography}}</td>
						<td>{{$value->gender}}</td>
						<td>{{$value->phonenumber}}</td>
						<td>{{$value->emailaddress}}</td>
						<td>{{$value->contactaddress}}</td>
						<td>{{$value->meet_at}}</td>
						<td>{{$value->workphone}}</td>
						<td>
							<a href="{{route('contacts.edit', ['contact'=>$value->contact_id])}}" class='btn btn-primary btn-sm'>Edit</a>

							<form method="post" action="{{route('contacts.destroy', ['contact'=>$value->contact_id])}}">
								@csrf
								<input type="hidden" name="_method" value="DELETE">
								<button type="submit" name="btndelete" class="btn btn-primary btn-sm">Delete</button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection('content')