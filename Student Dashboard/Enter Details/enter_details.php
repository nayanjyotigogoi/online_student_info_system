<!-- not working -->

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
    $enrollment_id = $_SESSION['enrollment_id'];

    // Check if the user has already completed the profile registration
     

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $pin_code = $_POST['pin_code'];
    $district = $_POST['district'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $email = $_POST['email'];
    $gsuite = $_POST['gsuite'];
    $program = $_POST['program'];
    $department = $_POST['department'];
    $enrollment_id = $_POST['enrollment_id'];
    $password = $_POST['password'];
    $batch = $_POST['batch'];
    $currentYear = $_POST['current_year'];
    $currentSemester = $_POST['current_semester'];

    $sql = "INSERT INTO registration (name, surname, phone, address, pin_code, district, state, country, email, gsuite, program, department, enrollment_id, password, batch, current_year, current_semester, usertype)
    VALUES ('$name', '$surname', '$phone', '$address', '$pin_code', '$district', '$state', '$country', '$email', '$gsuite', '$program', '$department', '$enrollment_id', '$password', '$batch', '$currentYear', '$currentSemester', 'student')";

    $result = mysqli_query($data, $sql);

    if ($result) {
        echo "<script> alert('Profile updated successfully'); window.location.href = '../studenthome.php'; </script>";
        exit();
    } else {
        echo "<script>alert('Failed to update profile.'); window.location.href =  '../studenthome.php'; </script>";
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
    <style>
        .editable-field {
            background-color: #FFFFE0;
        }
    </style>
</head>

<body>

    <?php
    include "edit_student_sidebar.php"
    ?>


    <div class="content">

        <h1>Edit details</h1>
<h1>PAGE NOT WORKING PROPERLY</h1>
        <br>

        <?php if (isset($editError)) : ?>
            <p><?php echo $editError; ?></p>
        <?php else : ?>

            <?php if ($userInfo['registration_completed']) : ?>
                
                <p>You have already completed the profile registration. You can update your details from the profile page.</p>
            <?php else : ?>
                <p>You can enter your personal information here. Please fill in all the necessary fields.</p>

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
                                                            <input type="text" class="form-control" value="<?php echo $userInfo['name']; ?>">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="labels">Surname</label>
                                                            <input type="text" class="form-control" value="<?php echo $userInfo['surname']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-md-12">
                                                            <label class="labels">Mobile Number</label>
                                                            <input type="text" class="form-control editable-field" placeholder="Enter phone number" name="phone" value="<?php echo $userInfo['phone']; ?>" required>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label class="labels">Address</label>
                                                            <textarea class="form-control editable-field" id="exampleFormControlTextarea1" rows="3" placeholder="Enter your address" name="address" required><?php echo $userInfo['address']; ?></textarea>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label class="labels">Pin-code</label>
                                                            <input type="text" class="form-control" placeholder="Enter pin code" value="<?php echo $userInfo['pin_code']; ?>">
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label class="labels">District</label>
                                                            <input type="text" class="form-control" placeholder="Enter your district" value="<?php echo $userInfo['district']; ?>">
                                                        </div>

                                                        <div class="row mt-3">

                                                            <div class="col-md-6">
                                                                <label class="labels">State/Region</label>
                                                                <input type="text" class="form-control" placeholder="Enter state" value="<?php echo $userInfo['state']; ?>">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="labels">Country</label>
                                                                <input type="text" class="form-control" placeholder="Enter country" value="<?php echo $userInfo['country']; ?>">
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="col-md-12">
                                                        <label class="labels">Email ID</label>
                                                        <input type="text" class="form-control editable-field" placeholder="Enter email ID" value="<?php echo $userInfo['email']; ?>" name="email" required>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label class="labels">G-suite</label>
                                                        <input type="text" class="form-control" placeholder="Enter G-suite ID" value="<?php echo $userInfo['gsuite']; ?>">
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label class="labels">Program</label>
                                                        <input type="text" class="form-control" placeholder="Write your program that you're enrolled in" value="<?php echo $userInfo['program']; ?>">

                                                    </div>

                                                    <div class="col-md-12">
                                                        <label class="labels">Department</label>
                                                        <input type="text" class="form-control" placeholder="Your department" value="<?php echo $userInfo['department']; ?>">
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label class="labels">Enrollment Id</label>
                                                        <input type="text" class="form-control" placeholder="Your Enrollment ID/Roll No" value="<?php echo $userInfo['enrollment_id']; ?>">
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label class="labels">Batch</label>
                                                        <input type="text" class="form-control" placeholder="Your batch (20xx - 20xx)" value="<?php echo $userInfo['batch']; ?>">

                                                    </div>

                                                    <div class="row mt-3">
                                                        <div class="col-md-6">
                                                            <label class="labels">Current Year</label>
                                                            <input type="text" class="form-control editable-field" placeholder="Current year" value="<?php echo $userInfo['current_year']; ?>" name="current_year" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="labels">Current Semester</label>
                                                            <input type="text" class="form-control editable-field" placeholder="Current semester" value="<?php echo $userInfo['current_semester']; ?>" name="current_semester" required>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-3">
                                                        <div class="col-md-6">
                                                            <input type="submit" class="btn btn-primary btn-block" value="Update" name="submit">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </table>
                </form>
            <?php endif; ?>

        <?php endif; ?>

    </div>
</body>

</html>
