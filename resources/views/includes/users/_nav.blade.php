<div class="navbar-fixed hide-on-med-and-down">
	<nav class="black white-text">
		<div class="nav-wrapper container">
			<ul>
				<li><a href="/">Home</a></li>
				<li><a href="/shop">Shop now!</a></li>
				<li><a href="">About us</a></li>
				<li><a href=""><i class="material-icons left">shopping_cart</i>My cart</a></li>
				@auth
				<li class="right"><a class="account" data-account="#logout">Logout</a></li>
				<li class="right"><a href="/profile"><i class="material-icons left">person</i>Welcome, {{$user->name}}</a></li>
				@else
				<li class="right"><a class="account" data-account="#login">Login</a></li>
				<li class="right"><a class="account" data-account="#signup">Signup</a></li>
				@endauth
			</ul>
		</div>
	</nav>
</div>

<ul class="collapsible white-text hide-on-large-only navSmall">
	<li>
		<div class="row margin0 black">
			<div class="col s2 padding0">
				<div class="collapsible-header black borderOFF"><i class="material-icons">menu</i></div>
			</div>
			<div class="col s10 paddingTop15">
				@auth
				<a class="modal-trigger waves-effect waves-light right" href="#logoutModal">Logout</a>
				<a class="waves-effect waves-light right paddingRight20Small" href="/profile"><i class="material-icons left">person</i>Welcome, {{$user->name}}</a>
				@else
				<a class="modal-trigger waves-effect waves-light right" href="#loginModal">Login</a>
				<a class="modal-trigger waves-effect waves-light right paddingRight20Small" href="#signupModal">Signup</a>
				@endauth
			</div>
		</div>
		
		<div class="collapsible-body black white-text padding0">
			<div class="row paddingTop20">
				<div class="col s3 center-align">
					<a href=/#" class="waves-effect waves-light"><i class="material-icons">home</i></a>
				</div>
				<div class="col s3 center-align">
					<a href="/shop" class="waves-effect waves-light"><i class="material-icons">shop</i></a>
				</div>
				<div class="col s3 center-align">
					<a href="#" class="waves-effect waves-light"><i class="material-icons">group</i></a>
				</div>
				<div class="col s3 center-align">
					<a href="#" class="waves-effect waves-light"><i class="material-icons">shopping_cart</i></a>
				</div>
			</div>
		</div>
	</li>
</ul>

<div class="dropdownContent hidden section2" id="signup">
	<div class="card">
		<div class="card-panel">
			<span><a class="black-text close" data-close="#signup"><i class="material-icons right">close</i></a></span>
			<form action="{{route('signup')}}" method="POST">
				@csrf
				<div class="input-field">
					<input type="text" name="name" value="{{Request::old('name')}}" required>
					<label for="name">Username</label>
				</div>
				<div class="input-field">
					<input type="email" name="email" value="{{Request::old('email')}}" required>
					<label for="email">Email</label>
				</div>
				<div class="input-field">
					<input type="password" name="password" required>
					<label for="password">Password</label>
				</div>
				<div class="input-field center-align">
					<button class="btn waves-effect waves-light yellow black-text" type="submit">Signup</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="dropdownContent hidden section2" id="login">
	<div class="card">
		<div class="card-panel">
			<span><a class="black-text close" data-close="#login"><i class="material-icons right">close</i></a></span>
			<form action="{{route('login')}}" method="POST">
				@csrf
				<div class="input-field">
					<input type="text" name="name" value="{{Request::old('name')}}" required>
					<label for="name">Username</label>
				</div>
				<div class="input-field">
					<input type="password" name="password" required>
					<label for="password">Password</label>
				</div>
				<div class="input-field">
					<p><label>
						<input type="checkbox" name="remember">
						<span>Remember me</span>
					</label></p>
				</div>
				<div class="input-field">
					<a href="{{route('password.request')}}" class="black-text">Forgot my password</a>
				</div>
				<div class="input-field center-align">
					<button class="btn waves-effect waves-light yellow black-text" type="submit">Login</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="dropdownContent hidden section2" id="logout">
	<div class="card">
		<div class="card-panel">
			<span><a class="black-text close" data-close="#logout"><i class="material-icons right">close</i></a></span>
			<h5 class="card-title center">Are you sure? We're sad to see you go</h5>
			<form action="{{route('logout')}}" method="POST">
				@csrf
				<div class="input-field center-align">
					<button class="btn waves-effect waves-light yellow black-text" type="submit">Bye!</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal" id="signupModal">
	<div class="modal-content">
		<h5 class="center">Signup</h5>
		<form action="{{route('signup')}}" method="POST">
			@csrf
			<div class="input-field">
				<input type="text" name="name" value="{{Request::old('name')}}" required>
				<label for="name">Username</label>
			</div>
			<div class="input-field">
				<input type="email" name="email" value="{{Request::old('email')}}: required>
				<label for="email">Email</label>
			</div>
			<div class="input-field">
				<input type="password" name="password" required>
				<label for="password">Password</label>
			</div>
			<div class="input-field center-align">
				<button class="btn waves-effect waves-light yellow black-text" type="submit">Signup</button>
			</div>
		</form>
	</div>
</div>

<div class="modal" id="loginModal">
	<div class="modal-content">
		<h5 class="center">Login</h5>
		<form action="{{route('login')}}" method="POST">
			@csrf
			<div class="input-field">
				<input type="text" name="name" value="{{Request::old('name')}}" required>
				<label for="name">Username</label>
			</div>
			<div class="input-field">
				<input type="password" name="password" required>
				<label for="password">Password</label>
			</div>
			<div class="input-field">
				<p><label>
					<input type="checkbox" name="remember">
					<span>Remember me</span>
				</label></p>
			</div>
			<div class="input-field">
				<a href="{{route('password.request')}}" class="black-text">Forgot my password</a>
			</div>
			<div class="input-field center-align">
				<button class="btn waves-effect waves-light yellow black-text" type="submit">Login</button>
			</div>
		</form>
	</div>
</div>

<div class="modal" id="logoutModal">
	<div class="modal-content">
		<h5 class="center">Are you sure? We're sad to see you go</h5>
		<div class="row">
			<div class="col s6 center-align">
				<div class="input-field">
					<a href="#" class="btn waves-effect waves-light yellow black-text">Cancel</a>
				</div>
			</div>
			<div class="col s6 center-align">
				<form action="{{route('logout')}}" method="POST">
					@csrf
					<div class="input-field">
						<button class="btn waves-effect waves-light yellow black-text">Yes, bye!</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>