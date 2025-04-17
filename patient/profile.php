
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
								<!--Code for update password-->

							<div class="col-md-6">

								<?php
								if(isset($_POST['update']))
									{
										$uname = $_POST['uname'];

										if(empty($uname))
										{

										}
										else
										{
											$sql = "UPDATE patient set username='$uname' where username='$patient'";

											$res = mysqli_query($connect,$sql);

											if($res)
											{
												$_SESSION['patient'] = $uname;
											}
										}
									}

								?>

								<form method="post" style="margin-top: 38px;">
									<label id="user">Change Username</label>
									<input type="text" name="uname" class="form-control" autocomplete="off" id="user" placeholder="Enter Username" required>
									<br>
									<input type="submit" name="update" class="btn btn-info" value="Update Username">
								</form>



								<?php

									if(isset($_POST['change']))
									{

										$old_pass = $_POST['old_pass'];
										$new_pass = $_POST['new_pass'];
										$con_pass = $_POST['con_pass'];

										$error = array();

										$q = "SELECT * from patient where username='$patient'";

										$re = mysqli_query($connect,$q);

										$row1 = mysqli_fetch_array($re);

										if(empty($old_pass))
										{
											$error['p'] = "Enter old password";
										}
										elseif($old_pass != $row1['password'])
										{
											echo "<script>alert('Check the Password')</script>";
										}
										elseif($new_pass != $con_pass)
										{
											$error['p'] = "Both password does not match";
										}
										else
										{
											$sql = "UPDATE patient set password='$new_pass' where username='$patient'";
											mysqli_query($connect,$sql);

											echo "<script>alert('Password is Updated.....')</script>";
										}

									}

									if(isset($error['p']))
									{
										$e = $error['p'];

										$show = "<h5 class='text-center alert alert-danger'>$e</h5>";
									}
									else
									{
										$show ="";
									}
								?>

								<h5 class="text-center my-4">Change Password</h5>
								<form method="post" style="margin-top: 55px;">
									<div>
										<?php echo $show; ?>
									</div>

									<div class="form-group">
										<label>Old Password</label>
										<input type="password" name="old_pass" class="form-control" autocomplete="off" required>
									</div>
									
									<div class="form-group">
										<label>New Password</label>
										<input type="password" name="new_pass" class="form-control" required>
									</div>

									<div class="form-group">
										<label>Confirm Password</label>
										<input type="password" name="con_pass" class="form-control" required>
									</div>
									<br>

									<input type="submit" name="change" value="Change Password" class="btn btn-info">

								</form>
							
								<!--Upadte Password-->

								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>