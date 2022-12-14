<!DOCTYPE html>
<html lang="en">
<head>
	@include('Layouts.header')
</head>
<body class="login">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<center><img src="{{ asset('logo/logo.png') }}" width="100px" alt="" style="margin-bottom:20px"></center>
			<form action="{{ route('postlogin') }}" method="POST">
				@csrf
				<div class="form-group">
					<input id="username" name="username" type="text" class="form-control" required placeholder="Input Username">
				</div>
				<div class="form-group">
					<div class="position-relative">
						<input id="password" name="password" type="password" class="form-control" placeholder="Input Password" required>
						<div class="show-password">
							<i class="flaticon-interface"></i>
						</div>
					</div>
				</div>
				<div class="form-group form-action-d-flex mb-3">
					{{-- <a href="#" class="btn btn-primary col-md-5 float-right mt-3 mt-sm-0 fw-bold">Sign In</a> --}}
					<div class="col-md-12 text-center">
						<input type="submit" class="btn btn-primary " name="Sign In" value="Login">
					</div>
				</div>
				<!-- 				<div class="form-action">
					<a href="#" class="btn btn-primary btn-rounded btn-login">Sign In</a>
				</div> -->
			</form>
		</div>
	</div>
	<script src="{{ asset('template/js/core/jquery.3.2.1.min.js') }}"></script>
	<script src="{{ asset('template/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('template/js/core/popper.min.js') }}"></script>
	<script src="{{ asset('template/js/core/bootstrap.min.js') }}"></script>
	<script src="{{ asset('template/js/ready.js') }}"></script>
</body>
</html>