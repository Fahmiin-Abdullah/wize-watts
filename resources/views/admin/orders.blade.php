@extends('layouts.admin')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset('css/admin/orders.css')}}">
@endsection

@section('content')
<div class="container90">
	<h5>Our Orders list</h5>
	<hr>
	<table class="highlight">
		<thead>
			<tr>
				<th class="center">Order id</th>
				<th>User</th>
				<th class="center">Subtotal</th>
				<th class="center">Shipping</th>
				<th class="center">Total</th>
				<th class="center">Payment</th>
				<th class="center">Status</th>
				<th class="center">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($orders as $order)
			<tr>
				<td class="center">{{$order->id}}</td>
				<td>{{$order->user->name}}</td>
				<td class="center">{{$order->total - $order->shipping}}</td>
				<td class="center">{{$order->shipping}}</td>
				<td class="center">{{$order->total}}</td>
				<td class="center">{{$order->payment}}</td>
				<td class="center
					@switch($order->status)
						@case('Pending...')
						orange-text
							@break
						@case('Processing...')
						blue-text
							@break
						@case('Delivering...')
						purple-text
							@break
						@case('Closed!')
						green-text
							@break
						@case('Error')
						red-text
							@break		
					@endswitch
				">{{$order->status}}</td>
				<td class="center">
					<a href="#updateStatus{{$order->id}}" class="btn waves-effect waves-light green white-text modal-trigger"><i class="material-icons">explore</i></a>
				</td>
			</tr>

			<div class="modal" id="updateStatus{{$order->id}}">
				<form action="{{route('statusUpdate', ['id' => $order->id])}}" method="POST">
					@csrf
					<div class="modal-content paddingAll20">
						<h5 class="paddingBottom10">Details<span class="right"><button type="submit" class="btn waves-effect waves-light blue white-text"><i class="material-icons left">edit</i>Update</button></span></h5>
						<hr>
						<div class="row margin0 paddingTop10">
							@if($order->proof)
							<div class="col m6 center-align proof">
								<img src="/uploads/proof/{{$order->proof}}" class="materialboxed">
							</div>
							<div class="col m6">
							@endif
							<div class="col m12">
								<h6><strong>Status</strong></h6>
								<p class="orange-text">
									<label>
										<input name="status" type="radio" value="Pending..." checked />
										<span class="orange-text">Pending - Not yet seen by any admins or staff</span>
									</label>
								</p>
								<p class="blue-text">
									<label>
										<input name="status" type="radio" value="Processing..."/>
										<span class="blue-text">Processing - Validating proof and getting stock</span>
									</label>
								</p>
								<p class="purple-text">
									<label>
										<input name="status" type="radio" value="Delivering..."/>
										<span class="purple-text">Delivering - Product en route to customer</span>
									</label>
								</p>
								<p class="green-text">
									<label>
										<input name="status" type="radio" value="Closed!"/>
										<span class="green-text">Closed - Transaction complete and reciept sent</span>
									</label>
								</p>
								<p class="red-text">
									<label>
										<input name="status" type="radio" value="Error!"/>
										<span class="red-text">Error - Requires attention from Admin</span>
									</label>
								</p>
							</div>
						</div>
					</div>
				</form>
			</div>
			@endforeach
		</tbody>
	</table>
</div>
@endsection