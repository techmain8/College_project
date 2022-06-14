<?php 
session_start();

	include("connection.php");
	include("functions.php");
    $firstname = null;
	$lastname = null;


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$firstname = $_POST['firstname'];
	    $lastname = $_POST['lastname'];
	    $gender = $_POST['gender'];
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$number = $_POST['number'];

		if(!empty($user_name) && !empty($password))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,firstname,lastname,gender,user_name,password,number) 
			values ('$user_id','$firstname','$lastname','$gender','$user_name','$password','$number')";
		
			mysqli_query($con,$query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css" />
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>
	<div class="container">
       <div class="row col-md-6 col-md-offset-3">
           <div class="panel panel-primary">
              <div class="panel-heading text-center">
                  <h1>Registration Form</h1>
              </div>
              <div class="panel-body">
                 <form action="signup.php" method="POST">
                    <div class="form-group">
                       <label for="firstname">First Name</label>
                       <input id="text" type="text" class="form-control"  name="firstname"/>
                    </div>
                    <div class="form-group">
                       <label for="lastname">Last Name</label>
                       <input id="text" type="text" class="form-control" name="lastname"/>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <div>
                           <label for="male" class="radio-inline">
					       <input type="radio" name="gender" value="male" id="male"/>Male</label>
                           <label for="female" class="radio-inline">
					       <input type="radio" name="gender" value="female" id="female"/>Female</label>
                           <label for="others" class="radio-inline">
					       <input type="radio" name="gender" value="others" id="others"/>Others</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input   id="text" type="text"  class="form-control" name="user_name"/>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="text" type="password"  class="form-control" name="password"/>
                    </div>
                    <div class="form-group">
                        <label for="number">Phone Number</label>
                        <input type="number" class="form-control" id="number" name="number"/>
                    </div>
					<input  class="btn btn-primary" id="button" type="submit" value="Signup"/> 
                    <input type="button" class="btn btn-primary" value="Login Page"  onclick="document.location='login.php'"><br><br>
                </form>
              </div>
           </div>
       </div>
    </div>
</body>
</html>