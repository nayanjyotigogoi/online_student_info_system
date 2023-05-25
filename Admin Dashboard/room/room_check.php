<?php

session_start();

if (!isset($_SESSION['username'])) {
	header("location:login.php");
} elseif ($_SESSION['usertype'] == 'student') {
	header("location:login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "miniproject";

$data = mysqli_connect($host, $user, $password, $db); //this says that we're connected with the database.

//we will only come to this if condition only if someone click the add student button
if (isset($_POST['update'])) {
	$roomno = $_POST['room_no'];
	$occupant_1 = $_POST['occupant_1'];
	$occupant_2 = $_POST['occupant_2'];
	$status = $_POST['status'];

	$check = "SELECT *FROM room WHERE room_no = '" . $roomno . "'";
	$check_user = mysqli_query($data, $check);

	$row_count = mysqli_num_rows($check_user);

	if ($row_count == 1) {
		echo "<script> alert('Room  already occupied. try another room');</script>";
	} else {

		$sql = "INSERT INTO room (room_no,occupant_1,occupant_2,status) VALUES ('" . $roomno . "','" . $occupant_1 . "','" . $occupant_2 . "','" . $status . "')";

		if ($roomno != "" && $occupant_1 != "" && $occupant_2 != "" & $status != "") {
			$result = mysqli_query($data, $sql);

			if ($result) {
				$_SESSION['message'] = "entry completed";
				header("location:./adminhome.php");
			} else {
				$_SESSION['message'] = "couldn't register user";
			}
		} else{
			echo"<script>alert('please fill all the input details');</script>";
		}
	}
}
