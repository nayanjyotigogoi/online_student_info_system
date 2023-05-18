<?php
    session_start();
        if(!isset($_SESSION['username'])){
            header("location:login.php");
        }
        elseif($_SESSION['usertype']=='student'){
            header("location:login.php");
        }	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>

	<link rel="stylesheet" type="text/css" href="admin.css">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

	<header class="header">
		
		<a href="">Admin Dashboard</a>

		<div class="logout">
			
			<a href="admin_logout.php" class="btn btn-primary">Logout</a>

		</div>

	</header>


	<aside class="leftBox">
		
		<ul>
			
			<li>
				<a href="admission.php">Admission</a>
			</li>

			<li>
				<a href="add_student.php">Add Student</a>
			</li>

			<li>
				<a href="view_student.php">View Student</a>
			</li>
			 
			  
			<li>
				<a href="view_complaint.php">View Complaint</a>
			</li>

			<li>
				<a href="room.php">Rooms</a>
			</li>

			<li>
				<a href="Add_room.php">Update Rooms</a>
			</li>


		</ul>


	</aside>


	<div class="content">

         
		<h1>
			<?php
			// Check if the user is logged in
			//session_start();

			if (isset($_SESSION['username'])) {
				$username = $_SESSION['username'];
				echo "Welcome, $username!";
			} else {
				echo "Please log in.";
			}
			?>
		</h1>
		
	</div>

	

</body>
</html>
