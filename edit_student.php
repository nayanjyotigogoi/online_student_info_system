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
        <h4>

								<?php

								error_reporting(0);
								session_start();
								session_destroy();

								echo $_SESSION['loginMessage'];


								?>
		</h4>
        <form action="edit_student_check.php" method="post">
            <table>
                <td>
                    <div>
                        <div>
                            <div class="container rounded bg-white mt-5 mb-5">
                                <div class="row">
                                    <div class="col-md-3 border-right">
                                        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><span
                                                class="font-weight-bold">Username</span><span class="text-black-50">
                                                Your@mail.com.my</span><span> </span>
                                        </div>
                                    </div>
                                    <div class="col-md-5 border-right student-profile-form-box">
                                        <div class="p-3 py-5">

                                            <div class="row mt-2">
                                                <div class="col-md-6"><label class="labels">Name</label><input
                                                        type="text" class="form-control" placeholder="first name"
                                                          name="name"></div>
                                                <div class="col-md-6"><label class="labels">Surname</label>
                                                <input type="text" class="form-control"  placeholder="surname" name="surname">
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <label class="labels">Mobile Number</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="enter phone number"   name="phone">
                                                </div>

                                                <div class="col-md-12">
                                                    <label class="labels">Address</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1"
                                                        rows="3" placeholder="Enter your Address"
                                                        name="address"></textarea>                                                   

                                                    <div class="col-md-12">
                                                        <label class="labels">Pin-code</label><input type="text"
                                                            class="form-control" placeholder="enter address  " value="" name="pin_code">
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <label class="labels">District</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="enter your district" value="" name="district">
                                                    </div>

                                                    <div class="row mt-3">
                                                        
                                                        <div class="col-md-6">
                                                            <label class="labels">State/Region</label>
                                                            <input type="text" class="form-control" value=""
                                                                placeholder="state" name="state">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="labels">Country</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="country" value="" name="country">
                                                        </div>
                                                        
                                                    </div>

                                                </div>


                                                <div class="col-md-12">
                                                    <label class="labels">Email ID</label>
                                                    <input type="text" class="form-control" placeholder="enter email id" value="" name="email">
                                                </div>

                                                <div class="col-md-12">
                                                    <label class="labels">G-suite</label>
                                                    <input type="text" class="form-control" placeholder="enter Gsuite-id" value="" name="gsuite">
                                                </div>

                                                <div class="col-md-12">
                                                    <label class="labels">program</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Write your program that you're enrolled in" value="" name="program">

                                                </div>

                                                <div class="col-md-12">
                                                    <label class="labels">Department</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Your Department" value="" name="department">
                                                </div>


                                                <div class="col-md-12">
                                                    <label class="labels">Enrollment Id</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Your Enrollment id/roll no" value="" name="enrollment_id">
                                                </div>

                                                <div class="col-md-12">
                                                    <label class="labels">Batch</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Your batch (20xx - 20xx)" value="" name="batch">

                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-6">
                                                        <label class="labels">Current Year</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Current Year" value="" name="current_year">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="labels">Current Semester</label>
                                                        <input type="text" class="form-control" value=""
                                                            placeholder="Current Semester" name="current_semester">
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
    </div>
</body>

</html>