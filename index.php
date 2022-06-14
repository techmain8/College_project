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
	Hello, wellcome user   <?php echo $user_data['user_name']; ?>  loged in @  <?php echo @ $user_data['date']; ?>
	<form action="" method="POST" enctype="multipart/form-data">
		<label for="">Title of ur project</label>
        <input type="text" name="title">
		<label for="">File upload</label>
		<input type="File" name="file">
		<input type="submit" name="submit">
	</form>
</body>
</html>