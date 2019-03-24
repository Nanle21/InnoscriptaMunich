@extends('layout.master')

@section('title')
	Welcome
@endsection

@section('content')
	<!-- <example></example> -->
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-26">
						Welcome
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-functions"></i>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid name is: John Doe">
						<input class="input100" type="text" id="name" name="name" required="">
						<span class="focus-input100" data-placeholder="Name"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="email" id="email" name="email" required="">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<!-- <div class="wrap-input100 validate-input" data-validate = "Valid email is: password">
						<input class="input100" type="password" id="password" name="password" required="">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div> -->

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" onclick="addUser()" type="button">
								Start Test
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection