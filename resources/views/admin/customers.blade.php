@extends('layouts.admin')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset('css/admin/customers.css')}}">
@endsection

@section('content')
<div class="container90">
	<h5>Our Customers list</h5>
	<hr>
	<div class="container90 paddingTop20 paddingBottom20 marginTop30 marginBottom30 hidden" id="customerPanel">
		<div class="container90">
			<h6 class="paddingBottom10"><strong>Order history</strong><span class="right"><i class="material-icons close">close</i></span></h6>
			<hr>
			<table>
				<thead>
					<tr>
						<th class="center">Order id</th>
						<th class="center">Subtotal</th>
						<th class="center">Shipping</th>
						<th class="center">Total</th>
						<th class="center">Payment</th>
						<th class="center">Status</th>
					</tr>
				</thead>
				<tbody id="orderHistory"></tbody>

				@foreach($orders as $order)
				<div class="modal" id="cartModal{{$order->id}}">
					<div class="modal-content">
						<div class="row margin0">
							<div class="col s12 m6">
								<h6>Payment details</h6>
								<hr>
								<div class="row margin0">
									<div class="col s6 m6 left-align">
										<h6>Order number</h6>
										<h6>Subtotal</h6>
										<h6>Shipping</h6>
										<h6>Total</h6>
										<h6>Payment</h6>
										<h6>Status</h6>
									</div>
									<div class="col s6 m6 right-align">
										<h6>{{$order->id}}</h6>
										<h6>BND${{$order->total - $order->shipping}}</h6>
										<h6>BND${{$order->shipping}}</h6>
										<h6>BND${{$order->total}}</h6>
										<h6>{{$order->payment}}</h6>
										<h6>{{$order->status}}</h6>
									</div>
								</div>
							</div>
							<div class="col s12 m6">
								<h6>Order details</h6>
								<hr>
								<div class="row margin0">
									<div class="col s6 m6 left-align">
										<h6><strong>Cart</strong></h6>
										@foreach($order->products as $product)
										<h6>{{$product->name}}({{$product->pivot->qty}})</h6>
										@endforeach
									</div>
									<div class="col s6 m6 right-align">
										<h6><strong>BND$</strong></h6>
										@foreach($order->products as $product)
										<h6>{{$product->pivot->total}}</h6>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</table>
		</div>
	</div>
	<table class="highlight">
		<thead>
			<tr>
				<th>Username</th>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Email</th>
				<th>Address</th>
				<th>Contact no.</th>
				<th class="center">Total orders</th>
			</tr>
		</thead>
		
		<tbody>
			@foreach($customers as $customer)
				@if($customer->id == 3)
				@else
				<tr>
					<td><i class="material-icons left view" data-id="{{$customer->id}}">remove_red_eye</i>{{$customer->name}}</td>
					<td>{{$customer->firstname}}</td>
					<td>{{$customer->lastname}}</td>
					<td>{{$customer->email}}</td>
					<td>{{$customer->address}}</td>
					<td>{{$customer->phone}}</td>
					<td class="center">{{$customer->orders->count()}}</td>
				</tr>
				@endif
			@endforeach
		</tbody>
	</table>
</div>
@endsection

@section('js')
	<script src="{{asset('js/admin/customers.js')}}"></script>
@endsection