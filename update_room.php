<?php
$id= $_POST['id'];
$host = "localhost";
$user = "root";
$password = "";
$db = "miniproject";

$data = mysqli_connect($host, $user, $password, $db);

$sql = "SELECT *FROM room";

$result = mysqli_query($data, $sql);
$info =mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Update Room</title>

	<link rel="stylesheet" type="text/css" href="admin.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

	<?php

	?>

</head>

<body>

	<?php
	include "Update_room_sidebar.php";
	?>

	<div class="content">

		<h1>Update Room details</h1>

		<div>
			<form action="update_room_check.php" method="post">
				<div class="form-group row">
					<label for="inputUsername" class="col-sm-1 col-form-label">Room-no</label>
					<div class="col-sm-10">
						<input type="text" value="<?php echo $info['room_no'];
						?>" class="form-control" id="inputroom_no" placeholder="Room no" name="room_no">
					</div>
				</div>
				<br>
				<div class="form-group row">
					<label for="inputPassword" class="col-sm-1 col-form-label">occupant A</label>
					<div class="col-sm-10">
						<input type="text" value="<?php echo $info['occupant_1'];
						?>" class="form-control" id="inputname" placeholder="Occupant-A name" name="occupant_1">
					</div>
				</div>
				<br>
				<div class="form-group row">
					<label for="inputPhone" class="col-sm-1 col-form-label">Occupant-B</label>
					<div class="col-sm-10">
						<input type="text" value="<?php echo $info['occupant_2'];
						?>" class="form-control" id="inputname" placeholder="Occupant-B name" name="occupant_2">
					</div>
				</div>
				<br>
				<div class="form-group row">
					<label for="Email" class="col-sm-1 col-form-label">Status</label>
					<div class="col-sm-10">
						<input type="text" value="<?php echo $info['status'];
						?>" class="form-control" id="inputstatus" placeholder="Status" name="status">
					</div>
				</div>
				<br>
				<button type="submit" class="btn btn-secondary" name="update">Update</button>

			</form>

		</div>

	</div>



</body>

</html>