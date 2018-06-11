@extends('layouts.app')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset('css/users/main.css')}}">
@endsection

@section('content')
<div class="showcase center-align paddingBottom30 paddingTop50Small">
	<a href="/"><img src="{{asset('img/logo.png')}}" class="section"></a>
	<h5 class="white-text section">A Virtual Electronics Supply Hub</h5>
	<h2 class="center paddingTop10 margin0 white-text section"><strong>One stop shop for all your electronics need</strong></h2>
	<div class="container hide-on-med-and-down">
		<div class="row paddingTop80 section center-align">
			<form action="" method="GET">
				@csrf
				<div class="col m10">
					<div class="input-field">
						<input type="search" name="quickSearch" placeholder="Search for a component" required>
					</div>
				</div>
				<div class="col m2">
					<div class="input-field paddingTop10">
						<button class="btn waves-effect waves-light yellow black-text"><i class="material-icons left">search</i>Search</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="hide-on-large-only paddingTop30">
		<a href="/shop" class="btn waves-effect waves-light yellow black-text center">Shop now!</a>
	</div>
</div>

<div class="darkGrey">
	<div class="row container80 white-text">
		<h3 class="center margin0 paddingTop50 paddingBottom20">Why choose us?</h3>
		<div class="col s12 m4 center-align paddingAll50 paddingAll20Small">
			<i class="large material-icons yellow-text">laptop_mac</i>
			<hr>
			<h3>Fast</h3>
			<p>Browse, order and purchase right in the comfort of your own home. Wize Watts believe in the power of the internet, choosing to have a virtual store with ease for the customers in mind.</p>
		</div>
		<div class="col s12 m4 center-align paddingAll50 paddingAll20Small">
			<i class="large material-icons yellow-text">local_shipping</i>
			<hr>
			<h3>Convenient</h3>
			<p>We provide fast and reliable delivery services at low rates for our most loyal customers. Wize Watts wants to create a hassle-free transaction so that you can focus more on the creating.</p>
		</div>
		<div class="col s12 m4 center-align paddingAll50 paddingAll20Small">
			<i class="large material-icons yellow-text">attach_money</i>
			<hr>
			<h3>Worthwhile</h3>
			<p>Wize Watts is one of the unique online stores in Brunei. We want to grant our customers the ability to purchase electronic goods through a trusted vendor and at a reasonable pricing scheme.</p>
		</div>
	</div>
</div>

<div class="black paddingBottom50">
	<h3 class="white-text center margin0 paddingTop50 paddingBottom30">Some of our popular categories</h3>
	<div class="row container80 black-text container90">
		<div class="col s12 m6">
			<div class="card category">
				<div class="card-image">
					<img src="{{asset('img/arduino.jpg')}}" class="waves-effect waves-light activator">
				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4">For Arduino Enthusiasts<i class="material-icons right">close</i></span>
					<p>From modules, to shields, to accessories that you never thought you needed, we got them. Visit our Arduino Things section to find out more.</p>
					<a href="" class="btn waves-effect waves-light yellow black-text">That's for me!</a>
				</div>
			</div>
		</div>
		<div class="col s12 m6">
			<div class="card category">
				<div class="card-image">
					<img src="{{asset('img/electrical.jpg')}}" class="waves-effect waves-light activator">
				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4">For All Things Electrical<i class="material-icons right">close</i></span>
					<p>We provide supplements for our electrical engineers out there. From tools, components and the plentiful of resistors, find them in this category.</p>
					<a href="" class="btn waves-effect waves-light yellow black-text">Let's go!</a>
				</div>
			</div>
		</div>
		<div class="col s12 m8">
			<div class="card category">
				<div class="card-image">
					<img src="{{asset('img/circuit.jpg')}}" class="waves-effect waves-light activator">
				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4">Explore the abundance<i class="material-icons right">close</i></span>
					<p>Enjoy browsing through our catalog? You can find our best selling products and promotions in our discovery page.</p>
					<a href="" class="btn waves-effect waves-light yellow black-text">Count me in!</a>
				</div>
			</div>
		</div>
		<div class="col s12 m4">
			<div class="card category">
				<div class="card-image">
					<img src="{{asset('img/courses.jpg')}}" class="waves-effect waves-light activator">
				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4">Like learning?<i class="material-icons right">close</i></span>
					<p>Compiled with love by our electrical engineers at Wize Watts. Find more than 30+ open-source project courses that you can use to start building your very first machine!</p>
					<a href="" class="btn waves-effect waves-light yellow black-text">Wow!</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="darkGrey paddingBottom20">
	<h4 class="white-text center margin0 paddingTop50 paddingBottom30 paddingLeft20Small paddingRight20Small">Join our mailing list for the latest and greatest news!</h4>
	<div class="container">
		<div class="row paddingTop15 margin0 section center-align">
			<form action="" method="POST">
				<div class="col s12 m9">
					<div class="input-field">
						<input class="mailList" type="search" name="mailList" placeholder="Enter your email here" required>
					</div>
				</div>
				<div class="col s12 m3">
					<div class="input-field paddingTop10">
						<button class="btn waves-effect waves-light yellow black-text"><i class="material-icons left">mail</i>Subscribe</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection