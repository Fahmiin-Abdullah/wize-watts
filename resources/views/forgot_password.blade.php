@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row paddingTop80 paddingBottom80">
		<div class="col s12 m6 offset-m3">
			<div class="card">
				<div class="card-content">
					<h6 class="center">Please enter your email here and click reset. A reset password email will be sent to your shortly.</h6>
					<br>
					<form action="{{route('password.email')}}" method="POST">
						@csrf
						<div class="input-field">
							<input type="email" name="email" required>
							<label for="email">Email</label>
						</div>
						<div class="input-field center-align">
							<button class="btn waves-effect waves-light yellow black-text"><i class="material-icons left">send</i>Reset!</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection