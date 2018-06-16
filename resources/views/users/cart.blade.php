@extends('layouts.app')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset('css/users/cart.css')}}">
@endsection

@section('content')
<div class="container">
	<div class="card black white-text marginTop30">
		<div class="card-content paddngAll10">
			<h5>My Cart</h5>
			<hr>
			@if($cartItems)
				<table>
					<thead>
						<tr>
							<th>Product</th>
							<th class="center">Quantity</th>
							<th class="center">Unit price<br>BND$</th>
							<th class="center">Total price<br>BND$</th>
							<th class="center">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($cartItems as $item)
						<tr>
							<td><a href="/products/view/{{$item->id}}">{{$item->name}}</a></td>
							<td class="center">{{$item->qty}}</td>
							<td class="center">{{$item->price}}</td>
							<td class="center">{{$item->subtotal}}</td>
							<td>
								<div class="row">
									<div class="col m6 right-align">
										<a href="/products/view/{{$item->id}}" class="btn waves-effect waves-light black white-text action"><i class="material-icons left">add</i>Add more</a>
									</div>
									<div class="col m6 left-align">
										<a href="#deleteItem{{$item->id}}" class="btn waves-effect waves-light black white-text action modal-trigger"><i class="material-icons left">delete_forever</i>Delete</a>
									</div>
								</div>
							</td>
						</tr>

						<tr class="modal" id="deleteItem{{$item->id}}">
							<td class="modal-content modalTable black-text">
								<h6 class="center paddingBottom20">Are you sure you want to remove this item?</h6>
								<table>
									<thead>
										<tr>
											<th>Product</th>
											<th class="center">Quantity</th>
											<th class="center">Unit price<br>BND$</th>
											<th class="center">Total price<br>BND$</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><a href="/products/view/{{$item->id}}" class="black-text">{{$item->name}}</a></td>
											<td class="center">{{$item->qty}}</td>
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
			@else
			<h5 class="center">You have no items currently!</h5>
			<div class="center-align">
				<a href="/shop" class="btn waves-effect waves-light yellow black-text marginTop30 goTo"><i class="material-icons left">shop</i>Shop now!</a>
			</div>
			@endif
			<hr>
			<div class="row">
				<div class="col m6">
					<h5 class="left"><strong>Total amount:</strong></h5>
					<h5 class="right"><strong>BND${{Cart::subtotal()}}</strong></h5>
				</div>
				<div class="col m6 center-align paddingTop20">
					<div class="row">
						<div class="col m6 right-align">
							<button class="btn waves-effect waves-light black white-text action"><i class="material-icons left">near_me</i>checkout</button>
						</div>
						<div class="col m6 left-align">
							<a href="/shop" class="btn waves-effect waves-light yellow black-text shop"><i class="material-icons left">shop</i>keep shopping</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection