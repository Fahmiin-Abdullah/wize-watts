@extends('layouts.admin')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset('css/admin/customers.css')}}">
@endsection

@section('content')
<div class="container90">
	<h5>Our Customer list</h5>
	<hr>
	<div class="container90 paddingTop20 paddingBottom20 marginTop30 marginBottom30 hidden" id="customerPanel">
		<div class="container90">
			<h6><strong>Order history</strong><span class="right"><i class="material-icons close">close</i></span></h6>
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
			<tr>
				<td><i class="material-icons left view" data-id="{{$customer->id}}">remove_red_eye</i>{{$customer->name}}</td>
				<td>{{$customer->firstname}}</td>
				<td>{{$customer->lastname}}</td>
				<td>{{$customer->email}}</td>
				<td>{{$customer->address}}</td>
				<td>{{$customer->phone}}</td>
				<td class="center">0</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection

@section('js')
	<script src="{{asset('js/admin/customers.js')}}"></script>
@endsection