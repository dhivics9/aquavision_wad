<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login Form</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <link rel="icon" href="{{ asset('images/icon.png') }}">
	</head>

	<body>
    <div class="wrapper" style="background-color: white">
        <div class="inner">
            <div class="image-holder">
                <img src="{{ asset('images/login.png') }}" alt="">
            </div>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <h3>Welcome to AquaVision</h3>
                <div class="form-wrapper">
                    <input type="text" name="email" placeholder="Email Address" class="form-control">
                    <i class="zmdi zmdi-email"></i>
                </div>
                <div class="form-wrapper">
                    <input type="password" name="password" placeholder="Password" class="form-control">
                    <i class="zmdi zmdi-lock"></i>
                </div>
                <button type="submit">Login
                    <i class="zmdi zmdi-arrow-right"></i>
                </button>
                <h4 class="center-text" style="margin-top: 1rem">Don't have an account? <a href="{{ route('registration') }}">Register</a></h4>
            </form>
        </div>
    </div>
</body>
</html>