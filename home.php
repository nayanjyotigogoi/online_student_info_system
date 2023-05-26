<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Patkai | Home Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .header {
      background-color: #333;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    .logo {
      margin-bottom: 10px;
      display: block;
      padding: 10vh 50px 0px 65vh;
    }

    .container1{
      background-color: #E0EBE8;
      max-width: 80%;
      margin: 20px auto;
      padding: 20px;
    }

    .about h3{
      color: #45b29a;
    }

    .login-links {
      display: flex;
      justify-content: flex-end;
      margin-top: 20px;
    }

    .login-links a {
      margin-right: 20px;
      color: #45b29a;
      text-decoration: none;
      padding: 10px;
      border: 1px solid #333;
      border-radius: 5px;
    }

    .login-links a:hover {
      background-color: #333;
      color: #fff;
    }

    .contact-us {
      background-color: lavender;
      text-align: center;
      max-width: 94%;
      margin: 20px auto;
      padding: 20px;
    }



    .footer {
      background-color: #333;
      color: #fff;
      padding: 20px;
      text-align: center;
      margin-top: 40px;
    }

    .credit{
      margin-right: 20px;
      color: #45b29a;
      text-decoration: none;
      padding: 10px;
      border: 1px solid #333;
      border-radius: 5px;
    }

    .image-container {
      background-color: darkgrey;
      /* display: inline-block; */
      text-align: center;
      max-width: 90%;
      margin: 20px auto;
      padding: 20px;
    }

    .image-container img {
      max-width: 30%;
    }
  </style>
</head>

<body>
  <div class="header">
    <h1>Patkai Men's Hostel</h1>
  </div>

  <div class="container1">
    <div class="login-links">
      <nav>
        <a href="/STUDENT_MANAGEMENT/login/login.php">Login</a>
        <a href="/STUDENT_MANAGEMENT/signup/signup.php">Signup</a>
        <a href="/STUDENT_MANAGEMENT/Admin Dashboard/login/admin_login.php">Admin</a>
        <a href="/STUDENT_MANAGEMENT/contact us/contact.php">Contact Us</a>
      </nav>
    </div>
    <img class="logo" src="pmh.png" alt="Hostel Management Logo" width="250">
    <div class="about">
      <div>
        <h3>About Us</h3>
        <article>Patkai Mens's Hostel Welcome's you to the cozy and modern hostel, where comfort meets convenience. We take pride in providing a comfortable and safe environment for all our Student's. Located in the heart of the University, our hostel offers spacious rooms with modern amenities to ensure a pleasant stay. Our friendly and dedicated Admin Body are available 24/7 to assist you with any queries or needs you may have. We strive to create a welcoming atmosphere where Student's from all around the world can connect and make lasting memories. Come and experience our warm hospitality at our hostel, your home away from home.</article>
      </div>

      <div>
        <h3>Facilities</h3>
        <ul>
          <li>Spacious rooms with modern amenities</li>
          <li>24/7 security and surveillance</li>
          <li>Fully equipped gym and fitness center</li>
          <li>High-speed Wi-Fi internet access</li>
          <li>On-site cafeteria and dining facilities</li>
        </ul>
      </div>
      <hr>
    </div>


  </div>

  <div class="image-container">
    <hr>
    <h3>Gallery</h3>
    <img src="pmh1.jpeg" alt="Image 1">
    <img src="pmhstand.jpeg" alt="Image 2">
    <img src="farewell.jpeg" alt="Image 3">
    <hr>
  </div>

  <div class="contact-us">
    <hr>
    <a href="./contact us/contact.php"><h3>CONTACT US</h3> </a> 
    <p>For more information or inquiries, feel free to reach out to us.</p>
    <p>Email: patkaimenshostel2011@gmail.com </p>
    <p>Address: Tezpur, napam.</p>
  </div>

  <div class="footer">
    <p>PATKAI MEN'S HOSTEL.</p>
     
    <a class="credit" href="https://github.com/nayanjyotigogoi">&copy; Nayan</a>
  </div>
</body>

</html>