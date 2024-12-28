<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription</title>

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
                    <form action="{{ route('profile', Auth::user()) }}" method="GET">
                        @csrf
                        <button type="submit" style="text-decoration: none; border: none; background-color: white">
                            <h2 class="h3 mb-4 page-title" style="margin-top: 2rem;"> <img
                                    src="{{ asset('images/arrow-left.svg') }}" alt=""> Back to Profile</h2>
                        </button>
                    </form>
                @endif
                <div class="my-4">
                    <hr class="my-4" />
                    <div class="row mt-5 align-items-center">
                        <div class="col">
                            @if (session()->has('successSub'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success</strong> Successfully become premium member!
                                </div>
                            @endif

                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="mb-1">Nama : {{ $user->First_Name }} {{ $user->Last_Name }}</h4>
                                    <h4 class="mb-1">Phone : {{ $user->phone }}</h4>
                                    <h4 class="mb-1">Email : {{ $user->email }}</h4>
                                    @if ($user->subscription == null)
                                        <h4 class="mb-1">Subscription : Free Members</h4>
                                    @endif
                                    @if ($user->subscription != null)
                                        <h4 class="mb-1">Subscription : Premium Members</h4>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4" />
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">What you'll get</th>
                                <th scope="col" style="text-align: center">Free Plan</th>
                                <th scope="col" style="text-align: center">Subscription</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Download report</td>
                                <td style="text-align: center">Otto</td>
                                <td style="text-align: center"><img src="{{ asset('images/check-circle-fill.svg') }}"
                                        alt=""></td>
                            </tr>
                            <tr>
                                <td>More than 3 sensor</td>
                                <td style="text-align: center">Otto</td>
                                <td style="text-align: center"><img src="{{ asset('images/check-circle-fill.svg') }}"
                                        alt=""></td>
                            </tr>
                            <tr>
                                <td>Can report to the government</td>
                                <td style="text-align: center">Otto</td>
                                <td style="text-align: center"><img src="{{ asset('images/check-circle-fill.svg') }}"
                                        alt=""></td>
                            </tr>
                            <tr>

                                <form action="{{ route('subscription', $user->id) }}" method="POST">
                                    @if ($user->subscription == null)
                                    @csrf
                                        <td colspan="3"><button type="submit" class="btn btn-primary" style="width: 100%">Start subscription</button></td>
                                    @endif
                                </form>

                                @if ($user->subscription != null)
                                @csrf
                                <td colspan="3"><button type="submit" class="btn btn-primary" id="pay-button" style="width: 100%">Pay</button></td>
                                @endif

                            </tr>
                        </tbody>
                    </table>

                    @if ($user->subscription != null)
                        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}">
                        </script>
                        <script type="text/javascript">
                            document.getElementById('pay-button').onclick = function() {
                                // SnapToken acquired from previous step
                                snap.pay('{{ $subscription -> snap_token }}', {
                                    // Optional
                                    onSuccess: function(result) {
                                        /* You may add your own js here, this is just example */
                                        // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                                        window.location = "{{ route('subscription.success', $subscription->id) }}";
                                    },
                                    // Optional
                                    onPending: function(result) {
                                        /* You may add your own js here, this is just example */
                                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                                    },
                                    // Optional
                                    onError: function(result) {
                                        /* You may add your own js here, this is just example */
                                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                                    }
                                });
                            };
                        </script>
                    @endif

                </div>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
