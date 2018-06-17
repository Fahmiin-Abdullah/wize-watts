@extends('layouts.app')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset('css/users/thankyou.css')}}">
@endsection

@section('content')
<div class="container">
	<h4 class="center margin0 paddingTop80 paddingBottom20"><strong class="yellow-text">Thank yor for shopping with us!</strong></h4>
	<h6 class="center paddingBottom30 white-text">Keep an eye out for your orders in the orders section in your profile page.</h6>
	<div class="center-align">
		<img src="{{asset('/img/thankyou.jpg')}}">
	</div>
	<div class="center-align paddingTop30 paddingBottom30">
		<a href="/shop">Still need more stuff? Click here to browse through some of our popular categories</a>
	</div>
</div>
@endsection