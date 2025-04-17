<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Check Patient Appointment</title>
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
					<h5 class="text-center my-2">Total Appointment</h5>

					<?php

					if(isset($_GET['id']))
					{
						$id = $_GET['id'];

						$query = "SELECT * from appointment where id='$id'";
						$res = mysqli_query($connect,$query);

						$row = mysqli_fetch_array($res);
					}

				    ?>

					<div class="col-md-12">
				    	<div class="row">
				    		<div class="col-md-6">
				    			
				    			<table class="table table-bordered" style="margin-top: 20px;">
									<tr>
										<th colspan="2" class="text-center">Appointment Details</th>
									</tr>

									<tr>
										<td>Firstname</td>
										<td><?php echo $row['firstname']; ?></td>
									</tr>
									<tr>
										<td>Lastname</td>
										<td><?php echo $row['lastname']; ?></td>
									</tr>
									<tr>
										<td>Gender</td>
										<td><?php echo $row['gender']; ?></td>
									</tr>
									<tr>
										<td>Phone No.</td>
										<td><?php echo $row['phone']; ?></td>
									</tr>
									<tr>
										<td>Appointment Date</td>
										<td><?php echo $row['appointment_date']; ?></td>
									</tr>
									<tr>
										<td>Symtoms</td>
										<td><?php echo $row['symptoms']; ?></td>
									</tr>
								</table>
							</div>
							<div class="col-md-6">
								<h5 class="text-center my-1">Invoice</h5>

								<?php
									
									if(isset($_POST['send']))
									{
										$fee = $_POST['fee'];
										$des = $_POST['des'];

											$doc = $_SESSION['doctor'];

											$fname = $row['firstname'];

											$query = "INSERT into income(doctor,patient,date_discharge,amount_paid,description) values('$doc','$fname',NOW(),'$fee','$des')";

											$res = mysqli_query($connect,$query);

											if($res)
											{
												echo "<script>alert('You have send Invoice')</script>";
											}

											mysqli_query($connect, "UPDATE appointment set status='Discharge' where id='$id'");
										
									}
				                ?>

								<form method="post">
									<label>Fee</label>
									<input type="number" name="fee" class="form-control" placeholder="Enter patient Fee" required>

									<label>Description</label>
									<input type="text" name="des" class="form-control" placeholder="Enter Description" required>

									<input type="submit" name="send" value="Send" class="btn btn-info my-2">
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