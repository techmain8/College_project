<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
	
	if (isset($_POST["submit"]))
	{

		$title = $_POST["title"];

		$pname = rand(10,10000)."-".$_FILES["file"]["name"];

		$tname = $_FILES["file"]["name"];

		$uploads_dir ='/images';

		   move_uploaded_file($tname,$uploads_dir.'/'.$pname);


		   $sql = "INSERT into fileup(title,image) VALUES('$title','$pname')";
			mysqli_query($con,$sql);
			header("Location: view.php");

		   if(mysqli_query($con,$sql)){

			echo "File Successfully Uploaded";
		   }
		   else{
			echo "Error";
		   }
		   
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" href="home-style.css">
</head>
<body>
	<div class="title">
		<button>
		<a href="logout.php" style="color:black;">Logout</a></button>
		<h1>Thesis Tracking System</h1>
	</div>
     	<label for=""> <h1> Hello, wellcome user </h1></label> 
		<?php echo $user_data['user_name']; ?>  loged in @  
		<?php echo @ $user_data['date']; ?>
	<div class="wrapper">
		<div class="title-text">
			<div class="form-container">
			    <div class="form-inner">
				    <form action="" method="POST" enctype="multipart/form-data">
					<label for="">Name Of Project</label>
        			<input type="text" name="title"><br><br>
					<label for="">File upload</label>
					<input type="File" name="file"><br><br>
					<input type="submit" class="btn btn-primary" name="submit" value="Submit"> <br><br>
					<button ><a href="view.php" style="color:black;">Uploaded_Files</a></button>
					</form>
				</div>

			</div>

		</div>

	</div>
	
</body>
</html>