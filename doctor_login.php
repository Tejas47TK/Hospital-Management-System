
<?php

session_start();

include("project/connection.php");

if(isset($_POST['login']))
{
	$uname = $_POST['uname'];
	$password = $_POST['pass'];

	$error = array();

	$q = "SELECT * from doctors where username='$uname' and password='$password'";
	$qq = mysqli_query($connect,$q);

	$row = mysqli_fetch_array($qq);

	if($row['status'] == "Pending")
	{
		$error['login'] = "Please Wait For the admin to confirm";
	}
	elseif($row['status'] == "Rejected")
	{
		$error['login'] = "Try again Later";
	}

	if(count($error) == 0)
	{
		$sql = "SELECT * from doctors where username='$uname' and password='$password'";

		$res = mysqli_query($connect,$sql);

		if(mysqli_num_rows($res))
		{
			echo "<script>alert('done')</script>";
			$_SESSION['doctor'] = $uname;

			header("Location:doctor/index.php");
		}
		else
		{
			echo "<script>alert('Invalid Account')</script>";
		}
	}
}

if(isset($error['login']))
{
	$l = $error['login'];

	$show = "<h5 class='text-center alert alert-danger'>$l</h5>";
}
else
{
	$show ="";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Doctor Login</title>

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
				<h5 class="text-center my-2">Doctors Login</h5>

				<div>
					<?php echo $show; ?>
				</div>

				<form method="post">
					<div class="form-group">
  						<label for="user">Username</label>
  						<input type="text" name="uname" id="user" class="form-control" autocomplete="off" placeholder="Enter Username" required>
  					</div>
  					<div class="form-group">
  						<label for="secur">Password</label>
  						<input type="password" name="pass" id="secur" class="form-control" autocomplete="off" placeholder="Enter Password" required>
  					</div>

  					<input type="submit" name="login" value="Login" class="btn btn-success">

  					<p>I dont have an account <a href="apply.php" style="color:red;">Apply Now!!!</a></p>
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