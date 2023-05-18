<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Add Student</title>

	<link rel="stylesheet" type="text/css" href="admin.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

	<?php

	?>

</head>

<body>

	<?php
	include "Add_student_sidebar.php";
	?>

	<div class="content">

		<h1>Add Student</h1>

		<div>
			<form action="add_student_check.php" method="post">
				<div class="form-group row">
					<label for="inputUsername" class="col-sm-1 col-form-label">Username</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputUsername" placeholder="username" name="username" required>
					</div>
				</div>
				<br>
				<div class="form-group row">
					<label for="inputPassword" class="col-sm-1 col-form-label">Password</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password" required>
					</div>
				</div>
				<br>
				<div class="form-group row">
					<label for="inputPhone" class="col-sm-1 col-form-label">Phone number</label>
					<div class="col-sm-10">
						<input type="phone" class="form-control" id="inputnumber" placeholder="phone" name="phone" required>
					</div>
				</div>
				<br>
				<div class="form-group row">
					<label for="Email" class="col-sm-1 col-form-label">Email</label>
					<div class="col-sm-10">
						<input type="Email" class="form-control" id="inputEmail" placeholder="Email" name="email" required>
					</div>
				</div>
				<br>
				<button type="submit" class="btn btn-secondary" name="add">Add Student</button>

			</form>

		</div>

	</div>



</body>

</html>