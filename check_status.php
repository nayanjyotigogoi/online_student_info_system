<?php
session_start();
 

$host = "localhost";
$user = "root";
$password = "";
$db = "miniproject";

$data = mysqli_connect($host, $user, $password, $db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $enrollment_id = $_POST['enrollment_id'];

    // Retrieve complaint details for the given enrollment ID
    $sql = "SELECT * FROM user_complaint WHERE enrollment_id = '$enrollment_id'";
    $result = mysqli_query($data, $sql);
    $complaint = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>View Complaint Status</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <?php include"write_complaint_sidebar.php"?>

    <div class="content">
        <h1>View Complaint Status</h1>
        <p>Enter your enrollment ID to view the status of your complaint.</p>

        <form action="#" method="post">
            <label for="enrollment_id">Enrollment ID:</label>
            <input type="text" id="enrollment_id" name="enrollment_id" required>
            <button type="submit">View Status</button>
        </form>

        <?php if (isset($complaint)) : ?>
            <h2>Complaint Details</h2>
            <table class="table">
                <tr>
                    <th>Name</th>
                    <td><?php echo $complaint['name']; ?></td>
                </tr>
                <tr>
                    <th>Enrollment ID</th>
                    <td><?php echo $complaint['enrollment_id']; ?></td>
                </tr>
                <tr>
                    <th>Room No</th>
                    <td><?php echo $complaint['roomNo']; ?></td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td><?php echo $complaint['phone']; ?></td>
                </tr>
                <tr>
                    <th>Message</th>
                    <td><?php echo $complaint['message']; ?></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td><?php echo $complaint['status']; ?></td>
                </tr>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>
