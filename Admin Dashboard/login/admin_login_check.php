<?php 

//error handling
error_reporting(0);
session_start();


$host="localhost";

$user="root";

$password="";

$db="miniproject";


$data=mysqli_connect($host,$user,$password,$db);


if($data===false)
{
	die("connection error");
}

    if($_SERVER["REQUEST_METHOD"]=="POST")
	{   //both the username and password is coming from login page
		$name = $_POST['username'];

		$pass = $_POST['password'];

            //username and the password is coming from the database fetching
		$sql="select * from user where username='".$name."' AND password='".$pass."' ";

        
		$result=mysqli_query($data,$sql);

		$row=mysqli_fetch_array($result);

        //usertype this is coming from the database
		if($row["usertype"]=="admin")
		{	
			$_SESSION['username']=$name;

			$_SESSION['usertype']="admin";

			header("location:../adminhome.php");
		}

		else
		{
			

			$message= "username or password do not match";

			$_SESSION['loginMessage']=$message;

			header("location:../admin_login.php");
		}
	}

?>