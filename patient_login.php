<?php

session_start();

include("project/connection.php");

if(isset($_POST['login']))
{
	$uname = $_POST['uname'];
	$pass = $_POST['pass'];

	if(empty($uname))
	{
		echo "<script>alert('Enter Username')</script>";
	}
	elseif (empty($pass)) 
	{
		echo "<script>alert('Enter Password')</script>";
	}
	else
	{
		$sql = "SELECT * from patient where username='$uname' and password='$pass'";

		$res = mysqli_query($connect,$sql);

		if(mysqli_num_rows($res) == 1)
		{
			header("Location: patient/index.php");

			$_SESSION['patient'] = $uname;
		}
		else
		{
			echo "<script>alert('Invalid Account')</script>";
		}
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login Here</title>

	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
	<style>
    #myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  top:0%;
  min-width: 100%;
  min-height: 100%;
}

    </style>
</head>
<body>

<?php
	include("project/home.php");
?>

<div class="container-fluid">
	<div class="col-md-12">
		<div class="row" style="margin-top: 55px;">
			<div class="col-md-3"></div>
			
			<div class="col-md-6 jumbotron my-3" style="background-color: #a1c6ea9c;">
				<h5 class="text-center my-2">Patient Login</h5>

				<form method="post">
					<div class="form-group">
  						<label for="user">Username</label>
  						<input type="text" name="uname" id="user" class="form-control" autocomplete="off" placeholder="Enter Username" required>
  					</div>
  					<div class="form-group">
  						<label for="secur">Password</label>
  						<input type="password" name="pass" id="secur" class="form-control" autocomplete="off" placeholder="Enter Password" required>
  					</div>

  					<input type="submit" name="login" value="Login" class="btn btn-info my-3">

  					<p>I dont have an account <a href="patient_account.php" style="color:red;">Click here...</a></p>
				</form>	
			</div>

			<div class="col-md-3"></div>
		</div>
	</div>	
</div>

<video autoplay muted loop id="myVideo" class="backimg">
  <source src="health.mp4" type="video/mp4">
</video>
</body>
</html>