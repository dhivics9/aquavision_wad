<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Registration Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

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
                <img src="images/login.png" alt="">
            </div>
            <form action="{{ route('registration') }}" method="POST">
                @csrf
                <h3>Welcome to AquaVision</h3>
                <div class="form-group">
                    <input type="text" name="firstName" placeholder="First Name" class="form-control"
                        value="{{ old('firstName') }}" required>
                    <input type="text" name="lastName" placeholder="Last Name" class="form-control"
                        value="{{ old('lastName') }}" required>
                </div>
                <div class="form-wrapper">
                    <input type="email" name="email" placeholder="email@example.com"
                        class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback" style="margin-bottom: 1rem">
                            Email sudah terpakai
                        </div>
                    @enderror
                    <i class="zmdi zmdi-email"></i>
                </div>
                <div class="form-wrapper">
                    <input type="number" name="phone" placeholder="Phone Number"
                        class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required>
                    @error('phone')
                        <div class="invalid-feedback" style="margin-bottom: 1rem">
                            Nomor sudah terpakai
                        </div>
                    @enderror
                    <i class="zmdi zmdi-email"></i>
                </div>
                {{-- <div class="form-wrapper">
						<select name="" id="" class="form-control">
							<option value="" disabled selected>Gender</option>
							<option value="male">Male</option>
							<option value="femal">Female</option>
							<option value="other">Other</option>
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div> --}}
                <div class="form-wrapper">
                    <input type="password" name="password" placeholder="Password"
                        class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')
                        <div class="invalid-feedback" style="margin-bottom: 1rem">
                            {{ $message }}
                        </div>
                    @enderror
                    <i class="zmdi zmdi-lock"></i>
                </div>
                <div class="form-wrapper">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password"
                        class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')
                        <div class="invalid-feedback" style="margin-bottom: 1rem">
                            {{ $message }}
                        </div>
                    @enderror
                    <i class="zmdi zmdi-lock"></i>
                </div>
                <button>Register
                    <i class="zmdi zmdi-arrow-right"></i>
                </button>
                <p class="center-text" style="margin-top: 1rem; padding-bottom: 1rem">Already have an account? <a
                        href="{{ route('login') }}">Login</a></p>
            </form>
        </div>
    </div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
