<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <link rel="icon" href="{{ asset('images/icon.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8 mx-auto">
                @if (Auth::check())
                <form action="{{ route('clear.session') }}" method="POST">
                    @csrf
                    <button type="submit" style="text-decoration: none; border: none; background-color: white"> <h2 class="h3 mb-4 page-title" style="margin-top: 2rem;"> <img
                        src="{{ asset('images/arrow-left.svg') }}" alt=""> Back to Home</h2> </button>

                    {{-- <a href="{{ route('clear.session') }}" style="text-decoration: none; color: black">
                        
                    </a> --}}
                </form>

                @endif
                <div class="my-4">
                    <form action="{{ route('profile', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mt-5 align-items-center">
                            <div class="col">
                                @if (session()->has('updateProfile'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Success</strong> Successfully updated your profile!
                                    </div>
                                @endif
                                <div class="row align-items-center">
                                    <div class="col-md-7">
                                        <h4 class="mb-1">{{ $user->First_Name }} {{ $user->Last_Name }}</h4>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-7">
                                        @if ($user->enterprise == null)
                                            @if ($user->subcription_id == null)
                                                <p class="small mb-0 text-muted">Free Member</p>
                                            @endif
                                        @endif
                                        @if ($user->enterprise != null)
                                            <p class="text-muted">Enterprise : {{ $user->enterprise }}</p>
                                        @endif
                                    </div>
                                    <div class="col">
                                        @if ($user->subcription_id != null)
                                            <p class="small mb-0 text-muted">Subscription</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <div class="form-group" style="margin-bottom: 1rem">
                            <label for="firstname">Firstname</label>
                            <input type="text" name="firstName" id="firstname" class="form-control"
                                placeholder="First Name" value="{{ old('firstName', $user->First_Name) }}" required />
                        </div>
                        <div class="form-group" style="margin-bottom: 1rem">
                            <label for="lastname">Lastname</label>
                            <input type="text" name="lastName" id="lastname" class="form-control"
                                placeholder="Last Name" value="{{ old('lastName', $user->Last_Name) }}" required/>
                        </div>
                        <div class="form-group" style="margin-bottom: 1rem">
                            <label for="inputEmail4">Email</label>
                            <input type="email" name="email" class="form-control" id="inputEmail4"
                                placeholder="email@example.com" value="{{ old('email', $user->email) }}" required/>
                        </div>
                        <div class="form-group" style="margin-bottom: 1rem">
                            <label for="inputAddress5">Enterprise</label>
                            <input type="text" name="enterprise" class="form-control" id="inputAddress5"
                                placeholder="AquaVision" value="{{ old('enterprise', $user->enterprise) }}"/>
                        </div>
                        <div class="form-group" style="margin-bottom: 1rem">
                            <label for="inputAddress5">Phone Number</label>
                            <input type="number" name="phone" class="form-control" id="inputAddress5"
                                placeholder="0808080808" value="{{ old('phone', $user->phone) }}" required/>
                        </div>
                        <hr class="my-4" />
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group" style="margin-bottom: 1rem">
                                    <label for="inputPassword5">New Password</label>
                                    <input type="password" name="password" class="form-control" id="inputPassword5" placeholder="Your New Passowrd"/>
                                </div>
                                <div class="form-group" style="margin-bottom: 1rem">
                                    <label for="inputPassword6">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        id="inputPassword6" placeholder="Retype Your New Passowrd"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-2">Password requirements</p>
                                <p class="small text-muted mb-2">To create a new password, you have to meet all of the
                                    following requirements:</p>
                                <ul class="small text-muted pl-4 mb-0">
                                    <li>Minimum 8 character</li>
                                    <li>At least one special character</li>
                                    <li>At least one number</li>
                                    <li>Can’t be the same as a previous password</li>
                                </ul>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Change</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
