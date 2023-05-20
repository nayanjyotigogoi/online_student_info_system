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
		header("Location:studenthome.php");
		exit();
	} else {
		echo"<script>alert('Invalid enrollment ID or password.');</script>";
	}
}
?>