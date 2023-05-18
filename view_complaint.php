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

        $sql="SELECT *FROM user_complaint";

        $result=mysqli_query($data,$sql); //fetching data from the t



?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>View Complaint</title>

    <link rel="stylesheet" type="text/css" href="admin.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
   
</head>

<body>

    <?php
    include 'view_complaint_sidebar.php'
    ?>

    <div class="content">

        <h1>complaints</h1>
        <center>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Room-no</th>
                        <th scope="col">Phone number</th>
                        <th scope="col">Message</th>
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
                        <td><?php  echo"{$info['roomNo']}" ;?></td>
                        <td><?php  echo"{$info['phone']}" ;?></td>
                        <td><?php  echo"{$info['message']}" ;?></td>
                        <td></td>
                        
                         
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