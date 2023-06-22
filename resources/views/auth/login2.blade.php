<!doctype html>
<html lang="en">
  <head>
  	<title>Login 04</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{asset('css1/style.css')}}">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(images/faces/barbel.jpg);">
			      </div>
						<div class="login2-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign In</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										</p>
								</div>
			      	</div>
							<form method="POST" action="{{ route('login') }}" class="signin-form">
                            @csrf
			      		<div class="form-group mb-3">
			      			<label class="label" for="email" :value="__('Email')">gmail</label>
			      			<input id="email" class="form-control" placeholder="Email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password" :value="__('Password')">Password</label>
		              <input id="password" class="form-control" placeholder="Password" type="password" name="password" class="form-control" placeholder="Password" required autocomplete="current-password">
                      <input-error :messages="$errors->get('password')" class="mt-2" />
		            </div>
		            <div class="form-group">
    
                        <x-primary-button class="form-control btn btn-primary rounded submit px-3" button type="submit">
                {{ __('Log in') }}
            </x-primary-button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="#">Forgot Password</a>
									</div>
		            </div>
		          </form>
		          <p class="text-center">Not a member? <a data-toggle="tab" href=" ">Sign Up</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset('js1/jquery.min.js')}}"></script>
  <script src="{{asset('js1/popper.js')}}"></script>
  <script src="{{asset('js1/bootstrap.min.js')}}"></script>
  <script src="{{asset('js1/main.js')}}"></script>

	</body>
</html>

