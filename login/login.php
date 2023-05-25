<?php
session_start();
error_reporting(0);

$host = "localhost";
$user = "root";
$password = "";
$db = "miniproject";
$data = mysqli_connect($host, $user, $password, $db);

if (isset($_POST['enrollment_id']) && isset($_POST['password'])) {
	$enrollmentId = $_POST['enrollment_id'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM registration WHERE enrollment_id = '$enrollmentId' AND password = '$password'";
	$result = mysqli_query($data, $sql);
	$count = mysqli_num_rows($result);

	if ($count == 1) {
		$_SESSION['enrollment_id'] = $enrollmentId;
		header("Location:../Student Dashboard/studenthome.php");
		exit();
	} else {
		echo"<script>alert('Invalid enrollment ID or password.');</script>";
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Login</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>  -->


	<!-- Latest compiled and minified CSS -->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<link rel="stylesheet" href="./login.css">


</head>

<body class="body">
	
	<?php if (isset($loginError)) : ?>
		<p><?php echo $loginError; ?></p>
	<?php endif; ?>
	<section class="vh-100 gradient-custom">
		<div class="container py-5 h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-12 col-md-8 col-lg-6 col-xl-5">
					<div class="card bg-dark text-white" style="border-radius: 1rem;">
						<div class="card-body p-5 text-center">

							<form action="" method="POST">

								<div class="mb-md-5 mt-md-4 pb-5">
									<h2 class="fw-bold mb-2 text-uppercase">Student Login</h2>
									<p class="text-white-50 mb-5">Please enter your login and password!</p>
								</div>

								<div>
									<label for="enrollment_id">Enrollment ID:</label>
									<input type="text" id="enrollment_id" name="enrollment_id" required>
								</div>
								<br>
								<div>
									<label for="password">Password:</label>
									<input type="password" id="password" name="password" required>
								</div>

								<div class="mb-md-5 mt-md-4 pb-5">
									<p class="small mb-5 pb-lg-2"><a class="text-white-50" href="./forgot_password.php">Forgot password?</a></p>
								 	<button class="btn btn-outline-light btn-lg px-5" type="submit" name="login">Login</button>

								</div>

								<div>
									<p class="mb-0">Don't have an account? <a href="../signup/signup.php" class="text-white-50 fw-bold">Sign Up</a>
										<a href="../home.php" class="text-white-50 fw-bold text-body"><u><br>HOME</u></a>
									</p>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>

</html>