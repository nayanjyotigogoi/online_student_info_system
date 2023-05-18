<!--  
<?php

 
session_start();
 

$host="localhost";
$user="root";
$password="";
$db="miniproject";
$data=mysqli_connect($host,$user,$password,$db);

if ($data===false){
    die("connection error");
}
    //isset()-->checks whether a variable is set, which means that it has to be declared and is not NULL.
    if(isset($_POST['register']))
    {
        $data_id=$_POST['enrollment_id'];
        $data_name=$_POST['username'];
        $data_email=$_POST['email'];
        $data_number=$_POST['phone'];
        $data_password=$_POST['password'];
        $usertype="student";
//inserting the student data
        $sql="INSERT INTO user (enrollment_id,username,password,phone,email,usertype) VALUES ('".$data_id."','".$data_name."','".$data_password."','".$data_number."','".$data_email."','".$usertype."')";

        $result=mysqli_query($data,$sql); //all the data are inserted.
        
        if($result){

            $message= "user registered succesfully";
			$_SESSION['loginMessage']=$message;    
            header("location:login.php");
        }
        else{
            $_SESSION['message']="couldn't register user";
        }
         
    }

     
?> -->
