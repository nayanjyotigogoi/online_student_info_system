<!-- this page is for showing student profile -->
<?php
if(isset($_SESSION[]))

error_reporting(0);

    session_start();
    session_destroy();

        $host="localhost";
        $user="root";
        $password="";
        $db="miniproject";
        $data=mysqli_connect($host,$user,$password,$db);

        if(isset($_POST['enrollment_id']))
        $username =  'enrollment_id';
        $password =  'password';

        $sql="SELECT   *FROM registration ";  
        $result=mysqli_query($data,$sql);
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Your profile</title>
</head>

<body>

    <?php
    include 'student_profile_sidebar.php'
        ?>

    <div class="content">

        <h1>Your profile</h1>

         

            <section>
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Surname</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Pin code</th>
                        <th scope="col">District</th>
                        <th scope="col">State</th>
                        <th scope="col">Country</th>
                        <th scope="col">Email</th>
                        <th scope="col">Gsuite</th>
                        <th scope="col">Program</th>
                        <th scope="col">Department</th>
                        <th scope="col">Enrollment id</th>
                        <th scope="col">Batch</th>
                        <th scope="col">Curent year</th>
                        <th scope="col">Current semester</th>
                    </tr>
                </thead>
                 
                <tbody>
                    <tr>
                    <?php
                     
                          
                    while($info=$result->fetch_assoc())
                    {    
                    ?>
                        <th scope="row"><?php  echo"{$info['id']}" ;?></th>
                        <td><?php  echo"{$info['name']}" ;?> </td>
                        <td><?php  echo"{$info['surname']}" ;?></td>
                        <td><?php  echo"{$info['phone']}" ;?></td>
                        <td><?php  echo"{$info['address']}" ;?></td>
                        <td><?php  echo"{$info['pin_code']}" ;?></td>
                        <td><?php  echo"{$info['district']}" ;?></td>
                        <td><?php  echo"{$info['state']}" ;?></td>
                        <td><?php  echo"{$info['country']}" ;?></td>
                        <td><?php  echo"{$info['email']}" ;?></td>
                        <td><?php  echo"{$info['gsuite']}" ;?></td>
                        <td><?php  echo"{$info['program']}" ;?></td>
                        <td><?php  echo"{$info['department']}" ;?></td>
                        <td><?php  echo"{$info['enrollment_id']}" ;?></td>
                        <td><?php  echo"{$info['batch']}" ;?></td>
                        <td><?php  echo"{$info['current_year']}" ;?></td>
                        <td><?php  echo"{$info['current_semester']}" ;?></td>      
                         
                    </tr>
                        
                     
                    <?php
                    }
                    ?> 
                    <!-- //why php tag because we cannot write php code inside the html therefore we're introducinh php opening and closing tag. -->
                    
                </tbody>
            </section>
         
        

                 
            </table>
    </div>
</body>
</html>