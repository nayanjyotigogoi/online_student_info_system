<?php
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

if (isset($_POST['search'])) {
    $enrollmentId = $_POST['enrollment_id'];

    // Fetch data from the database based on the enrollment ID
    $sql = "SELECT * FROM user_complaint WHERE enrollment_id = '$enrollmentId'";
    $result = mysqli_query($data, $sql);
} else {
    $sql = "SELECT * FROM user_complaint";
    $result = mysqli_query($data, $sql);
}

// Update complaint status
if (isset($_POST['update_status'])) {
    $complaintId = $_POST['complaint_id'];
    $status = $_POST['status'];

    $updateSql = "UPDATE user_complaint SET status = '$status' WHERE id = '$complaintId'";
    $updateResult = mysqli_query($data, $updateSql);

    if ($updateResult) {
        echo "<script>alert('Status updated successfully.'); window.location.href = '../adminhome.php';</script>";
    } else {
        echo "<script>alert('Failed to update status. Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Update Complaint Status</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
    include 'view_complaint_sidebar.php';
    ?>

    <div class="content">
        <h1>Complaints</h1>
        <p>Update the status of complaints posted by students.</p>

        <!-- Search Form -->
        <form method="POST" action="">
            <div class="mb-3">
                <label for="enrollment_id" class="form-label">Enter Enrollment ID:</label>
                <input type="text" class="form-control" id="enrollment_id" name="enrollment_id" placeholder="Enrollment ID" required>
            </div>
            <button type="submit" class="btn btn-primary" name="search">Search</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Enrollment Id</th>
                    <th scope="col">Room No</th>
                    <th scope="col">Phone Number</th>
                    <th class="bg-info" scope="col">Message</th>
                    <th class="bg-danger" scope="col">Status</th>
                    <th class="bg-warning" scope="col">Update Status</th>
                </tr>
            </thead>

            <tbody>
                <?php
                while ($info = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $info['id']; ?></th>
                        <td><?php echo $info['name']; ?></td>
                        <td><?php echo $info['enrollment_id']; ?></td>
                        <td><?php echo $info['roomNo']; ?></td>
                        <td><?php echo $info['phone']; ?></td>
                        <td class="bg-info"><?php echo $info['message']; ?></td>
                        <td class="bg-danger"><?php echo $info['status']; ?></td>
                        <td>
                            <form method="POST" action="">
                                <input type="hidden" name="complaint_id" value="<?php echo $info['id']; ?>">
                                <select name="status" class="form-select" required>
                                    <option value="" selected disabled>Select Status</option>
                                    <option value="Pending">Pending</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Resolved">Resolved</option>
                                    <option value="Forwarded to warden ">Forwarded to warden</option>
                                </select>
                                <button type="submit" class="btn btn-primary" name="update_status">Update</button>
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
