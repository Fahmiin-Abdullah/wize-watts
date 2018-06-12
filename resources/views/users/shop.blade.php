@extends('layouts.app')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset('css/users/shop.css')}}">
@endsection

@section('content')
<div class="showcase paddingTop50 paddingBottom50 white-text">
	<h3 class="section center"><strong>Never need to look for another site again</strong></h3>
	<h5 class="section center paddingLeft20Small paddingRight20Small"><em>- From amplifiers to zeners, we got them for you</em></h5>
</div>
	
<div class="container90">
	<div class="row paddingTop30">
		<div class="col s12 m3 white-text">
			<div class="row">
				<form action="" method="POST">
					@csrf
					<div class="col s9 m9">
						<div class="input-field">
							<input type="search" name="quickSearch" placeholder="Search for a component" required>
						</div>
					</div>
					<div class="col s3 m3">
						<div class="input-field paddingTop5">
							<button class="btn waves-effect waves-light yellow black-text"><i class="material-icons center">search</i></button>
						</div>
					</div>
				</form>
			</div>
			<h5 class="paddingBottom10">Our products</h5>
			<ul class="collapsible productsSidebar">
				<li>
					<div class="collapsible-header darkGrey"><i class="material-icons"></i>Arduino Things</div>
					<div class="collapsible-body subProduct">
						<div class="collection">
							<a href="#" class="collection-item darkGrey white-text waves-effect waves-light">Modules</a>
							<a href="#" class="collection-item darkGrey white-text waves-effect waves-light">Shields</a>
							<a href="#" class="collection-item darkGrey white-text waves-effect waves-light">Accessories</a>
							<a href="#" class="collection-item darkGrey white-text waves-effect waves-light">Bundled kits</a>
							<a href="#" class="collection-item darkGrey white-text waves-effect waves-light">Courses</a>
						</div>
					</div>
				</li>
				<li>
					<div class="collapsible-header darkGrey"><i class="material-icons"></i>Electrical Things</div>
					<div class="collapsible-body subProduct">
						<div class="collection">
							<a href="#" class="collection-item darkGrey white-text waves-effect waves-light">Components</a>
							<a href="#" class="collection-item darkGrey white-text waves-effect waves-light">Equipment</a>
							<a href="#" class="collection-item darkGrey white-text waves-effect waves-light">Accessories</a>
						</div>
					</div>
				</li>
			</ul>
		</div>
		<div class="col s12 m9">
			<h5 class="paddingBottom10 white-text">Arduino Things > Modules</h5>
			<div class="row black-text">
				@foreach($products as $product)
				<div class="col s6 m4 productCard">
					<div class="card margin0">
						<div class="card-image">
							<a href="{{route('viewProduct', ['id' => $product->id])}}" class="waves-effect waves-light"><img src="/uploads/products/{{$product->productimage}}"></a>
						</div>
						<div class="card-content center-align padding0">
							<h5 class="smallFont"><strong>{{$product->name}}</strong></h5>
							<h6 class="paddingBottom10">BND${{$product->pricing}}</h6>
							<a class="btn-floating halfway-fab waves-effect waves-light yellow tooltipped hide-on-med-and-down" data-position="top" data-tooltip="Add to favlist"><i class="material-icons black-text">favorite</i></a>
						</div>
						<div class="card-action black paddingAll10Small">
							<a href="#" class="white-text smallFont left hide-on-med-and-down">Add to cart</a>
							<a href="#"><i class="material-icons right white-text hide-on-large-only">favorite</i></a>
							<a href="#"><i class="material-icons left white-text hide-on-large-only">add_shopping_cart</i></a>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection