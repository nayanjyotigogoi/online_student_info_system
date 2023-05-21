<?php
session_start();
error_reporting(0);

$host = "localhost";
$user = "root";
$password = "";
$db = "miniproject";
$data = mysqli_connect($host, $user, $password, $db);

if (!isset($_SESSION['enrollment_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enrollmentId = $_SESSION['enrollment_id'];

    // Retrieve updated field values from the form
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $pinCode = $_POST['pin_code'];
    $district = $_POST['district'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $email = $_POST['email'];
    $gsuite = $_POST['gsuite'];
    $program = $_POST['program'];
    $department = $_POST['department'];
    $batch = $_POST['batch'];
    $currentYear = $_POST['current_year'];
    $currentSemester = $_POST['current_semester'];

    // Update the user profile in the database
    $sql = "UPDATE registration SET name='$name', surname='$surname', phone='$phone', address='$address', pin_code='$pinCode', district='$district', state='$state', country='$country', email='$email', gsuite='$gsuite', program='$program', department='$department', batch='$batch', current_year='$currentYear', current_semester='$currentSemester' WHERE enrollment_id='$enrollmentId'";
    $result = mysqli_query($data, $sql);

    if ($result) {
        echo "<script>alert(Profile updated successfully);</script>";
        header("Location: studenthome.php");
        exit();
    } else {
        echo "</script>alert(Failed to update profile.);</script>";
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
    <title>Edit details</title>
</head>

<body>

    <?php
    include 'edit_student_sidebar.php'
    ?>

    <div class="content">

        <h1>Edit details</h1>

        <br>

        <p>You can update your personal information, HERE.</p>

        <?php if (isset($editError)) : ?>
            <p><?php echo $editError; ?></p>
        <?php else : ?>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <table>
                    <td>
                        <div>
                            <div>
                                <div class="container rounded bg-white mt-5 mb-5">
                                    <div class="row">
                                        <div class="col-md-5 border-right student-profile-form-box">
                                            <div class="p-3 py-5">

                                                <div class="row mt-2">
                                                    <div class="col-md-6">
                                                        <label class="labels">Name</label>
                                                        <input type="text" class="form-control" placeholder="first name" name="name" value="<?php echo $userInfo['name']; ?>" required>
                                                </div>
                                                <div class=" col-md-6">
                                                        <label class="labels">Surname</label>
                                                        <input type="text" class="form-control" placeholder="surname" name="surname" alue="<?php echo $userInfo['surname']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-12">
                                                        <label class="labels">Mobile Number</label>
                                                        <input type="text" class="form-control" placeholder="enter phone number" name="phone" value="<?php echo $userInfo['phone']; ?>" required>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label class="labels">Address</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter your Address" name="address" value="<?php echo $userInfo['address']; ?>" required>
                                                    </textarea>
                                                        <div class="col-md-12">
                                                            <label class="labels">Pin-code</label>
                                                            <input type="text" class="form-control" placeholder="enter address" name="pin_code" value="<?php echo $userInfo['pin_code']; ?>" required>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label class="labels">District</label>
                                                            <input type="text" class="form-control" placeholder="enter your district" value="<?php echo $userInfo['district']; ?>" name="district" required>
                                                        </div>

                                                        <div class="row mt-3">

                                                            <div class="col-md-6">
                                                                <label class="labels">State/Region</label>
                                                                <input type="text" class="form-control" value="<?php echo $userInfo['state']; ?>" placeholder="state" name="state" required>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="labels">Country</label>
                                                                <input type="text" class="form-control" placeholder="country" value="<?php echo $userInfo['country']; ?>" name="country" required>
                                                            </div>

                                                        </div>

                                                    </div>


                                                    <div class="col-md-12">
                                                        <label class="labels">Email ID</label>
                                                        <input type="text" class="form-control" placeholder="enter email id" value="<?php echo $userInfo['email']; ?>" name="email" required>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label class="labels">G-suite</label>
                                                        <input type="text" class="form-control" placeholder="enter Gsuite-id" value="gsuite" value="<?php echo $userInfo['gsuite']; ?>" name="gsuite" required>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label class="labels">program</label>
                                                        <input type="text" class="form-control" placeholder="Write your program that you're enrolled in" value="<?php echo $userInfo['program']; ?>" name="program" required>

                                                    </div>

                                                    <div class="col-md-12">
                                                        <label class="labels">Department</label>
                                                        <input type="text" class="form-control" placeholder="Your Department" value="<?php echo $userInfo['department']; ?>" name="department" required>
                                                    </div>


                                                    <div class="col-md-12">
                                                        <label class="labels">Enrollment Id</label>
                                                        <input type="text" class="form-control" placeholder="Your Enrollment id/roll no" value="<?php echo $userInfo['enrollment_id']; ?>" name="enrollment_id" required>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label class="labels">Batch</label>
                                                        <input type="text" class="form-control" placeholder="Your batch (20xx - 20xx)" value="<?php echo $userInfo['batch']; ?>" name="batch" required>

                                                    </div>

                                                    <div class="row mt-3">
                                                        <div class="col-md-6">
                                                            <label class="labels">Current Year</label>
                                                            <input type="text" class="form-control" placeholder="Current Year" value="<?php echo $userInfo['current_year']; ?>" name="current_year" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="labels">Current Semester</label>
                                                            <input type="text" class="form-control" value="<?php echo $userInfo['current_semester']; ?>" placeholder="Current Semester" name="current_semester" required>
                                                        </div>
                                                    </div>


                                                </div>



                                                <div class="mt-5 text-center">
                                                    <button class="btn btn-primary profile-button" type="submit" name="register">Save
                                                        Profile</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </table>
            </form>
        <?php endif; ?>

    </div>
</body>

</html>