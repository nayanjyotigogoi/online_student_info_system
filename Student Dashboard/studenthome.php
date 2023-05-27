<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<title>Student Dashboard</title>



	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
		crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="./student.css">

	<style>
		/* Dropdown Button */
		 
		.dropbtn {
			background-color: #424a5b;
			color: white;
			padding: 16px;  
			font-size: 17px;
			border: none;
		}

		/* The container <div> - needed to position the dropdown content */
		.dropdown {
			position:  static;
			display: inline-block;
		}

		/* Dropdown Content (Hidden by Default) */
		.dropdown-content {
			display: none;
			position: relative;
			background-color:aliceblue;
			min-width: 160px;
			box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
			z-index: 1;
		}

		/* Links inside the dropdown */
		.dropdown-content a {
			color: black;
			padding: 12px 16px;
			text-decoration: none;
			display: block;
		}

		/* Change color of dropdown links on hover */
		.dropdown-content a:hover {
			background-color: #ddd;
		}

		/* Show the dropdown menu on hover */
		.dropdown:hover .dropdown-content {
			display: block;
		}

		/* Change the background color of the dropdown button when the dropdown content is shown */
		.dropdown:hover .dropbtn {
			background-color: #3e8e41;
		}
	</style>

</head>

<body>

	<header class="header">

		<a href="">Student Dashboard</a>

		<div class="logout">

			<a href="../login/logout.php" class="btn btn-primary">Logout</a>

		</div>

	</header>


	<aside class="leftBox">
		<ul>
			<div class="dropdown">
				<button class="dropbtn">Profile</button>
				<div class="dropdown-content">
					<li>
						<a href="./Student profile/student_profile.php">Your profile</a>
					</li>

					<li>
						<a href="./edit student/edit_student.php">Enter your details</a>
					</li>

				</div>
			</div>
			<br>
			 
			 
			<div class="dropdown">
				<button class="dropbtn">Write Complaint & check status</button>
				<div class="dropdown-content">
					<li>
						<a href="./Write complaint/write_complaint.php">Write Complaint</a>
					</li>

					<li>
						<a href="./Write complaint/check_status.php">View Complaint status</a>
					</li>
				</div>
			</div>

			<br>
			 
			 
			<div class="dropdown">
				<button class="dropbtn">File Upload</button>
				<div class="dropdown-content">
					<li>
						<a href="./File upload/file_upload.php">Mess receipt</a>
					</li>

					<li>
						<a href="./File upload/view_history.php">Transaction History</a>
					</li>

				</div>
			</div>
		</ul>
	</aside>



	<div class="content">

		<h1>

			<?php
			error_reporting(0);
			session_start();


			echo "Welcome " . $_SESSION['enrollment_id'];
			?>

		</h1>
		<article>As a student, the dashboard provides you with a range of functionalities and resources to enhance your
			academic journey and Hostel experience.</article>

		<br>

		<p>You can access and update your personal information, ensuring that your details are accurate and up to date.
		</p>

		<br>

		<p>You are encouraged to write down any problems or difficulties you are experiencing within your room. Whether
			it's related to noise disturbances, maintenance issues, conflicts with roommates, or any other concern,</p>

		<br>

		<p> The dashboard allows you to view your payment history and keep track of your mess fee dues. This enables you
			to stay updated on your financial obligations and ensures timely payments. By uploading your mess fee
			receipts with transaction IDs, you contribute to the accurate record-keeping of your financial transactions
			and facilitate efficient management of mess operations.</p>

		<br>

		<p>Overall, the student dashboard serves as a centralized platform to support your HOSTEL journey and facilitate
			seamless communication and engagement with the Hostel admin body.</p>

		<br>
	</div>

</body>

</html>