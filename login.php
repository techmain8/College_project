<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		


		if(!empty($user_name) && !empty($password))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login page</title>
	<link rel="stylesheet" href="style.css">
</head>
  <body>

	<style type="text/css" >
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}
	#header{
		text-align: center;
		justify-content: flex-start;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}
	 
	#form-inner{
		display: flex;
		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	#box{
		display: flex;
		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>
	 <div class="header">THESIS TRACKING SYSTEM </div>
       <div class="wrapper">
	      <div class="title-login">Login Form</div>
            <div class="title-text">
              <div class="form-container">
                 <div class="form-inner">
                    <form action="" class="login" method="post">
                       <div class="field">
                          <input id="text" type="text"  placeholder="Email Address" name="user_name" required>
                       </div>
                       <div class="field">
                          <input id="text" type="password" placeholder="Password" name="password" required>
                       </div>
                       <div class="pass-link">
                          <a href="#">Forgot password?</a>
                       </div>
                       <div class="field btn">
                          <div class="btn-layer"></div>
                          <input type="submit" value="Login">
                       </div>
                       <div class="signup-link">
                        Not a member? <a href="signup.php">Signup now</a>
                       </div>  
					</form>  
                 </div>
              </div>
            </div>	
	   </div>
	   <div class="footer"> <a href="all.html"> PROJECT DETAILS </a>
       </div>	
   </body>
</html>