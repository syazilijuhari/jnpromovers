<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Register page</title>

	{{-- Custom CSS File --}}
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/app-register.css">

	{{-- Font Awesome 5 --}}
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

	 {{-- Icon --}}
	 <link rel="icon" href="{{ asset('img/jnpro-logo.png')}}" type="image/x-icon">

</head>
<body class="my-register-page">
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
			<div class="row justify-content-md-center align-items-md-center h-100">
				<div class="card-wrapper">

					<div class="home-link"><a class="link" href="{{url('/')}}"><i class="fas fa-arrow-left"></i></a>&nbsp;&nbsp;Home</div>

					<div class="mt-4 px-2 cardx">
						<div class="card-body">
							<h2 class="card-title">Create a new account</h2>
							<h6 class="card-subtitle mb-4 mt-2 text-muted">Use your google email to create new account</h6>
							<form method="POST" class="my-login-validation" autocomplete="off" action="{{ route('register') }}">
                @csrf
								<div class="form_group">
									<input id="name" type="text" class="form_input" name="name" placeholder=" "  autofocus value="{{ old('name') }}">
									<label for="name" class="form_label">Name</label>

								</div>

                                <div class="form_group">
                                    <input id="phone" type="text" class="form_input" name="phone" placeholder=" "  autofocus value="{{ old('phone') }}">
                                    <label for="phone" class="form_label">Phone No</label>

                                </div>

								<div class="form_group">
									<input id="email" type="email" class="form_input" name="email"  placeholder=" " value="{{ old('email') }}">
									<label for="email" class="form_label">E-Mail Address</label>

								</div>


								<div class="form_group">
									<input id="password" type="password" class="form_input" name="password"  placeholder=" ">
									<label for="password" class="form_label">Password</label>

								</div>

								<div class="form_group">
									<input id="password-confirm" type="password" class="form_input" name="password_confirmation" required placeholder=" ">
									<label for="password-confirm" class="form_label">Confirm Password</label>

								</div>

								<div class="form-group m-0">
									<button type="submit" id="user-register" class="btn btn-block">
										Sign Up
									</button>
								</div>
								<div class="my-3 text-center">
									Already have an account? <a class="link" id="org-login-form" href="{{route('login')}}">Login</a>
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
<script src="jquery-3.4.1.min.js"></script>
	<script src="bootstrap/js/popper.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
	<script src="js/app-login.js"></script>
</body>
</html>
