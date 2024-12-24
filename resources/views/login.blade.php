<!-- filepath: /d:/laragon/www/aquavision_wad/resources/views/login.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="icon" href="{{ asset('images/icon.png') }}">
</head>

<body>
    <div class="wrapper" style="background-color: white">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success</strong> Please Login!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="inner">
            <div class="image-holder">
                <img src="{{ asset('images/login.png') }}" alt="">
            </div>
            <form action="{{ route('login') }}" method="POST">
                @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissable fade show" role="alert">
                        {{ session('loginError') }}
                    </div>
                @endif

                @csrf
                <h3>Welcome to AquaVision</h3>
                <div class="form-wrapper">
                    @error('email')
                        <div style="color: red">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="text" name="email" placeholder="name@example.com"
                        class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    <i class="zmdi zmdi-email"></i>
                </div>
                <div class="form-wrapper">
                    <input type="password" name="password" placeholder="Password" class="form-control">
                    <i class="zmdi zmdi-lock"></i>
                </div>
                <button type="submit">Login</button>
                <p class="center-text" style="margin-top: 1rem">Don't have an account? <a
                        href="{{ route('registration') }}">Register</a></p>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
