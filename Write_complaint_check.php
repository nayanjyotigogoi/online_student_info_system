<?php

session_start();

    if(!isset($_SESSION['username']))
    {
        header("location:write_complaint.php");
    }
    elseif($_SESSION['usertype']=='student'){
        header("location:write_complaint.php");
	}

	$host="localhost";
	$user="root";
	$password="";
	$db="miniproject";

	$data=mysqli_connect($host,$user,$password,$db); //this says that we're connected with the database.

    //we will only come to this if condition only if someone click the write complaint button
    if(isset($_POST['complaint'])){
        $name=$_POST['name'];
        $roomno=$_POST['roomNo'];
        $number=$_POST['phone'];
        $query=$_POST['message'];

        $sql="INSERT INTO user_complaint (name,roomNo,phone,message) VALUES('".$name."','".$roomno."','".$phone."','".$query."')";

        $result=mysqli_query($data,$sql);
        if($result){
            $_SESSION['message']="complaint register sucessfully";
            header("location:write_complaint.php");
        }
        else{
            $_SESSION['message']="unable to register complain. please try again later";
        }
    }
?>