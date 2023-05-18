<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Student Management System</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> 

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- <link rel="stylesheet" type="text/css" href="./signup.css"> -->

</head>
<body>
<section class="content">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <h4>

								<?php

								error_reporting(0);
								session_start();
								session_destroy();

								echo $_SESSION['loginMessage'];


								?>
							</h4>

              <form action="student_data_check.php" method="post">

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example1cg">Enrollment id</label>
                  <input type="text" id="form3Example1cg" class="form-control form-control-lg" placeholder="your enrollment Id" name="enrollment_id" />
                  
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example1cg">Username</label>
                  <input type="text" id="form3Example1cg" class="form-control form-control-lg" placeholder="Username" name="username" />
                  
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example3cg">Your Email</label>
                  <input type="email" id="form3Example3cg" class="form-control form-control-lg" placeholder="you Email" name="email"/>
                  
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example3cg">Phone number</label>
                  <input type="" id="form3Example3cg" class="form-control form-control-lg" placeholder="Your contact number" name="phone"/>
                  
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example4cg">Password</label>
                  <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="password" />
                  
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example4cdg">confirm password</label>
                  <input type="password" id="form3Example4cdg" class="form-control form-control-lg" name="password"/>
                  
                </div>

                <div class="form-check d-flex justify-content-center mb-5">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" name="form-check-input me-2"/>
                  <label class="form-check-label" for="form2Example3g">
                    I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                  </label>
                </div>

                <div class="d-flex justify-content-center">
                    <button class="btn btn-success btn-block btn-lg gradient-custom-4 text-body " name="register">Register</button>
                </div>
                 

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="./login.php"
                    class="fw-bold text-body"><u>Login here</u></a><a href="./home.php" class="fw-bold text-body"><br><u> HOME </u></a></p>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>




 
</body>
</html>