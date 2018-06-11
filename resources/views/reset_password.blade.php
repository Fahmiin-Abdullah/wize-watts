@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row paddingTop80 paddingBottom80">
		<div class="col s12 m6 offset-m3">
			<div class="card">
				<div class="card-content">
					<h5 class="center">Reset your password here</h5>
					<br>
					<form action="{{route('password.reset')}}" method="POST">
						@csrf
						<input type="hidden" name="token" value="{{$token}}">
						<div class="input-field">
							<input type="email" name="email" value="{{$email}}" required>
							<label for="email">Email</label>
						</div>
						<div class="input-field">
							<input type="password" name="password" required>
							<label for="password">Password</label>
						</div>
						<div class="input-field">
							<input type="password" name="password_confirmation" required>
							<label for="password_confirmation">Confirm password</label>
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