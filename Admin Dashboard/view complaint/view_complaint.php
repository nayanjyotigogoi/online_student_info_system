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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $complaintId = $_POST['complaint_id'];
    $status = $_POST['status'];

    // Update the status in the database
    $updateSql = "UPDATE user_complaint SET status = '$status' WHERE id = '$complaintId'";
    mysqli_query($data, $updateSql);
}

$sql = "SELECT * FROM user_complaint";
$result = mysqli_query($data, $sql);
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
        <h1>Complaints </h1>
        <p>Update the status of complaints posted by students.</p>
        <center>
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
                        <th scope="col">Update Status</th>
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
                                <form method="post">
                                    <input type="hidden" name="complaint_id" value="<?php echo $info['id']; ?>">
                                    <select name="status">
                                        <option value="---">---</option>
                                        <option value="Not Solved">Not Solved</option>
                                        <option value="Solved">solved</option>
                                        <option value="Forwarded to Warden">Forwarded to Warden</option>
                                    </select>
                                    <button type="submit">Update</button>
                                </form>
                            </td>
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
