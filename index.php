<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
</head>
<body>

	<a href="logout.php">Logout</a>
	<h1>Thesis Tracking System</h1>
    <br>
	Hello, <?php echo $user_data['user_name']; ?>
</body>
</html>