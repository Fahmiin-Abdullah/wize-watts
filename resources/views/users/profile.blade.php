@extends('layouts.app')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset('css/users/profile.css')}}">
@endsection

@section('content')
<div class="container80 paddingTop50">
	<div class="row">
		<div class="col s12 m4">
			<div class="card info">
				<div class="card-image activator black white-text center-align info">
					<i class="large material-icons center paddingTop100">person</i>
				</div>
				<div class="card-reveal center-align">
					<span class="card-title grey-text text-darken-4">My info<i class="material-icons right">close</i></span>
					<h5 class="paddingTop30 paddingBottom30">Add or edit your account info here</h5>
					<a href="#info" class="btn btn-floating btn-large waves-effect waves-light black white-text modal-trigger"><i class="material-icons">add</i></a>
				</div>
			</div>
		</div>
		<div class="col s12 m4">
			<div class="card info">
				<div class="card-image activator black white-text center-align info">
					<i class="large material-icons center paddingTop100">library_books</i>
				</div>
				<div class="card-reveal center-align">
					<span class="card-title grey-text text-darken-4">My address book<i class="material-icons right addressClose">close</i></span>
					<div class="center paddingTop50 paddingBottom30 address">
						<h6>{{$user->address}}</h6>
					</div>
					<form action="{{route('editAddress', ['id' => $user->id])}}" method="POST" class="hidden addressForm paddingTop50">
						@csrf
						<div class="input-field">
							<textarea class="materialize-textarea" name="address">{{$user->address}}</textarea>
						</div>
						<div class="input-field center-align">
							<button class="btn waves-effect waves-light black white-text"><i class="material-icons left">edit</i>Update address</button>
						</div>
					</form>
					<a class="btn btn-floating btn-large waves-effect waves-light black white-text editAddress"><i class="material-icons">add</i></a>
				</div>
			</div>
		</div>
		<div class="col s12 m4">
			<div class="card info">
				<div class="card-image activator black white-text center-align info">
					<i class="large material-icons center paddingTop100">favorite</i>
				</div>
				<div class="card-reveal center-align">
					<span class="card-title grey-text text-darken-4">My favlist<i class="material-icons right">close</i></span>
					<h5 class="paddingTop30 paddingBottom30">Add or edit your favlist here</h5>
					<a href="#" class="btn btn-floating btn-large waves-effect waves-light black white-text modal-trigger"><i class="material-icons">add</i></a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="info">
	<div class="modal-content">
		<h6>My account</h6>
		<hr>
		<form action="{{route('editInfo', ['id' => $user->id])}}" method="POST">
			@csrf
			<div class="row">
				<div class="col m6">
					<div class="row">
						<div class="col m6">
							<div class="input-field">
								<input type="text" name="firstname" value="{{$user->firstname}}">
								<label for="firstname">Firstname</label>
							</div>
						</div>
						<div class="col m6">
							<div class="input-field">
								<input type="text" name="lastname" value="{{$user->lastname}}">
								<label for="lastname">Lastname</label>
							</div>
						</div>
					</div>
					<div class="input-field">
						<input type="text" name="name" value="{{$user->name}}" required>
						<label for="name">Username</label>
					</div>
					<div class="input-field marginTop35">
						<input type="email" name="email" value="{{$user->email}}" required>
						<label for="email">Email</label>
					</div>
				</div>
				<div class="col m6">
					<div class="input-field">
						<input type="date" name="bday" value="{{$user->bday}}">
						<label for="bday">Birthday</label>
					</div>
					<div class="input-field marginTop35">
						<input type="text" name="phone" value="{{$user->phone}}">
						<label for="phone">Telephone</label>
					</div>
				</div>
			</div>
			<div class="input-field center-align">
				<button class="btn waves-effect waves-light black white-text"><i class="material-icons left">edit</i>Update info</button>
			</div>
		</form>
	</div>
</div>
@endsection

@section('js')
	<script src="{{asset('js/users/profile.js')}}"></script>
@endsection