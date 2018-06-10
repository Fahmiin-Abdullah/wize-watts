<div class="navbar-fixed hide-on-med-and-down">
	<nav class="black white-text">
		<div class="nav-wrapper container">
			<ul class="paddingLeft300">
				<li><a href="">Home</a></li>
				<li><a href="">Shop now!</a></li>
				<li><a href="">About us</a></li>
				<li><a href=""><i class="material-icons left">shopping_cart</i>My cart</a></li>
				@auth
				<li class="right"><a class="account" data-account="#logout">Logout</a></li>
				<li class="right"><a href=""><i class="material-icons left">person</i>Welcome, {{$user->name}}</a></li>
				@else
				<li class="right"><a class="account" data-account="#login">Login</a></li>
				<li class="right"><a class="account" data-account="#signup">Signup</a></li>
				@endauth
			</ul>
		</div>
	</nav>
</div>

<div class="dropdownContent hidden section2" id="signup">
	<div class="card">
		<div class="card-panel">
			<span><a class="black-text close" data-close="#signup"><i class="material-icons right">close</i></a></span>
			<form action="{{asset('signup')}}" method="POST">
				@csrf
				<div class="input-field">
					<input type="text" name="name" required>
					<label for="name">Username</label>
				</div>
				<div class="input-field">
					<input type="email" name="email" required>
					<label for="email">Email</label>
				</div>
				<div class="input-field">
					<input type="password" name="password" required>
					<label for="password">Password</label>
				</div>
				<div class="input-field center-align">
					<button class="btn waves-effect waves-light yellow black-text" type="submit">Login</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="dropdownContent hidden section2" id="login">
	<div class="card">
		<div class="card-panel">
			<span><a class="black-text close" data-close="#login"><i class="material-icons right">close</i></a></span>
			<form action="{{asset('login')}}" method="POST">
				@csrf
				<div class="input-field">
					<input type="text" name="name" required>
					<label for="name">Username</label>
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

<div class="dropdownContent hidden section2" id="logout">
	<div class="card">
		<div class="card-panel">
			<span><a class="black-text close" data-close="#logout"><i class="material-icons right">close</i></a></span>
			<h5 class="card-title center">Are you sure? We're sad to see you go</h5>
			<form action="{{asset('logout')}}" method="POST">
				@csrf
				<div class="input-field center-align">
					<button class="btn waves-effect waves-light yellow black-text" type="submit">Bye!</button>
				</div>
			</form>
		</div>
	</div>
</div>

<ul class="collapsible white-text hide-on-large-only">
	<li>
		<div class="collapsible-header black borderOFF"><i class="material-icons">menu</i></div>
		<div class="collapsible-body black white-text padding0">
			<div class="row paddingTop20">
				<div class="col s3 center-align">
					<a href="#" class="waves-effect waves-light"><i class="material-icons">home</i></a>
				</div>
				<div class="col s3 center-align">
					<a href="#" class="waves-effect waves-light"><i class="material-icons">shop</i></a>
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