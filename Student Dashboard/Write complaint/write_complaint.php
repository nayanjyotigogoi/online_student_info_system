<?php
session_start();

// if (!isset($_SESSION['username'])) {
//     header("location: write_complaint.php");
// } elseif ($_SESSION['usertype'] == 'student') {
//     header("location: write_complaint.php");
// }

$host = "localhost";
$user = "root";
$password = "";
$db = "miniproject";

$data = mysqli_connect($host, $user, $password, $db);

$message = ""; // Variable to store the display message

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
        $message = "Complaint registered successfully.";
    } else {
        $message = "Failed to register complaint. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Write Complaint</title>

    <link rel="stylesheet" type="text/css" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include "write_complaint_sidebar.php";
    ?>

    <div class="content">
        <p>You are encouraged to write down any problems or difficulties you are experiencing within your room. Whether it's related to noise disturbances, maintenance issues, conflicts with roommates, or any other concern, please feel free to write your Query. We value your feedback and want to ensure that your living conditions contribute positively to your overall college experience.</p>

        <div>
            <?php if (!empty($message)) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            <form action="#" method="post">
                <div class="form-group row">
                    <label for="inputname" class="col-sm-1 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputname" placeholder="Your name" name="name" required>
                    </div>
                </div>
                <br>

                <div class="form-group row">
                    <label for="inputname" class="col-sm-1 col-form-label">Enrollment Id</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputname" placeholder="Your Enrollment Id" name="enrollment_id" required>
                    </div>
                </div>
                <br>

                <div class="form-group row">
                    <label for="inputRoom-no" class="col-sm-1 col-form-label">Room-no</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="inputroom-no" placeholder="Your room-no" name="roomNo" required>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="inputPhone" class="col-sm-1 col-form-label">Phone number</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="inputnumber" placeholder="phone" name="phone" required>
                    </div>
                </div>
                <br>

                <div class="form-group row">
                    <label for="queryType" class="col-sm-1 col-form-label">Query Type</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="queryType" name="queryType" required>
                            <option value="" selected disabled>Select Query Type</option>
                            <option value="Noise Disturbances">Noise Disturbances</option>
                            <option value="Maintenance Issues">Maintenance Issues</option>
                            <option value="Conflicts with Roommates">Conflicts with Roommates</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1" class="col-sm-1 col-form-label">Your Query</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Write Down Your Query Here, explain in brief." name="message" required></textarea>
                </div>

                <br>
                <button type="submit" class="btn btn-secondary" name="complaint">Write Complaint</button>
            </form>
        </div>
    </div>

</body>
</html>
