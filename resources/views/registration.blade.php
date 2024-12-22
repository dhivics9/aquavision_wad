<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login Form</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	</head>

	<body>

		<div class="wrapper" style="background-image: url({{ asset('images/bg-registration-form-wtp.jpg') }});">
			<div class="inner">
				<div class="image-holder">
					<img src="images/registration-form-telu.png" alt="">
				</div>
				<form action=""{{ route('registration') }}" method="POST"">
					<h3>Welcome to AquaVision</h3>
					<div class="form-wrapper">
						<input type="text" placeholder="Name" class="form-control">
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Username" class="form-control">
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Email Address" class="form-control">
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Password" class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Confirm Password" class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<button>Register
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
					<h4>Already have an account? <a href="{{ route('login') }}">Login</a></h4>
				</form>
			</div>
		</div>
		
	</body>
</html>