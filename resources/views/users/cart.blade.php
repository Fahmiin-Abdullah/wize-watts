@extends('layouts.app')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset('css/users/cart.css')}}">
@endsection

@section('content')
<div class="container paddingTop30 paddingBottom30 paddingTopSmall60 fszSmall">
	<div class="card black white-text">
		<div class="card-content paddngAll10">
			<h5>My Cart</h5>
			<hr>
			@if(count($cartItems) > 0)
				<table>
					<thead>
						<tr>
							<th class="tableMed">Product</th>
							<th class="center hide-on-med-and-down">Quantity</th>
							<th class="center">Unit price<br>BND$</th>
							<th class="center">Total price<br>BND$</th>
							<th class="center hide-on-med-and-down">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($cartItems as $item)
						<tr>
							<td class="tableMed"><a href="/products/view/{{$item->id}}">{{$item->name}}<span class="hide-on-large-only"> ({{$item->qty}})</span></a></td>
							<td class="center hide-on-med-and-down">{{$item->qty}}</td>
							<td class="center">{{$item->price}}</td>
							<td class="center">{{$item->subtotal}}</td>
							<td class="hide-on-med-and-down">
								<div class="row">
									<div class="col m6 right-align">
										<a href="/products/view/{{$item->id}}" class="btn waves-effect waves-light black white-text action"><i class="material-icons left">add</i>Add more</a>
									</div>
									<div class="col m6 left-align">
										<a href="#deleteItem{{$item->id}}" class="btn waves-effect waves-light black white-text action modal-trigger"><i class="material-icons left">delete_forever</i>Delete</a>
									</div>
								</div>
							</td>
							<td class="hide-on-large-only">
								<a href="#deleteItem{{$item->id}}" class="btn waves-effect waves-light yellow modal-trigger deleteSmallBtn"><i class="material-icons black-text">delete_forever</i></a>
							</td>
						</tr>

						<tr class="modal" id="deleteItem{{$item->id}}">
							<td class="modal-content modalTable black-text">
								<h6 class="center paddingBottom20">Are you sure you want to remove this item?</h6>
								<table>
									<thead>
										<tr>
											<th class="tableMed">Product</th>
											<th class="center hide-on-med-and-down">Quantity</th>
											<th class="center">Unit price<br>BND$</th>
											<th class="center">Total price<br>BND$</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="tableMed"><a href="/products/view/{{$item->id}}" class="black-text">{{$item->name}}<span class="hide-on-large-only"> ({{$item->qty}})</span></a></td>
											<td class="center hide-on-med-and-down">{{$item->qty}}</td>
											<td class="center">{{$item->price}}</td>
											<td class="center">{{$item->subtotal}}</td>
										</tr>
									</tbody>
								</table>
								<form action="{{route('deleteItem', ['$id' => $item->rowId])}}" method="GET" class="paddingTop30">
									@csrf
									<div class="input-field center-align">
										<button class="btn waves-effect waves-light red white-text"><i class="material-icons left">delete_forever</i>delete</button>
									</div>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<hr>
				<div class="row margin0">
					<div class="col s12 m7">
						<div class="row">
							<div class="col s6 m6">
								<h6>Amount:</h6>
								<h6>Total shipping:</h6>
								<h5><strong>Total amount:</strong></h5>
							</div>
							<div class="col s6 m6">
								<h6 class="right-align">{{Cart::subtotal()}}</h6>
								@if(Cart::subtotal() <= 50.00)
								<h6 class="right-align">{{$shippingTotal}}</h6>
								@else
								<h6 class="right-align"><a class="yellow-text tooltipped" data-position="bottom" data-tooltip="$99.99 total shipping for overall purchase of $50.00 or more.">9.99</a></h6>
								@endif
								<h5 class="right-align"><strong>BND${{$cartTotal}}</strong></h5>
							</div>
						</div>
					</div>
					<div class="col m5 center-align paddingTop20 hide-on-med-and-down">
						<div class="row margin0">
							<div class="col s12 m6 right-align">
								<a href="#checkoutModal" class="btn waves-effect waves-light black white-text action modal-trigger
								@guest
								disabled
								@endguest"><i class="material-icons left">near_me</i>continue</a>
							</div>
							<div class="col s12 m6 left-align">
								<a href="/shop" class="btn waves-effect waves-light yellow black-text shop"><i class="material-icons left">shop</i>shop more</a>
							</div>
						</div>
						@guest
						<div class="paddingTop20">
							<a class="account" data-account="#signup">It seems that you're shopping as our valued guest, please login or signup to proceed</a>
						</div>
						@endguest
					</div>
					<div class="col s12 center-align hide-on-large-only">
						<div class="paddingTop30">
							<a href="#checkoutModal" class="btn waves-effect waves-light black white-text action modal-trigger
							@guest
							disabled
							@endguest"><i class="material-icons left">near_me</i>continue</a>
						</div>
						<div class="paddingTop10">
							<a href="/shop" class="btn waves-effect waves-light yellow black-text shop"><i class="material-icons left">shop</i>keep shopping</a>
						</div>
						@guest
						<div class="paddingTop20">
							<a class="account" data-account="#signup">It seems that you're shopping as our valued guest, please login or signup to proceed</a>
						</div>
						@endguest
					</div>
				</div>
				@else
				<h5 class="center">You have no items currently!</h5>
				<div class="center-align">
					<a href="/shop" class="btn waves-effect waves-light yellow black-text marginTop30 goTo"><i class="material-icons left">shop</i>Shop now!</a>
				</div>
			@endif
		</div>
	</div>
</div>

<div class="modal" id="checkoutModal">
	<div class="modal-content darkGrey white-text checkoutModal">
		<h5 class="paddingTop10Small paddingLeft10Small marginSmall0">Just one last thing...</h5>
		<div class="row paddingTop20 marginSmall0">
			<div class="col s12">
				<ul class="tabs darkGrey white-text">
					<li class="tab col s6 m6"><a href="#transfer">Bank transfer</a></li>
					<li class="tab col s6 m6"><a href="#cash">Cash payment</a></li>
				</ul>
			</div>
			<div id="transfer" class="col s12">
				<p>Choose a cashless way of paying for our service. Please transfer the approriate funds to this account</p>
				<h6 class="center">972 91781 817</h6>
				<p>and provide us a screenshot of the transfer. A receipt will be mailed to your set email address after the transaction is complete.</p>
				<h6 class="paddingTop30">Details</h6>
				<hr>
				<div class="row">
					<div class="col s6 m6">
						<h6>Amount:</h6>
						<h6>Total shipping:</h6>
						<h5><strong>Total amount:</strong></h5>
					</div>
					<div class="col s6 m6">
						<h6 class="right-align">{{Cart::subtotal()}}</h6>
						@if(Cart::subtotal() <= 50.00)
						<h6 class="right-align">{{$shippingTotal}}</h6>
						@else
						<h6 class="right-align"><a class="yellow-text tooltipped" data-position="bottom" data-tooltip="$99.99 total shipping for overall purchase of $50.00 or more.">9.99</a></h6>
						@endif
						<h5 class="right-align"><strong>BND${{$cartTotal}}</strong></h5>
					</div>
				</div>
				<form action="{{route('createOrder')}}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="file-field input-field center-align">
						<div class="btn waves-effect waves-light yellow black-text">
							<span><i class="material-icons left hide-on-med-and-down">file_upload</i><span class="hide-on-med-and-down">Upload</span><i class="material-icons hide-on-large-only">file_upload</i></span>
							<input type="file" name="proof" required>
						</div>
						<div class="file-path-wrapper white-text">
							<input class="file-path validate white-text" type="text" value="Add your screenshot here">
						</div>
					</div>
					<input type="hidden" name="payment" value="transfer">
					<div class="input-field center-align paddingTop30">
						<button class="btn waves-effect waves-light yellow black-text"><i class="material-icons left">near_me</i>Checkout</button>
					</div>
				</form>
			</div>
			<div id="cash" class="col s12">
				<p>You have chosen for cash payment. Our deliveryman will provide you a receipt of the transaction upon product delivery.</p>
				<h6 class="paddingTop30">Details</h6>
				<hr>
				<div class="row">
					<div class="col s6 m6">
						<h6>Amount:</h6>
						<h6>Total shipping:</h6>
						<h5><strong>Total amount:</strong></h5>
					</div>
					<div class="col s6 m6">
						<h6 class="right-align">{{Cart::subtotal()}}</h6>
						@if(Cart::subtotal() <= 50.00)
						<h6 class="right-align">{{$shippingTotal}}</h6>
						@else
						<h6 class="right-align yellow-text">9.99</h6>
						@endif
						<h5 class="right-align"><strong>BND${{$cartTotal}}</strong></h5>
					</div>
				</div>
				<form action="{{route('createOrder')}}" method="POST">
					@csrf
					<input type="hidden" name="payment" value="cash">
					<div class="input-field center-align">
						<button class="btn waves-effect waves-light yellow black-text"><i class="material-icons left">near_me</i>Checkout</button>
					</div>
				</form>
			</div>
		</div> 
	</div>
</div>
@endsection