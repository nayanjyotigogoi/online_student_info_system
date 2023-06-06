<?php
session_start();
error_reporting(0);

$host = "localhost";
$user = "root";
$password = "";
$db = "miniproject";
$data = mysqli_connect($host, $user, $password, $db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $pin_code = $_POST['pin_code'];
    $district = $_POST['district'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $email = $_POST['email'];
    $current_year = $_POST['current_year'];
    $current_semester = $_POST['current_semester'];

    $enrollmentId = $_SESSION['enrollment_id'];

    $sql = "UPDATE registration SET phone = '$phone', address = '$address', pin_code = '$pin_code', district = '$district', state = '$state', country = '$country', email = '$email', current_year = '$current_year', current_semester = '$current_semester' WHERE enrollment_id = '$enrollmentId'";

    if (mysqli_query($data, $sql)) {
        echo "<script>alert('Profile updated successfully!');</script>";
    } else {
        echo "<script>alert('Failed to update profile.');</script>";
    }
}

// Fetch the user's current profile information
$enrollmentId = $_SESSION['enrollment_id'];
$sql = "SELECT * FROM registration WHERE enrollment_id = '$enrollmentId'";
$result = mysqli_query($data, $sql);

if ($result) {
    $userInfo = mysqli_fetch_assoc($result);
} else {
    $editError = "Failed to fetch user profile.";
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Update Profile</title>
    <style>
        .editable-field {
            background-color: #FFFFE0;
        }
    </style>
</head>

<body>

    <?php
    include "edit_student_sidebar.php";
    ?>

    <div class="content">
        <h1>Edit details</h1>
        <br>
        <p>You can update your personal information here.</p>

        <?php if (isset($editError)) : ?>
            <p><?php echo $editError; ?></p>
        <?php else : ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <table>
                    <tr>
                        <td>
                            <div>
                                <div>
                                    <div class="container rounded bg-white mt-5 mb-5">
                                        <div class="row">
                                            <div class="col-md-5 border-right student-profile-form-box">
                                                <div class="p-3 py-5">
                                                    <div class="row mt-2">

                                                        <div class="col-md-12">
                                                            <label class="labels">Name</label>
                                                            <input type="text" class="form-control" value="<?php echo $userInfo['name']; ?>" disabled>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-md-12">
                                                                <label class="labels">Surname</label>
                                                                <input type="text" class="form-control" value="<?php echo $userInfo['surname']; ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="labels">Phone Number</label>
                                                            <input type="text" class="form-control editable-field" placeholder="Enter phone number" name="phone" value="<?php echo $userInfo['phone']; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-md-12">
                                                            <label class="labels">Address</label>
                                                            <input type="text" class="form-control editable-field" placeholder="Enter address" name="address" value="<?php echo $userInfo['address']; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-md-6">
                                                            <label class="labels">Pin Code</label>
                                                            <input type="text" class="form-control editable-field" placeholder="Enter pin code" name="pin_code" value="<?php echo $userInfo['pin_code']; ?>" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="labels">District</label>
                                                            <input type="text" class="form-control editable-field" placeholder="Enter district" name="district" value="<?php echo $userInfo['district']; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-md-6">
                                                            <label class="labels">State</label>
                                                            <input type="text" class="form-control editable-field" placeholder="Enter state" name="state" value="<?php echo $userInfo['state']; ?>" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="labels">Country</label>
                                                            <input type="text" class="form-control editable-field" placeholder="Enter country" name="country" value="<?php echo $userInfo['country']; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-md-12">
                                                            <label class="labels">Email</label>
                                                            <input type="email" class="form-control editable-field" placeholder="Enter email" name="email" value="<?php echo $userInfo['email']; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <div class="row mt-2">
                                                            <div class="col-md-12">
                                                                <label class="labels">G-suite Id</label>
                                                                <input type="text" class="form-control" value="<?php echo $userInfo['gsuite']; ?>" name="gsuite" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label class="labels">Enrollment ID</label>
                                                            <input type="text" class="form-control" value="<?php echo $userInfo['enrollment_id']; ?>" disabled>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-md-12">
                                                                <label class="labels">Department</label>
                                                                <input type="text" class="form-control" value="<?php echo $userInfo['department']; ?>" name="department" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-md-12">
                                                                <label class="labels">program</label>
                                                                <input type="text" class="form-control" value="<?php echo $userInfo['program']; ?>" name="program" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-md-12">
                                                                <label class="labels">Current Year</label>
                                                                <input type="text" class="form-control editable-field" placeholder="Enter current year" name="current_year" value="<?php echo $userInfo['current_year']; ?>" required>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="labels">Current Semester</label>
                                                                <input type="text" class="form-control editable-field" placeholder="Enter current semester" name="current_semester" value="<?php echo $userInfo['current_semester']; ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-md-12">
                                                                <input type="submit" class="btn btn-primary btn-block" value="Update Profile">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </td>
                    </tr>
                </table>
            </form>
        <?php endif; ?>
    </div>

</body>

</html>