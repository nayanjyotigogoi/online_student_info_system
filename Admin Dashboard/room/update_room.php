<?php
error_reporting(0);
session_start();

if (!isset($_SESSION['username'])) {
	header("location:login.php");
} elseif ($_SESSION['usertype'] == 'student') {
	header("location:login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "miniproject";

$data = mysqli_connect($host, $user, $password, $db);

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	if (isset($_POST['submit'])) {
		$roomNo = $_POST['room_no'];
		$occupant1 = $_POST['occupant_1'];
		$occupant2 = $_POST['occupant_2'];
		$status = $_POST['status'];

		// Update the room information in the "room" table
		$updateQuery = "UPDATE room SET room_no = '$roomNo', occupant_1 = '$occupant1', occupant_2 = '$occupant2', status = '$status' WHERE id = '$id'";
		$result = mysqli_query($data, $updateQuery);

		if ($result) {
			$_SESSION['message'] = "<div class='alert alert-success'>Room information updated successfully.</div>";
			header("adminhome.php"); // Redirect to the page displaying all rooms
			exit();
		} else {
			$_SESSION['message'] = "<div class='alert alert-danger'>Failed to update room information.</div>";
		}
	}

	// Retrieve the current room information based on the provided ID
	$selectQuery = "SELECT * FROM room WHERE id = '$id'";
	$result = mysqli_query($data, $selectQuery);
	$roomInfo = mysqli_fetch_assoc($result);
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Update Room</title>

	<link rel="stylesheet" type="text/css" href="admin.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

	<script>
	// JavaScript function to handle update button click
	function handleUpdate() {
		// Redirect to the desired page
		window.location.href = "adminhome.php";  
	}
</script>

</head>

<body>




	<?php include "room_sidebar.php" ?>

	<div class="content">
		<h1>Update Room</h1>

		<?php
		if ($_SESSION['message']) {
			echo $_SESSION['message'];
		}

		unset($_SESSION['message']); // Clear the session message
		?>

		<form method="POST" action="">
			<div class="mb-3">
				<label for="room_no" class="form-label">Room Number</label>
				<input type="text" class="form-control" id="room_no" name="room_no" value="<?php echo $roomInfo['room_no']; ?>" required>
			</div>
			<div class="mb-3">
				<label for="occupant_1" class="form-label">Occupant A</label>
				<input type="text" class="form-control" id="occupant_1" name="occupant_1" value="<?php echo $roomInfo['occupant_1']; ?>">
			</div>
			<div class="mb-3">
				<label for="occupant_2" class="form-label">Occupant B</label>
				<input type="text" class="form-control" id="occupant_2" name="occupant_2" value="<?php echo $roomInfo['occupant_2']; ?>">
			</div>
			<div class="mb-3">
				<label for="status" class="form-label">Status</label>
				<select class="form-select" id="status" name="status">
					<option value="Occupied" <?php if ($roomInfo['status'] == 'Occupied') echo 'selected'; ?>>Occupied</option>
					<option value="Vacant" <?php if ($roomInfo['status'] == 'Vacant') echo 'selected'; ?>>Vacant</option>
				</select>
			</div>
			<!-- <button type="submit" class="btn btn-primary" name="submit">Update</button> -->
			 

			<button type="submit" class="btn btn-primary" name="submit" onclick="handleUpdate()"> Update</button>

		</form>
	</div>
</body>
 

</html>