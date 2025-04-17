
<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Patient Profile</title>
</head>
<body>

	<?php
		include("../project/home.php");
		include("../project/connection.php");
	?>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left: -28px;">
					<?php
					include("sidenav.php");

						$patient = $_SESSION['patient'];

						$query = "SELECT * from patient where username='$patient'";
						$res = mysqli_query($connect,$query);

						$row = mysqli_fetch_array($res);
					?>
				</div>
				<div class="col-md-10">
					<div class="col-md-12">
						<div class="row">

							<div class="col-md-6" style="margin-top: 20px;">

								<?php

									if(isset($_POST['upload']))
									{
										$img = $_FILES['img']['name'];

										if(empty($img))
										{

										}
										else
										{
											$query = "UPDATE patient set profile='$img' where username='$patient'";

											$result = mysqli_query($connect,$query);

											if($result)
											{
												move_uploaded_file($_FILES['img']['tmp_name'], "img/$img");
											}
										}
									}
								?>

								<h4>My Profile</h4>

								<form method="post" enctype="multipart/form-data">
									<?php
										echo "<img src='img/".$row['profile']."'class='col-md-12' style='height: 250px;'>";
									?>
								
								    <input type="file" name="img" class="form-control my-2">

									<input type="submit" name="upload" value="Update Profile" class="btn btn-info">

								</form>

								<table class="table table-bordered" style="margin-top: 20px;">
									<tr>
										<th colspan="2" class="text-center">My Details</th>
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
										<td>Email</td>
										<td><?php echo $row['email']; ?></td>
									</tr>
									<tr>
										<td>Phone Number</td>
										<td><?php echo $row['phone']; ?></td>
									</tr>
									<tr>
										<td>Country</td>
										<td><?php echo $row['country']; ?></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>