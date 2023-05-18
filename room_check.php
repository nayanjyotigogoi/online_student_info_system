<?php

session_start();

    if(!isset($_SESSION['username']))
    {
        header("location:login.php");
    }
    elseif($_SESSION['usertype']=='student'){
        header("location:login.php");
	}

	$host="localhost";
	$user="root";
	$password="";
	$db="miniproject";

	$data=mysqli_connect($host,$user,$password,$db); //this says that we're connected with the database.

//we will only come to this if condition only if someone click the add student button
if (isset($_POST['update']))
{
	$roomno = $_POST['room_no'];
	$password = $_POST['occupant_1'];
	$email = $_POST['occupant_2'];
	$phone_number = $_POST['status'];
	
	$check = "SELECT *FROM room WHERE room_no = '".$roomno."'"; 
	$check_user = mysqli_query($data, $check);

	$row_count = mysqli_num_rows($check_user);  
	if ($row_count == 1) {
		echo "Room  already occupied. try another room";
	} else {

		$sql = "INSERT INTO room (room_no,occupant_1,occupant_2,status) VALUES ('".$roomno."','".$password."','".$email."','".$phone_number."')";


		$result = mysqli_query($data,$sql);

		if ($result) {
            $_SESSION['message']="entry completed";
            header("location:add_room.php");
		} else {
            $_SESSION['message']="couldn't register user";
		}
	}
}
