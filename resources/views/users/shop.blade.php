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
				@foreach($categories as $category)
				<li>
					<div class="collapsible-header darkGrey"><i class="material-icons"></i>{{$category->category}}</div>
					<div class="collapsible-body subProduct">
						<div class="collection">
							@foreach($subcategories as $subcategory)
							@if($subcategory->category_id == $category->id)
							<a href="/shop/catalog/{{$category->id}}/{{$subcategory->id}}" class="collection-item darkGrey white-text waves-effect waves-light catalog">{{$subcategory->subcategory}}</a>
							@endif
							@endforeach
						</div>
					</div>
				</li>
				@endforeach
			</ul>
		</div>
		<div class="col s12 m9">
			<div class="row black-text">
				@foreach($products->sortByDesc('id') as $product)
				<div class="col s6 m4 productCard">
					<h6 class="white-text paddingBottom20 paddingLeft5">{{$product->category->category}} / {{$product->subcategory->subcategory}}</h6>
					<div class="card margin0">
						<div class="card-image">
							<a href="/products/view/{{$product->id}}" class="waves-effect waves-light"><img src="/uploads/products/{{$product->productimage}}"></a>
						</div>
						<div class="card-content center-align padding0">
							<h5 class="smallFont"><strong>{{$product->name}}</strong></h5>
							<h6 class="paddingBottom10">BND${{$product->pricing}}</h6>
							<a class="btn-floating halfway-fab waves-effect waves-light yellow
							@auth
								@if(count($user->favorites))
								@foreach($user->favorites as $favorite)
									@if($favorite->product_id != $product->id)
										yellow
									@endif
								@endforeach
								@else
									yellow
								@endif
							@endauth
							tooltipped hide-on-med-and-down favorite" data-position="top" data-tooltip="Add to favlist" data-favid="{{$product->id}}" id="fav{{$product->id}}"><i class="material-icons black-text">favorite</i></a>
						</div>
						<div class="card-action black paddingAll5Small">
							<a href="#" class="white-text smallFont left hide-on-med-and-down">Add to cart</a>
							<div class="row margin0">
								<div class="col s6 center-align">
									<a data-favid="{{$product->id}}" class="favorite
									@auth	
										@if(count($user->favorites))
										@foreach($user->favorites as $favorite)
											@if($favorite->product_id == $product->id)
											yellow-text
											@endif
										@endforeach
										@else
										@endif
									@endauth
									"><i class="material-icons hide-on-large-only">favorite</i></a>
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
</div>
@endsection

@section('js')
	<script src="{{asset('js/users/shop.js')}}"></script>
@endsection