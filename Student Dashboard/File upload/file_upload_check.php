<?php
error_reporting(0);
$host = "localhost";
$user = "root";
$password = "";
$db = "miniproject";

$data = mysqli_connect($host, $user, $password, $db);

if ($_POST['submit']) {
    $filename = $_FILES["img_source"]["name"];
    $tempname = $_FILES["img_source"]["tmp_name"];
    $folder = "receipt_folder/" . $filename;
    move_uploaded_file($tempname, $folder);

    $id = $_POST['id'];
    $month = $_POST['month'];
    $name = $_POST['name'];
    $enrollmentid = $_POST['enrollment_id'];
    $email = $_POST['email'];
    $phoneno = $_POST['phone_no'];
    $imgsource = $_POST['img_source'];
    $transactionid = $_POST['transaction_id'];

    // Check if the data already exists in the table for the same month and enrollment ID
    $checkDuplicateQuery = "SELECT * FROM receipt WHERE month = '$month' AND enrollment_id = '$enrollmentid'";
    $checkDuplicateResult = mysqli_query($data, $checkDuplicateQuery);
    $duplicateRows = mysqli_num_rows($checkDuplicateResult);

    if ($duplicateRows > 0) {
        echo "<script> alert('Duplicate entry, data already exists for the same month and enrollment ID'); window.location.href = 'studenthome.php';</script>";
    } else {
        $sql = "INSERT INTO receipt (id, month, name, enrollment_id, email, phone_no, img_source, transaction_id) VALUES ('" . $id . "','" . $month . "','" . $name . "','" . $enrollmentid . "','" . $email . "','" . $phoneno . "','" . $folder . "','" . $transactionid . "')";

        $result = mysqli_query($data, $sql);

        if ($result) {
            echo "<script> alert('Data inserted'); window.location.href = '../studenthome.php';</script>";
        } else {
            echo "<script> alert('Unable To Insert Data');</script>";
        }
    }
}
?>