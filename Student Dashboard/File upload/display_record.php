<?php
error_reporting(0);
$host = "localhost";
$user = "root";
$password = "";
$db = "miniproject";

$data = mysqli_connect($host, $user, $password, $db);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./admin.css">
</head>

<body>
    <?php include "file_upload_sidebar.php"; ?>
    <div class="content">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Month</th>
                    <th scope="col">Name</th>
                    <th scope="col">Enrollment id</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone number</th>
                    <th scope="col">Receipt</th>
                    <th scope="col">Transaction Id</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($_POST['view']) {
                    $enrollmentid = $_POST['enrollment_id'];

                    $viewQuery = "SELECT * FROM receipt WHERE enrollment_id = '$enrollmentid'";
                    $viewResult = mysqli_query($data, $viewQuery);

                    if (mysqli_num_rows($viewResult) > 0) {
                        echo "<h2>Transaction History for Enrollment ID: $enrollmentid</h2>";

                        while ($row = mysqli_fetch_assoc($viewResult)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['month'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['enrollment_id'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['phone_no'] . "</td>";
                            echo "<td><img src='" . $row['img_source'] . "' alt='Receipt Image' height='100' width='100'></td>";
                            echo "<td>" . $row['transaction_id'] . "</td>";
                            echo "</tr>";
                        }

                        echo "</table>";
                    } else {
                        echo "<h2>No transaction history found for Enrollment ID: $enrollmentid</h2>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
