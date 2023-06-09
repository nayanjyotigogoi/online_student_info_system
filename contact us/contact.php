 <?php
    // Database connection details
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "miniproject";

    // Create a database connection
    $conn = mysqli_connect($host, $user, $password, $db);

    // Check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Initialize variables
    $name = $email = $message = "";
    $successMessage = "";

    // Process the form submission
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Retrieve form data
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];

        // Insert data into the "contact_us" table
        $sql = "INSERT INTO contact_us (name, email, message) VALUES ('$name', '$email', '$message')";
        if (mysqli_query($conn, $sql)) {
            $successMessage = "Form submitted successfully.";
        } else {
            $successMessage = "Unable to submit form. Please try again.";
        }
    }

    // Close the database connection
    mysqli_close($conn);
    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Contact Us</title>

     <style>
         body {
             font-family: Arial, sans-serif;
             /* background-color: #333; */
             color: #333;
             margin: 0;
             padding: 0;
         }

         /* Header styles */
         #header {
             background-color: #333;
             padding: 20px;
             text-align: center;
         }

         h1 {
             margin: 0;
             font-size: 28px;
             color: #fff;
         }


         nav ul {
             list-style-type: none;
             padding: 0;
             margin: 0;
         }

         nav ul li {
             display: inline;
             margin-right: 10px;
         }

         nav ul li a {
             color: #fff;
             text-decoration: none;
         }

         /* Main content styles */
         .container {
             background-color: #c5ded7;
             max-width: 80%;
             margin: 20px auto;
             padding: 20px;
         }

         h2 {
             margin-top: 0;
             font-size: 24px;
             color: #333;
         }

         p {
             margin-bottom: 20px;
             line-height: 1.5;
         }

         form {
             margin-top: 20px;
         }

         .form-group {
             margin-bottom: 20px;
         }

         label {
             display: block;
             font-weight: bold;
             margin-bottom: 5px;
         }

         input[type="text"],
         input[type="email"],
         textarea {
             width: 90%;
             padding: 10px;
             border: 1px solid #ccc;
             border-radius: 5px;
         }

         textarea {
             height: 150px;
         }

         button[type="submit"] {
             background-color: #333;
             color: #fff;
             padding: 10px 20px;
             border: none;
             border-radius: 5px;
             cursor: pointer;
         }

         /* Footer styles */
         footer {
             background-color: #333;
             color: #fff;
             padding: 20px;
             text-align: center;
             margin-top: 40px;
             ;
         }

         footer p {
             margin: 0;
         }
     </style>


 </head>

 <body>

     <nav>
         <header id="header">
             <h1>Patkai Men's Hostel</h1>
             <nav>
                 <ul>
                     <li><a href="../home.php">HOME</a></li>
                 </ul>
             </nav>
         </header>
     </nav>
     <div class="container">
         <h2>Contact Us</h2>
         <?php if (!empty($successMessage)) : ?>
             <div class="alert alert-success">
                 <?php echo $successMessage; ?>
             </div>
         <?php endif; ?>
         <p>If you have any questions or concerns, please fill out the form below and we will get back to you as soon as possible.</p>

         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
             <div class="form-group">
                 <label for="name">Name</label>
                 <input type="text" id="name" name="name" required>
             </div>
             <div class="form-group">
                 <label for="email">Email</label>
                 <input type="email" id="email" name="email" required>
             </div>
             <div class="form-group">
                 <label for="message">Message</label>
                 <textarea id="message" name="message" rows="5" required></textarea>
             </div>
             <button type="submit">Submit</button>
         </form>
     </div>

     <footer>
         <p>&copy; 2023 Our Hostel. All rights reserved.</p>
     </footer>
 </body>

 </html>