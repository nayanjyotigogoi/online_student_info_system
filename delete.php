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

    // Delete the student record from the "user" table
    $deleteQuery = "DELETE FROM user WHERE id = '$id'";
    $result = mysqli_query($data, $deleteQuery);

    if ($result) {
        $_SESSION['message'] = "<div class='alert alert-success'>Student record deleted successfully.</div>";
    } else {
        $_SESSION['message'] = "<div class='alert alert-danger'>Failed to delete student record.</div>";
    }
}

header("location:view_students.php");
?>