<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Login Form</title>

	<!-- <link rel="stylesheet" type="text/css" href="./login.css"> -->

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

	<!-- bootstrap cdn -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body class="body">


	<section class="vh-100 gradient-custom">
		<div class="container py-5 h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-12 col-md-8 col-lg-6 col-xl-5">
					<div class="card bg-dark text-white" style="border-radius: 1rem;">
						<div class="card-body p-5 text-center">

							<h4>

								<?php

								error_reporting(0);
								session_start();
								session_destroy();

								echo $_SESSION['loginMessage'];


								?>
							</h4>

							<form action="admin_login_check.php" method="POST" class="login_form">

								<div class="mb-md-5 mt-md-4 pb-5">

									<h2 class="fw-bold mb-2 text-uppercase">Admin Login</h2>
									<p class="text-white-50 mb-5">Please enter your login and password!</p>

									<div class="form-outline form-white mb-4">
										<input type="text" id="typeEmailX" class="form-control form-control-lg" name="username" />
										<label class="form-label" for="typeEmailX">Username</label>
									</div>

									<div class="form-outline form-white mb-4">
										<input type="password" id="typePasswordX" class="form-control form-control-lg" name="password" />
										<label class="form-label" for="typePasswordX">Password</label>
									</div>

									<p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

									<button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

									<div class="d-flex justify-content-center text-center mt-4 pt-1">
										<a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
										<a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
										<a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
									</div>
									<div>
										<a href="./home.php" class="text-white-50 fw-bold text-body"><u><br>HOME</u></a>
									</div>

								</div>

								<!-- <div>
									<p class="mb-0">Don't have an account? <a href="signup.php" class="text-white-50 fw-bold">Sign Up</a>
									</p>
								</div> -->

							</form>


						</div>
					</div>
				</div>
			</div>
		</div>
	</section>



</body>

</html>