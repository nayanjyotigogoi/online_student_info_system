 
<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<title>Student Dashboard</title>

	<link rel="stylesheet" type="text/css" href="admin.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>

<body>

	<header class="header">

		<a href="">Student Dashboard</a>

		<div class="logout">

			<a href="logout.php" class="btn btn-primary">Logout</a>

		</div>

	</header>


	<aside class="leftBox">

		<ul>

			<li>
				<a href="student_profile.php">Your profile</a>
			</li>

			<li>
				<a href="edit_student.php">Enter your details</a>
			</li>

			<li>
				<a href="update_profile.php">Update profile</a>
			</li>

			<li>
				<a href="write_complaint.php">Write Complaint</a>
			</li>

			<li>
				<a href="file_upload.php">Upload fess receipt</a>
			</li>


		</ul>


	</aside>



	<div class="content">

		<h1>

			 <?php
			 session_start();

				echo "welcome ".$_SESSION['enrollment_id'];
			 ?>
			 
		</h1>
	</div>
 
</body>

</html>