<!-- this page is view the student data in admin panel -->
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

if (isset($_POST['search'])) {
    $room_no = $_POST['room_no'];

    // Fetch data from the database based on the room number
    $sql = "SELECT * FROM room WHERE room_no = '$room_no'";
    $result = mysqli_query($data, $sql);
} else {
    $sql = "SELECT * FROM room";
    $result = mysqli_query($data, $sql);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Rooms</title>

    <link rel="stylesheet" type="text/css" href="admin.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>

<body>
    <?php
    include "room_sidebar.php"
    ?>
    <div class="content">

        <h1>Student data</h1>
        <p>Manage room details, including occupancy, availability, and amenities.</p>

        <!-- Search Form -->
        <form method="POST" action="">
            <div class="mb-3">
                <label for="room_no" class="form-label">Enter Room Number:</label>
                <input type="text" class="form-control" id="room_no" name="room_no" placeholder="Room Number" required>
            </div>
            <button type="submit" class="btn btn-primary" name="search">Search</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Room-no</th>
                    <th scope="col">Occupant-A</th>
                    <th scope="col">Occupant-B</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php
                while ($info = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo "{$info['id']}"; ?></th>
                        <th><?php echo "{$info['room_no']}"; ?></th>
                        <td><?php echo "{$info['occupant_1']}"; ?></td>
                        <td><?php echo "{$info['occupant_2']}"; ?></td>
                        <td><?php echo "{$info['status']}"; ?></td>
                        <td>
                            <a href="update_room.php?id=<?php echo $info['id']; ?>">Update</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

    </div>

</body>

</html>
