<?php
    session_start();
        if(!isset($_SESSION['username'])){
            header("location:login.php");
        }
        elseif($_SESSION['usertype']=='student'){
            header("location:login.php");
        }

        $host="localhost";
        $user="root";
        $password="";
        $db="miniproject";

        $data=mysqli_connect($host,$user,$password,$db);

        $sql="SELECT *FROM registration";

        $result=mysqli_query($data,$sql); //fetching data from the datbase 



?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Admission</title>

    <link rel="stylesheet" type="text/css" href="admin.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
   
</head>

<body>

    <?php
    include 'Admission_sidebar.php'
    ?>

    <div class="content">

        <h1>Students</h1>
        <p>View comprehensive details of all admitted students, including their personal information and academic records.</p>
        <center>
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
                    
                </tbody>

                 
            </table>
        </center>

    </div>




</body>

</html>