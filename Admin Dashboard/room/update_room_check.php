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

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_POST['submit'])) {
        $roomNo = $_POST['room_no'];
        $occupant1 = $_POST['occupant_1'];
        $occupant2 = $_POST['occupant_2'];
        $status = $_POST['status'];

        // Update the room information in the "room" table
        $updateQuery = "UPDATE room SET room_no = '$roomNo', occupant_1 = '$occupant1', occupant_2 = '$occupant2', status = '$status' WHERE id = '$id'";
        $result = mysqli_query($data, $updateQuery);

        if ($result) {
            $_SESSION['message'] = "<div class='alert alert-success'>Room information updated successfully.</div>";
            header("location:adminhome.php"); // Redirect to the page displaying all rooms
            exit();
        } else {
            $_SESSION['message'] = "<div class='alert alert-danger'>Failed to update room information.</div>";
        }
    }

    // Retrieve the current room information based on the provided ID
    $selectQuery = "SELECT * FROM room WHERE id = '$id'";
    $result = mysqli_query($data, $selectQuery);
    $roomInfo = mysqli_fetch_assoc($result);
}

?>
