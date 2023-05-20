<?php



//error handling
error_reporting(0);
session_start();


$host = "localhost";
$user = "root";
$password = "";
$db = "miniproject";
$data = mysqli_connect($host, $user, $password, $db);


if ($data === false) {
    die("connection error");
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Prepare email content
        $to = 'hostel@uoc.edu'; // Change this to your desired email address
        $subject = 'Contact Form Submission';
        $body = "Name: $name\nEmail: $email\nMessage: $message";
        $headers = "From: $email";

        // Send email
        if (mail($to, $subject, $body, $headers)) {
            // Email sent successfully
            echo 'Thank you for contacting us. We will get back to you soon.';
        } else {
            // Failed to send email
            echo 'Oops! An error occurred. Please try again later.';
        }
    } else {
        // Redirect to the contact page if accessed directly without form submission
        header('Location: contact.php');
        exit;
    }
}
