<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Book Appoinment</title>
</head>
<body>
<?php
	include("../project/home.php");

	include("../project/connection.php");
?>

<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left: -30px;">
					<?php
						include("sidenav.php");
					?>
				</div>

				<div class="col-md-10">
					<h5 class="text-center my-2">Book Appointment</h5>

					<?php
						$pat = $_SESSION['patient'];
						$sel = mysqli_query($connect,"SELECT * from patient where username='$pat'");

						$row = mysqli_fetch_array($sel);

						$firstname = $row['firstname'];
						$lastname = $row['lastname'];
						$gender = $row['gender'];
						$phone = $row['phone'];

						if(isset($_POST['book']))
						{
							$date = $_POST['date'];
							$sym = $_POST['sym'];

							if(empty($sym))
							{

							}
							else
							{
								$query = "INSERT into appointment(firstname,lastname,gender,phone,appointment_date,symptoms,status,date_booked) values('$firstname','$lastname','$gender','$phone','$date','$sym','Pendding',NOW())";

								$res = mysqli_query($connect,$query);

								if($res)
								{
									echo "<script>alert('You have booked an appointment.')</script>";
								}

							}
						}
					?>

					<div class="col-md-12">
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6 jumbotron">
								<form method="post">
									<label>Appointment Date</label>
									<input type="date" name="date" class="form-control">

									<label>Symptoms</label>
									<input type="text" name="sym" class="form-control" placeholder="Enter Symptoms">
									<br>
									<input type="submit" name="book" value="Book Appointment" class="btn btn-info">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>