<?php

 
session_start();
 

$host="localhost";
$user="root";
$password="";
$db="miniproject";

$data=mysqli_connect($host,$user,$password,$db);

// if ($data===false){
//     die("connection error");
// }
    //isset()-->checks whether a variable is set, which means that it has to be declared and is not NULL.
    if(isset($_POST['register']))
    {
        $data_name=$_POST['name'];
        $data_surname=$_POST['surname'];
        $data_phone=$_POST['phone'];
        $data_address=$_POST['address'];
        $data_pin=$_POST['pin_code'];
        $data_district=$_POST['district'];
        $data_state=$_POST['state'];
        $data_country=$_POST['country'];
        $data_email=$_POST['email'];
        $data_gsuite=$_POST['gsuite'];
        $data_program=$_POST['program'];
        $data_department=$_POST['department'];
        $data_enrollment=$_POST['enrollment_id'];
        $data_batch=$_POST['batch'];
        $data_year=$_POST['current_year'];
        $data_semester=$_POST['current_semester'];
        $usertype="student";
//inserting the student data
        $sql="INSERT INTO  registration(name,surname,phone,address,pin_code,district,state,country,email,gsuite,program,department,enrollment_id,batch,current_year,current_semester,usertype) VALUES ('".$data_name."','".$data_surname."','".$data_phone."','".$data_address."','".$data_pin."','".$data_district."','".$data_state."','".$data_country."','".$data_email."','".$data_gsuite."','".$data_program."','".$data_department."','".$data_enrollment."','".$data_batch."','".$data_year."','".$data_semester."','".$usertype."')";

        $result=mysqli_query($data,$sql); //all the data are inserted.
        
        if($result){
            

            echo "<script>alert('Data uploaded succesfully');</script>";
			    
            header("location:edit_student.php");
        }
        else{
             echo "<script> alert('couldn't Upload data');</script>";
        }
         
    }

     
?>
 