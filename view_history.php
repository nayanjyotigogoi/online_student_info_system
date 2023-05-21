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
            echo "<script> alert('Data inserted'); window.location.href = 'studenthome.php';</script>";
        } else {
            echo "<script> alert('Unable To Insert Data');</script>";
        }
    }
}

 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="./admin.css">
</head>

<body>
    <?php include "file_upload_sidebar.php"; ?>
    <div class="content">
        
        
        <h1>View Transaction History</h1>
        <form action="display_record.php" method="post">
            <div>
                <label>Enter Enrollment ID</label>
                <input type="text" class="form-control" name="enrollment_id" placeholder="Enrollment ID" required>
            </div>
            <br>
            <input type="submit" name="view" value="View Transaction History">
        </form>
    </div>
</body>

</html>
