 <!DOCTYPE html>

 <html>

 <head>
 	<meta charset="utf-8">
 	<title>Student Dashboard</title>

 	<link rel="stylesheet" type="text/css" href="./student.css">

 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	
	
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

 			<li>
 				<a href="./Student profile/student_profile.php">Your profile</a>
 			</li>

 			<li>
 				<a href="./edit student/edit_student.php">Enter your details</a>
 			</li>

 			<li>
 				<a href="./Write complaint/write_complaint.php">Write Complaint</a>
 			</li>

			 <li>
 				<a href="./Write complaint/check_status.php">View Complaint status</a>
 			</li>

 			<li>
 				<a href="./File upload/file_upload.php">Upload fess receipt</a>
 			</li>

			 <li>
 				<a href="./File upload/view_history.php">History</a>
 			</li>


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
 		<article>As a student, the dashboard provides you with a range of functionalities and resources to enhance your academic journey and Hostel experience.</article>

 		<br>

 		<p>You can access and update your personal information, ensuring that your details are accurate and up to date.</p>

 		<br>

 		<p>You are encouraged to write down any problems or difficulties you are experiencing within your room. Whether it's related to noise disturbances, maintenance issues, conflicts with roommates, or any other concern,</p>

 		<br>

 		<p> The dashboard allows you to view your payment history and keep track of your mess fee dues. This enables you to stay updated on your financial obligations and ensures timely payments. By uploading your mess fee receipts with transaction IDs, you contribute to the accurate record-keeping of your financial transactions and facilitate efficient management of mess operations.</p>

 		<br>

 		<p>Overall, the student dashboard serves as a centralized platform to support your HOSTEL journey and facilitate seamless communication and engagement with the Hostel admin body.</p>

 		<br>
 	</div>

 </body>

 </html>