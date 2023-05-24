<!-- this page is view the student data in admin panel -->
<?php

error_reporting(0);
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'student') {
    header("location:login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "miniproject";

$data = mysqli_connect($host, $user, $password, $db);

$sql = "SELECT *FROM registration";

$result = mysqli_query($data, $sql);

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" type="text/css" href="admin.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>

<body>

    <?php
    include "view_student_sidebar.php"
    ?>

    <div class="content">

        <h1>Student data</h1>
        <p>Access students' login details to assist with any technical issues they may encounter.</p>

        <?php
        if ($_SESSION['message']) {
            echo $_SESSION['message'];
        }

        unset($_SESSION['message']); //if we refresh our browser it will shoe the message

        ?>

        <!-- ...existing code... -->

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Enrollment-Id</th>                   
                    <th scope="col">Password</th>
                    <th scope="col">User-type</th>
                    <th scope="col">Actions</th> <!-- New column for actions -->
                </tr>
            </thead>

            <tbody>
                <?php
                while ($info = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <th scope="row"><?php echo "{$info['id']}"; ?></th>
                        <td><?php echo "{$info['enrollment_id']}"; ?></td>
                        <td><?php echo "{$info['password']}"; ?></td>
                        <td><?php echo "{$info['usertype']}"; ?></td>
                        <td>
                            <a href="delete_student.php?id=<?php echo $info['id']; ?>" onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <!-- ...remaining code... -->


    </div>



</body>

</html>