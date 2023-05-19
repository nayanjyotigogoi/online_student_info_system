<?php

//error handling
error_reporting(0);
session_start();


$host = "localhost";
$user = "root";
$password = "";
$db = "miniproject";
$data = mysqli_connect($host, $user, $password, $db);


if ($data === false) {
	die("connection error");
}

if (isset($_POST['login'])) {   //both the username and password is coming from login page

	$name = $_POST['enrollment_id'];
	$pass = $_POST['password'];

	//username and the password is coming from the database fetching this line of code check in the database whether the given enrollment id and password is matching or not
	$sql = "select * from user where enrollment_id='" . $name . "' AND password='" . $pass . "'   "; //variable should be in white color


	$result = mysqli_query($data, $sql);

	$row = mysqli_fetch_array($result);





	//usertype this is coming from the database

	if ($row["usertype"] == "student") 
	{

		 
		$_SESSION['enrollment_id'] = $name;
		header("location:studenthome.php");
	} else {


			$message = "Enrollment-id or password do not match";

			$_SESSION['loginMessage'] = $message;

			header("location:login.php");
			}
	}

	?>

<html>

<body>

</body>

</html>