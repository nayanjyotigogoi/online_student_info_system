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
if (isset($_POST['add']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$phone_number = $_POST['phone'];
	$usertype = "student"; //whenever the admin try to add student the user type will always to student

	$check = "SELECT *FROM user WHERE username = '".$username."'"; //check whether username is unique or not. variable should be in white color
	$check_user = mysqli_query($data, $check);

	$row_count = mysqli_num_rows($check_user); //using this it means were counting whether multiple user exist

	if ($row_count == 1) {
		echo "Username already exist. try again";
	} else {

		$sql = "INSERT INTO user (username,password,phone,email,usertype) VALUES ('".$username."','".$password."','".$phone_number."','".$email."','".$usertype."')";


		$result = mysqli_query($data,$sql);

		if ($result) {
            $_SESSION['message']="user registered succesfully";
            header("location:login.php");
		} else {
            $_SESSION['message']="couldn't register user";
		}
	}
}
