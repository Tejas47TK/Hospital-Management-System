

<?php

	include("project/connection.php");

	if(isset($_POST['apply']))
	{
		$firstname = $_POST['fname'];
		$surname = $_POST['sname'];
		$username = $_POST['uname'];
		$email = $_POST['email'];
		$gender = $_POST['mygender'];
		$phone = $_POST['phone'];
		$country = $_POST['country'];
		$password = $_POST['pass'];
		$confirm_password = $_POST['con_pass'];

		$error = array();

		if($confirm_password != $password)
		{
			$error['apply'] = "Both Password do not match";
		}

		//inserting value to the database
		if(count($error) == 0)
		{
			$sql = "INSERT into doctors(firstname,lastname,username,email,gender,phone,country,password,salary, data_reg,status,profile) values('$firstname','$surname','$username','$email','$gender','$phone','$country','$password','0',NOW(),'Pendding','doctor.jpg')";

			$result = mysqli_query($connect,$sql);

			if($result)
			{
				echo "<script>alert('You have Successfylly Appled')</script>";

				header("Location: doctor_login.php");
			}
			else
			{
				echo "<script>alert('Failed')</script>";
			}


		}
	}

	if(isset($error))
	{
		$s = $error['apply'];

		$show = "<h5 class='text-center alert alert-danger'>$s</h5>";
	}
	else
	{
		$show ="";
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Apply Now!!!</title>
</head>
<body style="background-image: url(images/hospital.jpg); background-size: cover; background-repeat: no-repeat;">

<?php
include("project/home.php");
?>

<div class="container-fluid">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-3"></div>

			<div class="col-md-6 my-3 jumbotron">
				<h5 class="text-center">Apply Now!!!</h5>

				<div>
					<?php echo $show; ?>
				</div>

				<form method="post">
					<div class="form-group">
						<label>Firstname</label>
						<input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname" required>
					</div>
					<div class="form-group">
						<label>Lastname</label>
						<input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter Lastname" required>
					</div>
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" class="form-control" autocomplete="off" placeholder="Enter Email Address" required>
					</div>

					<div class="form-group">
						<label>Select Gender:  </label>
						<label for="m">Male</label>
						<input type="radio" name="mygender" id="m" value="male" required>
						<label for="f">Female</label>
						<input type="radio" name="mygender" id="f" value="female" required>
					</div>

					<div class="form-group">
						<label>Phone No</label>
						<input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number" required>
					</div>

					<div class="form-group">
						<label>Select Country:</label>
						<select name="country" class="form-control" required>
							<option value="">Select Country</option>
							<option value="India">India</option>
							<option value="America">America</option>
							<option value="Russia">Russia</option>
						</select>
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password" required>
					</div>
					<div class="form-group">
						<label>Confirm Password</label>
						<input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter Confirm Password" required>
					</div>

					<input type="submit" name="apply" value="Apply Now" class="btn btn-success"><br>
					<p>I already have an account <a href="doctor_login.php">Click here</a></p>
				</form>

			</div>

			<div class="col-md-3"></div>
		</div>
	</div>
</div>

</body>
</html>