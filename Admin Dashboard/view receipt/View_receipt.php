<?php
error_reporting(0);
$host = "localhost";
$user = "root";
$password = "";
$db = "miniproject";

$data = mysqli_connect($host, $user, $password, $db);

// Check if the enrollment ID is submitted
if (isset($_POST['enrollment_id'])) {
    $enrollment_id = $_POST['enrollment_id'];
    
    // Retrieve the uploaded file data from the "receipt" table based on the enrollment ID
    $query = "SELECT * FROM receipt WHERE enrollment_id = '$enrollment_id'";
    $result = mysqli_query($data, $query);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel - Uploaded Files</title>
    <meta charset="utf-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="../admin.css">
</head>

<body>

    <?php
    include "view_receipt_sidebar.php";
    ?>

    <div class="content">
        <h1>Receipt</h1>
        <p>Conveniently access and review mess fee receipts uploaded by students, ensuring smooth financial operations.</p>

        <!-- Search Form -->
        <form method="POST" action="">
            <div class="mb-3">
                <label for="enrollment_id" class="form-label">Enter Enrollment ID:</label>
                <input type="text" class="form-control" id="enrollment_id" name="enrollment_id" placeholder="Enrollment ID" required>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <!-- Display Search Results -->
        <?php if (isset($result) && mysqli_num_rows($result) > 0): ?>
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
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['month'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['enrollment_id'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['phone_no'] ?></td>
                            <td><img src="<?= $row['img_source'] ?>" alt="Receipt Image" style="max-width: 200px;"></td>
                            <td><?= $row['transaction_id'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php elseif (isset($_POST['enrollment_id'])): ?>
            <p>No receipts found for the given enrollment ID.</p>
        <?php endif; ?>
    </div>
</body>

</html>
