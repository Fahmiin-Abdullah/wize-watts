@extends('layouts.app')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset('css/users/product.css')}}">
@endsection

@section('content')
<div class="container80 container90Small paddingTop30 paddingBottom30 paddingTop70Small">
	<div class="row white-text">
		<div class="col s12 m5">
			<div class="card">
				<div class="card-image">
					<img src="/uploads/products/{{$product->productimage}}" class="materialboxed">
				</div>
			</div>
		</div>
		<div class="col s12 m7">
			<h5>{{$product->name}}</h5>
			<hr>
			<p>{{$product->description}}</p>
			<br>
			<h5>BND${{$product->pricing}}</h5>
			<p class="left"><strong>Available in stock: </strong><span class="yellow-text">{{$product->stock}}</span></p>
			<p class="right"><strong>Shipping: </strong>BND$<em>{{$product->shipping}}</em></p>
			<div class="row paddingTop70">
				<form action="{{route('addToCart', ['id' => $product->id])}}" method="GET">
					@csrf
					<div class="col s6 m4">
						<div class="input-field center-align">
							<input type="number" min="0" name="qty" class="white-text quantity" data-max="{{$product->stock}}" data-id="#addButtonP{{$product->id}}" required>
							<label for="qty">Quantity</label>
						</div>
					</div>
					<div class="col s3 m4">
						<div class="input-field center-align">
							<button class="btn waves-effect waves-light black white-text" id="addButtonP{{$product->id}}"><i class="material-icons left">shopping_cart</i><span class="hide-on-med-and-down">Add to cart</span></button>
						</div>
					</div>
				</form>
				<div class="col s3 m4">
					<div class="input-field center-align">
						<button class="btn waves-effect waves-light black white-text favorite
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
						" data-favid="{{$product->id}}"><i class="material-icons left">favorite</i><span class="hide-on-med-and-down">Add to favlist</span></button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col s12 padding0">
			<ul class="tabs black">
				<li class="tab col s4"><a href="#details">Details</a></li>
				<li class="tab col s4"><a href="#reviews">Reviews</a></li>
				<li class="tab col s4"><a href="#related">Related</a></li>
			</ul>
		</div>
		<div id="details" class="col s12 tabPanel">
			<p>{{$product->details}}</p>
		</div>
		<div id="reviews" class="col s12 tabPanel">
			<p>Comment about the product, service or anything on your mind</p>
			<ul class="collection">
				@if(count($product->reviews) < 0)
				<li class="collection-item"><h5 class="center">No reviews yet for this product!</h5></li>
				@else
					@foreach($product->reviews as $review)
					<li class="collection-item">
						<div>
							<p class="black-text left"><strong>{{$review->user->name}}</strong></p>
							<p class="black-text right"><strong>{{$review->created_at->diffForHumans()}}</strong></p>
						</div>
						<div class="paddingTop50">
							<h6>{{$review->title}}</h6>
							<p>{{$review->body}}</p>
							@if($review->user_id == $user->id)
							<a href="#deleteReviewModal{{$review->id}}" class="btn waves-effect waves-light red white-text right modal-trigger"><i class="material-icons left">close</i>Delete</a>
							<a href="#editReviewModal{{$review->id}}" class="btn waves-effect waves-light blue white-text right modal-trigger"><i class="material-icons left">edit</i>Edit</a>
							@endif
						</div>
					</li>

					<li class="modal" id="deleteReviewModal{{$review->id}}">
						<div class="modal-content">
							<h5 class="center">Are you sure you want to delete this review?</h5>
							<ul class="collection hide-on-med-and-down">
								<li class="collection-item">
									<div>
										<p class="black-text left"><strong>{{$review->user->name}}</strong></p>
										<p class="black-text right"><strong>{{$review->created_at->diffForHumans()}}</strong></p>
									</div>
									<div class="paddingTop50">
										<h6>{{$review->title}}</h6>
										<p>{{$review->body}}</p>
									</div>
								</li>
							</ul>
							<form action="{{route('deleteReview', ['id' => $review->id])}}" method="POST">
								@csrf
								@method('DELETE')
								<div class="input-field center-align paddingTop30Small">
									<button class="btn waves-effect waves-light red white-text">Yes, delete</button>
								</div>
							</form>
						</div>
					</li>

					<li class="modal" id="editReviewModal{{$review->id}}">
						<div class="modal-content">
							<h6>Editing...</h6>
							<form action="{{route('editReview', ['id' => $review->id])}}" method="POST">
								@csrf
								<div class="input-field">
									<input type="text" name="title" value="{{$review->title}}" required>
								</div>
								<div class="input-field">
									<textarea name="body" class="materialize-textarea">{{$review->body}}</textarea>
								</div>
								<div class="input-field">
									<button class="btn waves-effect waves-light blue white-text"><i class="material-icons left">send</i>Update</button>
								</div>
							</form>
						</div>
					</li>
					@endforeach
				@endif
			</ul>
			<hr>
			@auth
			<div class="container90 paddingTop10 paddingBottom10
				@foreach($product->reviews as $review)
					{{($review->user_id != $user->id) ? '' : 'hidden'}}
				@endforeach">
				<div class="card">
					<div class="card-content">
						<div class="card-title paddingBottom10">What are your thoughts?</div>
						<form action="{{route('writeReview', ['id' => $product->id])}}" method="POST">
							@csrf
							<div class="input-field">
								<input type="text" name="title" required>
								<label for="title">Subject</label>
							</div>
							<div class="input-field">
								<textarea name="body" class="materialize-textarea" required></textarea>
								<label for="body">Write a review for this product</label>
							</div>
							<div class="input-field right">
								<button class="btn waves-effect waves-light black white-text"><i class="material-icons left">send</i>Post</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			@else
			<h5 class="center">Please log in to post a review</h5>
			@endauth
		</div>
		<div id="related" class="col s12 tabPanel">
			<p>Find out similar products in the category</p>
			<div class="row">
				@foreach($products as $item)
				<div class="col s12 m6">
					<div class="card horizontal darkGrey white-text">
						<div class="card-image">
							<a href="{{route('viewProduct', ['id' => $item->id])}}" class="waves-effect waves-light"><img src="/uploads/products/{{$item->productimage}}" class="relatedSmall"></a>
						</div>
						<div class="card-stacked">
							<div class="card-content center-align paddingAll5Small paddingAll10">
								<p class="card-title">{{$item->name}}</p>
								<h6 class="paddingBottom10">BND${{$item->pricing}}</h6>
								<h6 class="paddingBottom10"><strong>Availability: <span class="yellow-text">{{$item->stock}}</span></strong></h6>
								@foreach($item->tags as $tag)
								<span class="chip hide-on-med-and-down">{{$tag->tag}}</span>
								@endforeach
								<a class="btn-floating halfway-fab waves-effect waves-light yellow tooltipped hide-on-med-and-down" data-position="top" data-tooltip="Add to favlist"><i class="material-icons black-text">favorite</i></a>
							</div>
							<div class="card-action black paddingAll5Small">
								<a href="#cartModal{{$item->id}}" class="white-text smallFont left hide-on-med-and-down modal-trigger">Add to cart</a>
								<div class="row margin0">
									<div class="col s6 center-align">
										<a href="#"><i class="material-icons white-text hide-on-large-only">favorite</i></a>
									</div>
									<div class="col s6 center-align">
										<a href="#cartModal{{$item->id}}" class="modal-trigger"><i class="material-icons white-text hide-on-large-only">add_shopping_cart</i></a>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="modal" id="cartModal{{$item->id}}">
						<div class="modal-content hide-on-med-and-down">
							<h5>Add this item to your cart</h5>
							<hr>
							<div class="row">
								<div class="col m12">
									<div class="card horizontal darkGrey white-text">
										<div class="card-image">
											<a href="{{route('viewProduct', ['id' => $item->id])}}" class="waves-effect waves-light"><img src="/uploads/products/{{$item->productimage}}"></a>
										</div>
										<div class="card-stacked">
											<div class="card-content paddingAll5Small paddingAll10 paddingBottom0">
												<p class="card-title">{{$item->name}}</p>
												<hr>
												<div class="row margin0">
													<div class="col m6">
														<h6 class="paddingBottom10">BND${{$item->pricing}}</h6>
														<h6><strong>Availability: <span class="yellow-text">{{$item->stock}}</span></strong></h6>
													</div>
													<div class="col m6">
														<form action="{{route('addToCart', ['id' => $product->id])}}" method="GET">
															@csrf
															<div class="input-field">
																<input type="number" min="0" name="qty" class="white-text quantity" data-max="{{$item->stock}}" data-id="#addButton{{$item->id}}" required>
																<label for="qty">Quantity</label>
															</div>
															<div class="input-field">
																<button class="btn waves-effect waves-light yellow black-text" id="addButton{{$item->id}}"><i class="material-icons left">shopping_cart</i>Add to cart</button>
															</div>
														</form>
													</div>
												</div>
												<a data-favid="{{$item->id}}" class="favorite
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
									<a href="{{route('viewProduct', ['id' => $item->id])}}" class="waves-effect waves-light"><img src="/uploads/products/{{$item->productimage}}" class="addCartSmall"></a>
								</div>
								<div class="card-content paddingAll10">
									<div class="card-content paddingAll5Small paddingAll10 paddingBottom0">
										<p class="card-title">{{$item->name}}</p>
										<hr>
										<div class="row margin0">
											<div class="col s12 m6">
												<h6 class="paddingBottom10">BND${{$item->pricing}}</h6>
												<h6><strong>Availability: <span class="yellow-text">{{$item->stock}}</span></strong></h6>
											</div>
											<div class="col s12 m6">
												<form action="{{route('addToCart', ['id' => $product->id])}}" method="GET">
													@csrf
													<div class="input-field">
														<input type="number" min="0" name="qty" class="white-text quantity" data-max="{{$item->stock}}" data-id="#addButtonS{{$item->id}}"required>
														<label for="qty">Quantity</label>
													</div>
													<div class="input-field">
														<button class="btn waves-effect waves-light yellow black-text" id="addButtonS{{$item->id}}"><i class="material-icons left">shopping_cart</i>Add to cart</button>
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
				@endforeach
			</div>
		</div>
  	</div>
</div>
@endsection

@section('js')
	<script src="{{asset('js/users/product.js')}}"></script>
@endsection