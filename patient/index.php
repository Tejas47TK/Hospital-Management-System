<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Patient Dashboard</title>
</head>
<body>

<?php
	include("../project/home.php");

	include("../project/connection.php");
?>

<div class="container-fluid">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-2" style="margin-left: -29px">
				<?php
					include("sidenav.php");    
				?>
			</div>
			<div class="col-md-10">
				<div class="container-fluid">
					<h5>Patient Dashboard</h5>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-3 my-2 bg-info mx-2" style="height: 150px;">
								<div class="col-md-12">
									<div class="row">

										<div class="col-md-8">
											<h5 class="text-white my-4">My Profile</h5>
										</div>

										<div class="col-md-4">
											<a href="profile.php"><i class="fa fa-user-circle fa-3x my-4" style="color: white;"></i></a>
										</div>

									</div>
								</div>
							</div>

							<div class="col-md-3 my-2 bg-warning mx-2" style="height: 150px;">
								<div class="col-md-12">
									<div class="row">

										<div class="col-md-8">
											<h5 class="text-white my-4">Book Appointment</h5>
										</div>

										<div class="col-md-4">
											<a href="appointment.php"><i class="fa fa-calendar fa-3x my-4" style="color: white;"></i></a>
										</div>

									</div>
								</div>
							</div>

							<div class="col-md-3 my-2 bg-success mx-2" style="height: 150px;">
								<div class="col-md-12">
									<div class="row">

										<div class="col-md-8">
											<h5 class="text-white my-4">My Incoice</h5>
										</div>

										<div class="col-md-4">
											<a href="invoice.php"><i class="fas fa fa-file-invoice-dollar fa-3x my-4" style="color: white;"></i></a>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>

					<?php

						if(isset($_POST['send']))
						{
							$title = $_POST['send'];
							$message = $_POST['message'];

							$user = $_SESSION['patient'];

							$query = "INSERT into report( title,message,username,date_send) values('$title','$message','$user',NOW())";

							$res = mysqli_query($connect,$query);

							if($res)
							{
								echo "<script>alert('You have sent Your Report')</script>";
							}
						}
					?>

					<div class="col-md-12">
						<div class="row">
							<div class="col-md-4"></div>
							<div class="col-md-8 jumbotron bg-info my-5">
								<h5 class="text-center">Send A Report</h5>
								<form method="post">
									<label>Title</label>
									<input type="text" name="title" autocomplete="off" class="form-control" placeholder="Enter Title of report" required>

									<label>Message</label>
									<input type="text" name="message" autocomplete="off" class="form-control" placeholder="Enter Message" required>

									<input type="submit" name="send" value="Send Report" class="btn btn-success my-2">
								</form>
							</div>
							<div class="col-md-3"></div>
						</div>
					</div>


				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>