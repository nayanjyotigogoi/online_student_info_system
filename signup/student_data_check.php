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
           
        $data_number=$_POST['phone'];
        $data_email=$_POST['email'];
        $data_id=$_POST['enrollment_id'];
        $data_password=$_POST['password'];
        $usertype="student";
//inserting the student data
        $sql="INSERT INTO registration (phone,email,enrollment_id,password,usertype) VALUES ('".$data_number."','".$data_email."','".$data_id."','".$data_password."','".$usertype."')";
        $result=mysqli_query($data,$sql); //all the data are inserted.
        
        if($result){

            echo "<script>alert(user registered succesfully);</script>"; 
            
            header("location:../login/login.php");
        }
        else{
            echo "<script>alert(couldn't register user);</script>";
        }
         
    }

     
?> 
