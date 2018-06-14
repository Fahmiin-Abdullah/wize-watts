@extends('layouts.admin')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset('css/admin/mailingList.css')}}">
@endsection

@section('content')
<div class="container90">
	<h5>Our mailing list</h5>
	<hr>
	<table class="highlight">
		<thead>
			<tr>
				<th>Status</th>
				<th>Username</th>
				<th>Email</th>
				<th class="center">Total order</th>
				<th class="center">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($mailingList as $subscriber)
			<tr>
				<td>{{(($subscriber->user_id) ? 'Registered' : 'Unregistered')}}</td>
				<td>{{(($subscriber->user_id) ? $subscriber->user->name : 'NULL')}}</td>
				<td>{{$subscriber->mailList}}</td>
				<td class="center">0</td>
				<td class="center">
					<div class="center-align">
						<a href="#deleteModal{{$subscriber->id}}" class="btn waves-effect waves-light red white-text modal-trigger"><i class="material-icons left">delete_forever</i>Delete</a>
					</div>
				</td>
			</tr>
			
			<div class="modal" id="deleteModal{{$subscriber->id}}">
				<div class="modal-content">
					<h5 class="center">Are you sure you want to delete this email?</h5>
					<form action="{{route('deleteMail', ['id' => $subscriber->id])}}" method="POST">
						@csrf
						@method('DELETE')
						<div class="input-field center-align paddingTop30">
							<button class="btn waves-effect waves-light red white-text"><i class="material-icons left">delete_forever</i>Yes, Delete</button>
						</div>
					</form>
				</div>
			</div>
			@endforeach
		</tbody>
	</table>
</div>
@endsection