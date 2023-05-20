<?php
session_start();
error_reporting(0);

$host = "localhost";
$user = "root";
$password = "";
$db = "miniproject";
$data = mysqli_connect($host, $user, $password, $db);

if (isset($_POST['submit'])) {
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($newPassword === $confirmPassword) {
        $userId = $_SESSION['reset_user_id'];
        $enrollmentId = $_SESSION['reset_enrollment_id'];

        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $sql = "UPDATE registration SET password = '$hashedPassword' WHERE id = '$userId' AND enrollment_id = '$enrollmentId'";
        $result = mysqli_query($data, $sql);

        if ($result) {
            session_destroy();
            $successMessage = "Password reset successful. Please <a href='login.php'>login</a> with your new password.";
        } else {
            $errorMessage = "Failed to reset password. Please try again.";
        }
    } else {
        $errorMessage = "Passwords do not match. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reset Password</title>
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
        
        input[type="password"] {
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
        
        .success {
            color: green;
            margin-top: 10px;
        }
        
        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <h1>Reset Password</h1>

    <?php if (isset($successMessage)) : ?>
        <p class="success"><?php echo $successMessage; ?></p>
    <?php elseif (isset($errorMessage)) : ?>
        <p class="error"><?php echo $errorMessage; ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password" required><br>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br>

        <button type="submit" name="submit">Reset Password</button>
    </form>
</body>
</html>
