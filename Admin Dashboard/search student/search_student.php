<?php
session_start();
error_reporting(0);

$host = "localhost";
$user = "root";
$password = "";
$db = "miniproject";
$data = mysqli_connect($host, $user, $password, $db);

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['search'])) {
    $enrollmentId = $_POST['enrollment_id'];

    // Fetch student details from registration table
    $studentSql = "SELECT * FROM registration WHERE enrollment_id = '$enrollmentId'";
    $studentResult = mysqli_query($data, $studentSql);

    if ($studentResult) {
        $studentInfo = mysqli_fetch_assoc($studentResult);
    } else {
        $searchError = "Failed to fetch student information.";
    }

    // Fetch complaints from user_complaint table
    $complaintSql = "SELECT * FROM user_complaint WHERE enrollment_id = '$enrollmentId'";
    $complaintResult = mysqli_query($data, $complaintSql);

    if ($complaintResult) {
        $complaints = mysqli_fetch_all($complaintResult, MYSQLI_ASSOC);
    } else {
        $complaintError = "Failed to fetch complaints.";
    }

    // Fetch room number from room table
    $roomSql = "SELECT room_no FROM room WHERE enrollment_id_A = '$enrollmentId' OR enrollment_id_B = '$enrollmentId'";
    $roomResult = mysqli_query($data, $roomSql);

    if ($roomResult) {
        $roomInfo = mysqli_fetch_assoc($roomResult);
    } else {
        $roomError = "Failed to fetch room information.";
    }

    // Fetch receipt from receipt table
    $receiptSql = "SELECT * FROM receipt WHERE enrollment_id = '$enrollmentId'";
    $receiptResult = mysqli_query($data, $receiptSql);

    if ($receiptResult) {
        $receiptInfo = mysqli_fetch_assoc($receiptResult);
    } else {
        $receiptError = "Failed to fetch receipt information.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Search Student</title>
</head>

<body>
    <?php
    include "Admin_sidebar.php";
    ?>

    <div class="content">
        <h1>Search Student</h1>
        <br>

        <form method="POST" action="">
            <div class="mb-3">
                <label for="enrollment_id" class="form-label">Enter Enrollment ID:</label>
                <input type="text" class="form-control" id="enrollment_id" name="enrollment_id" placeholder="Enrollment ID" required>
            </div>
            <button type="submit" class="btn btn-primary" name="search">Search</button>
        </form>

        <?php if (isset($searchError)) : ?>
            <p><?php echo $searchError; ?></p>
        <?php elseif (isset($studentInfo)) : ?>
            <h2>Student Details</h2>
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
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $studentInfo['id']; ?></td>
                        <td><?php echo $studentInfo['name']; ?></td>
                        <td><?php echo $studentInfo['surname']; ?></td>
                        <td><?php echo $studentInfo['phone']; ?></td>
                        <td><?php echo $studentInfo['address']; ?></td>
                        <td><?php echo $studentInfo['pin_code']; ?></td>
                        <td><?php echo $studentInfo['district']; ?></td>
                        <td><?php echo $studentInfo['state']; ?></td>
                        <td><?php echo $studentInfo['country']; ?></td>
                        <td><?php echo $studentInfo['email']; ?></td>
                        <td><?php echo $studentInfo['gsuite']; ?></td>
                        <td><?php echo $studentInfo['program']; ?></td>
                        <td><?php echo $studentInfo['department']; ?></td>
                        <td><?php echo $studentInfo['enrollment_id']; ?></td>
                        <td><?php echo $studentInfo['batch']; ?></td>
                        <td><?php echo $studentInfo['current_year']; ?></td>
                        <td><?php echo $studentInfo['current_semester']; ?></td>
                        <td><?php echo $studentInfo['room_no']; ?></td>

                    </tr>
                </tbody>
            </table>


            <!-- complaint -->

            <?php if (isset($complaints)) : ?>
                <h2>Complaints</h2>
                <?php foreach ($complaints as $complaint) : ?>
                    <p><?php echo $complaint['complaint_text']; ?></p> 
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
                    <td  ><?php echo $complaint['message']; ?></td>
                </tr>
                <tr>
                    <th class="bg-danger">Status</th>
                    <td class="bg-danger"><?php echo $complaint['status']; ?></td>
                </tr>
            </table>
                <?php endforeach; ?>
            <?php elseif (isset($complaintError)) : ?>
                <p><?php echo $complaintError; ?></p>
            <?php endif; ?>


             

            <!-- room -->

            <?php if (isset($roomInfo)) : ?>
                <h2>Room Information</h2>
                <p>Room Number: <?php echo $roomInfo['room_no']; ?></p>
            <?php elseif (isset($roomError)) : ?>
                <p><?php echo $roomError; ?></p>
            <?php endif; ?>

            


            <!-- receipt -->
            <?php if (isset($receiptInfo)) : ?>
                <h2>Receipt Information</h2>
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col"> ID </th>
                        <th scope="col"> Month </th>
                        <th scope="col"> Name </th>
                        <th scope="col"> Enrollment ID </th>
                        <th scope="col"> Email </th>
                        <th scope="col"> Phone Number </th>
                        <th scope="col"> Image </th>
                        <th scope="col"> Transaction ID </th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ( $receiptInfo = mysqli_fetch_assoc($receiptResult)): ?>
                     
                        <tr>
                            <td><?= $receiptInfo['id'] ?></td>
                            <td><?= $receiptInfo['month'] ?></td>
                            <td><?= $receiptInfo['name'] ?></td>
                            <td><?= $receiptInfo['enrollment_id'] ?></td>
                            <td><?= $receiptInfo['email'] ?></td>
                            <td><?= $receiptInfo['phone_no'] ?></td>
                            <td><img src="<?= $receiptInfo['img_source'] ?>" alt="Receipt Image" style="max-width: 200px;"></td>
                            <td><?= $receiptInfo['transaction_id'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </tabreceiptInfo
            <?php elseif (isset($receiptError)) : ?>
                <p><?php echo $receiptError; ?></p>
            <?php endif; ?>
        <?php endif; ?>
    </div>

</body>

</html>