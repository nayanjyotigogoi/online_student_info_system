<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="./admin.css">
</head>

<body>
    <?php
    include "file_upload_sidebar.php"
    ?>
    <div class="content">
        <form action="file_upload_check.php" method="post" enctype="multipart/form-data">

            <div>
                <label>Month</label>
                <input type="text" class="form-control" name="month" placeholder="Current month for paying receipt" required>
            </div>    
            <br>
            <div>
                <label>Name</label>
                <input type="name" class="form-control" name="name" placeholder="Your name here" required>
            </div>    
            <br>

            <div>
                <label>Enrollment Id</label>
                <input type="text" class="form-control" name="enrollment_id" placeholder="Your Enrollment Id" required>
            </div>
            <br>

            <div>
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Your Email" required>
            </div>

            <br>

            <div>
                <label>Phone-no</label>
                <input type="number" class="form-control" name="phone_no" placeholder="Your contact no" required>
            </div>

            <br>

            <label class="form-label" for="customFile">Upload your fee receipt here</label>
            <br>
            <input type="file" class="form-control" id="customFile" name="img_source" required>

            <br>

            <div>
                <label>UPI Transaction Id</label>
                <input type="text" class="form-control" name="transaction_id" placeholder="Your UPI Transaction Id" required>
            </div>
            <br>

            <input type="submit" name="submit" value="Upload file">
        </form>
        
    </div>

</body>

</html>

<?php
 
// $filename =$_FILES["img_source"]["name"];
// $tempname =$_FILES["img_source"]["tmp_name"];

// $folder="receipt_folder/".$filename; 
 
// echo $folder;

// move_uploaded_file($tempname, $folder);

// // echo "<img src='$folder' height='100px' width='100px'> ";

?>
 