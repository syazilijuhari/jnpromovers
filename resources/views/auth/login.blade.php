<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login page</title>

    {{-- Custom CSS File --}}
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/app-login.css">

    {{-- Font Awesome 5 --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
          integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    {{-- Icon --}}
    <link rel="icon" href="{{ asset('img/jnpro-logo.png')}}" type="image/x-icon">

</head>
<body class="my-login-page">
<section class="h-100">
    <div class="container h-100">
        @if($errors->any())
            <div class="row justify-content-center align-items-center fixed-top">
                <div class="col-8 alert alert-danger alert-dismissible fade show my-3">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                    @foreach($errors->all() as $err)
                        <li class="">{{ $err }}</li>
                    @endforeach
                </div>
            </div>
        @endif
        <div class="row justify-content-center align-items-center h-100">

            <div class="card-wrapper">

                <div class="home-link"><a class="link" href="{{ url('/') }}"><i
                            class="fas fa-arrow-left"></i></a>&nbsp;&nbsp;Home</div>
                <div class="cardx fat mt-5">
                    <div class="card-body">
                        @if( Session::get('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        @if( Session::get('success_reset'))
                            <div class="alert alert-success">
                                {{ Session::get('success_reset') }}
                            </div>
                        @endif
                        @if( Session::get('error'))
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                        @endif
                        <h4 class="card-title">Login</h4>
                        <form method="POST" class="my-login-validation" autocomplete="off"
                              action="{{ route('login') }}">
                            @csrf
                            <br>
                            <div class="form_group">
                                <input id="login" type="text" class="form_input" name="login" placeholder=" "
                                       autofocus value="{{ old('login') }}">
                                <label for="login" class="form_label">E-Mail Address or Username</label>
                            </div>
                            <div class="form_group">
                                <input id="password" type="password" class="form_input" name="password"
                                       placeholder=" " autofocus value="{{ old('password') }}">
                                <label for="password" class="form_label">Password</label>

                                <br>
                                <a href="{{ route('password.request') }}" class="float-right">
                                    Forgot Password?
                                </a>
                            </div>
                            <div class="form-group">
                                <div class="custom-checkbox custom-control">
                                    <input type="checkbox" name="remember" id="remember"
                                           class="custom-control-input">
                                    <label for="remember" class="custom-control-label">Remember Me</label>
                                </div>
                            </div>

                            <div class="form-group m-0">
                                <button type="submit" id="login-user" class="btn btn-block">
                                    Login
                                </button>
                            </div>
                            <div class="mt-4 text-center">
                                Don't have an account? <a href="{{ route('register') }}">Create
                                    One</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
</script>
<script src="/bootstrap/js/popper.js"></script>
<script src="/bootstrap/js/bootstrap.js"></script>
<script src="/js/app-login.js"></script>
</body>
</html>
