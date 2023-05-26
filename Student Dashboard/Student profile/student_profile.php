<?php
session_start();
error_reporting(0);

$host = "localhost";
$user = "root";
$password = "";
$db = "miniproject";
$data = mysqli_connect($host, $user, $password, $db);

if (!isset($_SESSION['enrollment_id'])) {
    header("Location: login.php");
    exit();
}

$enrollmentId = $_SESSION['enrollment_id'];
$sql = "SELECT reg.*, room.room_no
        FROM registration AS reg
        LEFT JOIN room ON (reg.enrollment_id = room.enrollment_id_A OR reg.enrollment_id = room.enrollment_id_B)
        WHERE reg.enrollment_id = '$enrollmentId'";
$result = mysqli_query($data, $sql);

if ($result) {
    $userInfo = mysqli_fetch_assoc($result);
} else {
    $profileError = "Failed to fetch user profile.";
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>User Profile</title>
</head>

<body>
    <?php
    include "student_profile_sidebar.php";
    ?>

    <div class="content">
        <h1>User Profile</h1>
        <br>

        <p>You can access and update your personal information, ensuring that your details are accurate and up to date.</p>

        <?php if (isset($profileError)) : ?>
            <p><?php echo $profileError; ?></p>
        <?php else : ?>
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
                        <th scope="col">Enrollment ID</th>
                        <th scope="col">Batch</th>
                        <th scope="col">Current Year</th>
                        <th scope="col">Current Semester</th>
                        <th scope="col">Room Number</th>
                        <th scope="col">Action</th> <!-- Added action column -->
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $userInfo['id']; ?></td>
                        <td><?php echo $userInfo['name']; ?></td>
                        <td><?php echo $userInfo['surname']; ?></td>
                        <td><?php echo $userInfo['phone']; ?></td>
                        <td><?php echo $userInfo['address']; ?></td>
                        <td><?php echo $userInfo['pin_code']; ?></td>
                        <td><?php echo $userInfo['district']; ?></td>
                        <td><?php echo $userInfo['state']; ?></td>
                        <td><?php echo $userInfo['country']; ?></td>
                        <td><?php echo $userInfo['email']; ?></td>
                        <td><?php echo $userInfo['gsuite']; ?></td>
                        <td><?php echo $userInfo['program']; ?></td>
                        <td><?php echo $userInfo['department']; ?></td>
                        <td><?php echo $userInfo['enrollment_id']; ?></td>
                        <td><?php echo $userInfo['batch']; ?></td>
                        <td><?php echo $userInfo['current_year']; ?></td>
                        <td><?php echo $userInfo['current_semester']; ?></td>
                        <td><?php echo $userInfo['room_no']; ?></td> <!-- Display room number -->
                        <td><a href="../edit student/edit_student.php">Edit</a></td> <!-- Edit action link -->
                    </tr>
                </tbody>
            </table>

        <?php endif; ?>
    </div>

</body>

</html>
