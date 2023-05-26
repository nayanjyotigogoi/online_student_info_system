<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: write_complaint.php");
} elseif ($_SESSION['usertype'] == 'student') {
    header("location: write_complaint.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "miniproject";

$data = mysqli_connect($host, $user, $password, $db);

if (isset($_POST['complaint'])) {
    $name = $_POST['name'];
    $enrollment_id = $_POST['enrollment_id'];
    $roomno = $_POST['roomNo'];
    $number = $_POST['phone'];
    $queryType = $_POST['queryType'];
    $query = $_POST['message'];

    $sql = "INSERT INTO user_complaint (name, enrollment_id, roomNo, phone, querytype, message) VALUES ('$name', '$enrollment_id', '$roomno', '$number', '$queryType', '$query')";

    $result = mysqli_query($data, $sql);

    if ($result) {
        echo "<script>alert('Complaint registered successfully.');</script>";
    } else {
        echo "<script>alert('Failed to register complaint. Please try again.');</script>";
    }
}
?>
