<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "miniproject";

// Create a connection

 
$data = mysqli_connect($host, $user, $password, $db);

if(isset($_GET["enrollment_id"])){
    $mn=$_GET["enrollment_id"];
    $sql = "SELECT *FROM registration WHERE enrollment_id='$mn' ";
    $result = mysqli_query($data, $sql);
     
}
 
?>

<html>

<head>
    <title>User Profile</title>
</head>

<body>
    <h1>User Profile</h1>

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

                while ($info =mysqli_fetch_assoc($result)) {
                ?>
                    <th scope="row"><?php echo "{$info['id']}"; ?></th>
                    <td><?php echo "{$info['name']}"; ?> </td>
                    <td><?php echo "{$info['surname']}"; ?></td>
                    <td><?php echo "{$info['phone']}"; ?></td>
                    <td><?php echo "{$info['address']}"; ?></td>
                    <td><?php echo "{$info['pin_code']}"; ?></td>
                    <td><?php echo "{$info['district']}"; ?></td>
                    <td><?php echo "{$info['state']}"; ?></td>
                    <td><?php echo "{$info['country']}"; ?></td>
                    <td><?php echo "{$info['email']}"; ?></td>
                    <td><?php echo "{$info['gsuite']}"; ?></td>
                    <td><?php echo "{$info['program']}"; ?></td>
                    <td><?php echo "{$info['department']}"; ?></td>
                    <td><?php echo "{$info['enrollment_id']}"; ?></td>
                    <td><?php echo "{$info['batch']}"; ?></td>
                    <td><?php echo "{$info['current_year']}"; ?></td>
                    <td><?php echo "{$info['current_semester']}"; ?></td>

            </tr>
        <?php
                }
        ?>
        </tbody>
    </table>
</body>

</html>

 