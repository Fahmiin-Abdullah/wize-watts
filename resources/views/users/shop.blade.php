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
							<a href="#cartModal{{$product->id}}" class="white-text smallFont left hide-on-med-and-down modal-trigger">Add to cart</a>
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
									<a href="#cartModal{{$product->id}}" class=" waves-effect waves-light modal-trigger"><i class="material-icons white-text hide-on-large-only">add_shopping_cart</i></a>
								</div>
							</div>
						</div>

						<div class="modal" id="cartModal{{$product->id}}">
							<div class="modal-content hide-on-med-and-down">
								<h5>Add this item to your cart</h5>
								<hr>
								<div class="row">
									<div class="col m12">
										<div class="card horizontal darkGrey white-text">
											<div class="card-image">
												<a href="{{route('viewProduct', ['id' => $product->id])}}" class="waves-effect waves-light"><img src="/uploads/products/{{$product->productimage}}"></a>
											</div>
											<div class="card-stacked">
												<div class="card-content paddingAll5Small paddingAll10 paddingBottom0">
													<p class="card-title">{{$product->name}}</p>
													<hr>
													<div class="row margin0">
														<div class="col m6">
															<h6 class="paddingBottom10">BND${{$product->pricing}}</h6>
															<h6><strong>Availability: <span class="yellow-text">{{$product->stock}}</span></strong></h6>
														</div>
														<div class="col m6">
															<form action="{{route('addToCart', ['id' => $product->id])}}" method="GET">
																@csrf
																<div class="input-field">
																	<input type="number" min="0" name="qty" class="white-text quantity" data-max="{{$product->stock}}" data-id="#addButton{{$product->id}}" required>
																	<label for="qty">Quantity</label>
																</div>
																<div class="input-field">
																	<button class="btn waves-effect waves-light yellow black-text" id="addButton{{$product->id}}"><i class="material-icons left">shopping_cart</i>Add to cart</button>
																</div>
															</form>
														</div>
													</div>
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
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="modal-content hide-on-large-only paddingAll10">
								<h6>Add this item to cart</h6>
								<hr>
								<div class="card darkGrey white-text">
									<div class="card-image">
										<a href="{{route('viewProduct', ['id' => $product->id])}}" class="waves-effect waves-light"><img src="/uploads/products/{{$product->productimage}}" class="addCartSmall"></a>
									</div>
									<div class="card-content paddingAll10">
										<div class="card-content paddingAll5Small paddingAll10 paddingBottom0">
											<p class="card-title">{{$product->name}}</p>
											<hr>
											<div class="row margin0">
												<div class="col s12 m6">
													<h6 class="paddingBottom10">BND${{$product->pricing}}</h6>
													<h6><strong>Availability: <span class="yellow-text">{{$product->stock}}</span></strong></h6>
												</div>
												<div class="col s12 m6">
													<form action="{{route('addToCart', ['id' => $product->id])}}" method="GET">
														@csrf
														<div class="input-field">
															<input type="number" min="0" name="qty" class="white-text quantity" data-max="{{$product->stock}}" data-id="#addButtonS{{$product->id}}" required>
															<label for="qty">Quantity</label>
														</div>
														<div class="input-field">
															<button class="btn waves-effect waves-light yellow black-text" id="addButtonS{{$product->id}}"><i class="material-icons left">shopping_cart</i>Add to cart</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
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