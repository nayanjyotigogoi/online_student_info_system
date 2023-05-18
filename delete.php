<?
 
 
session_start();


$host="localhost";
$user="root";
$password="";
$db="miniproject";

$data=mysqli_connect($host,$user,$password,$db);

if($_GET['user_id']){
    $username_id=$_GET['user_id'];

    $sql="DELETE FROM user WHERE id='$username_id' ";

    $result=mysqli_query($data,$sql);

    if($result)
    {   
        $_SESSION['message']='Student removed';
        header("location:view_student.php");
    }
}

?>