<?php
// session_start();

    // if(!isset($_SESSION['username']))
    // {
    //     header("location:login.php");
    // }
    // elseif($_SESSION['usertype']=='student'){
    //     header("location:login.php");
	// }

	$host="localhost";
	$user="root";
	$password="";
	$db="miniproject";

	$data=mysqli_connect($host,$user,$password,$db); 

	$id=$_POST['id'];
	$sql="SELECT *FROM room where id='".$id."'";
	$result=mysqli_query($data,$sql);
	$info=mysqli_fetch_array($result);
 
if ($_POST['update'])
{
	$roomno = $_POST['room_no'];
	$occupant_1 = $_POST['occupant_1'];
	$occupant_2 = $_POST['occupant_2'];
	$status = $_POST['status'];
	

	$sql="UPDATE room room_no='".$roomno."',occupant_1='".$occupant_1."',occupant_2='".$occupant_2."',status='".$status."' WHERE id='".$id."'";


	$result = mysqli_query($data,$sql);

	if ($result) {
        $_SESSION['message']="entry completed";
        header("location:update_room.php");
	} else {
        $_SESSION['message']="couldn't register user";
	}
	
}
