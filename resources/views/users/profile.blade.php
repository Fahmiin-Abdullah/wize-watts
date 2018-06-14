@extends('layouts.app')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset('css/users/profile.css')}}">
@endsection

@section('content')
<div class="container80 paddingTop50 hide-on-med-and-down">
	<div class="row">
		<div class="col s12 m4">
			<div class="card info">
				<div class="card-image activator black white-text center-align info">
					<i class="large material-icons center paddingTop100">person</i>
				</div>
				<div class="card-reveal center-align">
					<span class="card-title grey-text text-darken-4">My info<i class="material-icons right">close</i></span>
					<h5 class="paddingTop30 paddingBottom30">Add or edit your account info here</h5>
					<a href="#infoModal" class="btn btn-floating btn-large waves-effect waves-light black white-text modal-trigger"><i class="material-icons">add</i></a>
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
					<a class="btn btn-floating btn-large waves-effect waves-light black white-text" id="editFavlist"><i class="material-icons">add</i></a>
				</div>
			</div>
		</div>
	</div>
	<div class="editFavlist hidden white-text">
		<hr>
		<div class="row paddingTop30 paddingBottom30">
			@foreach($user->favorites->sortByDesc('id') as $fav)
			<div class="col s6 m4 productCard" id="{{$fav->product->id}}">
				<div class="card margin0">
					<div class="card-image">
						<a href="{{route('viewProduct', ['id' => $fav->product->id])}}" class="waves-effect waves-light"><img src="/uploads/products/{{$fav->product->productimage}}"></a>
					</div>
					<div class="card-content center-align padding0">
						<h5 class="smallFont black-text"><strong>{{$fav->product->name}}</strong></h5>
						<h6 class="paddingBottom10 black-text">BND${{$fav->product->pricing}}</h6>
						<a class="btn-floating halfway-fab waves-effect waves-light tooltipped hide-on-med-and-down favorite" data-position="top" data-tooltip="Add to favlist" data-favid="{{$fav->product->id}}" id="fav{{$fav->product->id}}" data-id="#{{$fav->product->id}}"><i class="material-icons black-text">favorite</i></a>
					</div>
					<div class="card-action black paddingAll5Small">
						<a href="#" class="white-text smallFont left hide-on-med-and-down">Add to cart</a>
						<div class="row margin0">
							<div class="col s6 center-align">
								<a data-favid="{{$fav->product->id}}" class="favorite" id="fav{{$fav->product->id}}" data-id="#{{$fav->product->id}}"><i class="material-icons hide-on-large-only">favorite</i></a>
							</div>
							<div class="col s6 center-align">
								<a href="#"><i class="material-icons white-text hide-on-large-only">add_shopping_cart</i></a>
							</div>
						</div>
					</div>
				</div>
			</div>	
			@endforeach
		</div>
	</div>
</div>

<div class="container80 paddingTop80 hide-on-large-only">
	<div class="row">
		<div class="col s4">
			<a class="btn btn-floating btn-large waves-effect waves-light black white-text profile" data-reveal="#account" data-id="{{$user->id}}"><i class="material-icons">person</i></a>
		</div>
		<div class="col s4">
			<a class="btn btn-floating btn-large waves-effect waves-light black white-text profile" data-reveal="#address" data-id="{{$user->id}}"><i class="material-icons">library_books</i></a>
		</div>
		<div class="col s4">
			<a class="btn btn-floating btn-large waves-effect waves-light black white-text profile" data-reveal="#favlist" data-id="{{$user->id}}"><i class="material-icons">favorite</i></a>
		</div>
	</div>
	<div id="account" class="information hidden">
		<div class="card-panel black white-text">
			<h5>My account<span class="right close"><i class="material-icons">close</i></span></h5>
			<hr>
			<h6 class="fullname"></h6>
			<h6 class="username"></h6>
			<h6 class="email"></h6>
			<h6 class="bday"></h6>
			<h6 class="phone"></h6>
			<div class="right-align">
				<a href="#infoModal" class="btn btn-floating waves-effect waves-light yellow black-text modal-trigger"><i class="material-icons">add</i></a>
			</div>	
		</div>
	</div>
	<div id="address" class="information hidden">
		<div class="card-panel black white-text">
			<h5>My address<span class="right close"><i class="material-icons">close</i></span></h5>
			<hr>
			<h6 class="address"></h6>
			<div class="right-align">
				<a href="#addressModal" class="btn btn-floating waves-effect waves-light yellow black-text modal-trigger"><i class="material-icons">add</i></a>
			</div>
		</div>
	</div>
	<div id="favlist" class="information hidden">
		<div class="card-panel black white-text">
			<h5>My favlist<span class="right close"><i class="material-icons">close</i></span></h5>
			<hr>
		</div>
	</div>
</div>

<div class="modal" id="infoModal">
	<div class="modal-content">
		<h6>My account</h6>
		<hr>
		<form action="{{route('editInfo', ['id' => $user->id])}}" method="POST">
			@csrf
			<div class="row">
				<div class="col s12 m6">
					<div class="row">
						<div class="col s12 m6">
							<div class="input-field">
								<input type="text" name="firstname" value="{{$user->firstname}}">
								<label for="firstname">Firstname</label>
							</div>
						</div>
						<div class="col s12 m6">
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
				<div class="col s12 m6">
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

<div class="modal" id="addressModal">	
	<div class="modal-content">
		<h5>Editing address...</h5>
		<form action="{{route('editAddress', ['id' => $user->id])}}" method="POST">
			@csrf
			<div class="input-field">
				<textarea class="materialize-textarea" name="address">{{$user->address}}</textarea>
			</div>
			<div class="input-field center-align">
				<button class="btn waves-effect waves-light black white-text"><i class="material-icons left">edit</i>Update address</button>
			</div>
		</form>
	</div>
</div>
@endsection

@section('js')
	<script src="{{asset('js/users/profile.js')}}"></script>
@endsection