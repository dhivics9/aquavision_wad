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
                <a href="{{ route('home') }}" style="text-decoration: none; color: black"><h2 class="h3 mb-4 page-title" style="margin-top: 2rem;"> <img src="{{ asset('images/arrow-left.svg') }}" alt=""> Back to Home</h2></a>
                @endif
                <div class="my-4">
                    <form>
                        <div class="row mt-5 align-items-center">
                            <div class="col">
                                <div class="row align-items-center">
                                    <div class="col-md-7">
                                        <h4 class="mb-1">{{ $user->First_Name }} {{ $user->Last_Name }}</h4>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-7">
                                        <p class="text-muted">Enterprise</p>
                                    </div>
                                    <div class="col">
                                        <p class="small mb-0 text-muted">subscription</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <div class="form-row">
                            <div class="form-group col-md-6" style="margin-bottom: 1rem">
                                <label for="firstname">Firstname</label>
                                <input type="text" name="firstName" id="firstname" class="form-control" placeholder="First Name" />
                            </div>
                            <div class="form-group col-md-6" style="margin-bottom: 1rem">
                                <label for="lastname">Lastname</label>
                                <input type="text" name="lastName" id="lastname" class="form-control" placeholder="Last Name" />
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom: 1rem">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="email@example.com" />
                        </div>
                        <div class="form-group" style="margin-bottom: 1rem">
                            <label for="inputAddress5">Enterprise</label>
                            <input type="text" class="form-control" id="inputAddress5" placeholder="P.O. Box 464, 5975 Eget Avenue" />
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6" style="margin-bottom: 1rem">
                                <label for="inputCompany5">Company</label>
                                <input type="text" class="form-control" id="inputCompany5" placeholder="Nec Urna Suscipit Ltd" />
                            </div>
                            <div class="form-group col-md-4" style="margin-bottom: 1rem">
                                <label for="inputState5">State</label>
                                <select id="inputState5" class="form-control">
                                    <option selected="">Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2" style="margin-bottom: 1rem">
                                <label for="inputZip5">Zip</label>
                                <input type="text" class="form-control" id="inputZip5" placeholder="98232" />
                            </div>
                        </div>
                        <hr class="my-4" />
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group" style="margin-bottom: 1rem">
                                    <label for="inputPassword4">Old Password</label>
                                    <input type="password" class="form-control" id="inputPassword5" />
                                </div>
                                <div class="form-group" style="margin-bottom: 1rem">
                                    <label for="inputPassword5">New Password</label>
                                    <input type="password" class="form-control" id="inputPassword5" />
                                </div>
                                <div class="form-group" style="margin-bottom: 1rem">
                                    <label for="inputPassword6">Confirm Password</label>
                                    <input type="password" class="form-control" id="inputPassword6" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-2">Password requirements</p>
                                <p class="small text-muted mb-2">To create a new password, you have to meet all of the following requirements:</p>
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