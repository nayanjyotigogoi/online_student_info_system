<?php
    error_reporting(0);
    session_start();
    session_destroy();

    if ($_SESSION['message']){
      $message=$_SESSION['message'];
      echo '<script>alert("'.$message.'")</script>';

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hostel</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <nav>
    <header id="header">
    <h1>Welcome to Our Hostel</h1>

    <nav>
      <ul>
        <li><a href="/STUDENT_MANAGEMENT/login.php">Login</a></li>
        <li><a href="/STUDENT_MANAGEMENT/signup.php">Signup</a></li>
        <li><a href="/STUDENT_MANAGEMENT/admin_login.php">ADMIN</a></li>
        <li><a href="./complaint.php">Contact us</a></li>
        
      </ul>
    </nav>

  </nav>
  </header>

  <div>
    <div class="container">
        <hr>
            <img class="logo" src="./pmh.png" alt="Hostel Image">
            <h2>About Us</h2>
            <article>
                <p>We offer comfortable and affordable accommodation for students who want to pursue their creative passions. Our hostel has spacious rooms, modern facilities, friendly staff and a vibrant community of like-minded people. Whether you are interested in art, music, literature, design, or any other creative field, you will find your home here.</p>

                <p>If you have any questions or concerns, please feel free to contact us at hostel@uoc.edu or call us at +91-1234567890. We are happy to help you!</p>
            </article>
    
        <hr>
    
        <h2>Facilities</h2>
        <ul>
            <li>Free Wi-Fi</li>
            <li>Eletric Neutral Hostel</li>  

        </ul>
        <hr>      
        <hr>
    </div>
  </div>
  <footer>
    <p>&copy; 2023 Our Hostel. All rights reserved.</p>
  </footer>
</body>      
</html>