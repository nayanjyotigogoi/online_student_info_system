<?php
session_start();
error_reporting(0);

$host = "localhost";
$user = "root";
$password = "";
$db = "miniproject";
$data = mysqli_connect($host, $user, $password, $db);

if (isset($_POST['submit'])) {
    $enrollmentId = $_POST['enrollment_id'];
    // $email = $_POST['email'];

    $sql = "SELECT * FROM registration WHERE enrollment_id = '$enrollmentId'";
    $result = mysqli_query($data, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $userInfo = mysqli_fetch_assoc($result);

        $_SESSION['reset_user_id'] = $userInfo['id'];
        $_SESSION['reset_enrollment_id'] = $userInfo['enrollment_id'];
        header("Location: reset_password.php");
        exit();
    } else {
        $error = "Invalid enrollment ID.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Forgot Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        
        h1 {
            text-align: center;
        }
        
        form {
            width: 300px;
            margin: 0 auto;
        }
        
        label {
            display: block;
            margin-bottom: 10px;
        }
        
        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        button:hover {
            background-color: #45a049;
        }
        
        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <h1>Forgot Password</h1>

    <?php if (isset($error)) : ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="enrollment_id">Enrollment ID:</label>
        <input type="text" id="enrollment_id" name="enrollment_id" required><br>

        <!-- <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br> -->

        <button type="submit" name="submit">Reset Password</button>
    </form>
</body>
</html>
