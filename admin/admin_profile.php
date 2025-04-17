
<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Profile</title>
</head>
<body>

	<?php
		include("../project/home.php");
		include("../project/connection.php");

		$ad = $_SESSION['hospital_admin'];

		$sql = "SELECT * from hospital_admin where username='$ad'";
		$res = mysqli_query($connect,$sql);

		while($row = mysqli_fetch_array($res))
		{
			$username = $row['username'];
			$profiles = $row['profile'];
		}
	?>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left: -28px;">
					<?php
					include("side_navBar.php");
					?>
				</div>
				<div class="col-md-10">
					<div class="col-md-12">
						<div class="row">

							<div class="col-md-6" style="margin-top: 20px;">
								<h4><?php echo $username; ?> Profile</h4>

								<?php

									if(isset($_POST['update']))
									{
										$profile = $_FILES['profile']['name'];

										if(empty($profile))
										{

										}
										else
										{
											$sql = "UPDATE hospital_admin set profile='$profile' where username='$ad'";

											$result = mysqli_query($connect,$sql);

											if($result)
											{
												move_uploaded_file($_FILES['profile']['tmp_name'], "img/$profile");
											}
										}
									}
								?>

								<form method="post" enctype="multipart/form-data">
									<?php
										echo "<img src='img/$profiles' class='col-md-12' style='height: 250px;'>";
									?>

									<br><br>

									<div class="form-group">
										<label>Update Your Profile</label>
										<input type="file" name="profile" class="form-control">
									</div><br>

									<input type="submit" name="update" value="UPDATE" class="btn btn-success">

								</form>
							</div>

							<div class="col-md-6">

								<?php

									if(isset($_POST['change']))
									{
										$uname = $_POST['uname'];

										if(empty($uname))
										{

										}
										else
										{
											$sql = "UPDATE hospital_admin set username='$uname' where username='$ad'";

											$res = mysqli_query($connect,$sql);

											if($res)
											{
												$_SESSION['hospital_admin'] = $uname;
											}
										}
									}
								?>

								<form method="post" style="margin-top: 38px;">
									<label id="user">Change Username</label>
									<input type="text" name="uname" class="form-control" autocomplete="off" id="user">
									<br>
									<input type="submit" name="change" class="btn btn-success" value="Change">
								</form>

								<!--Code for update password-->

								<?php

									if(isset($_POST['update_pass']))
									{

										$old_pass = $_POST['old_pass'];
										$new_pass = $_POST['new_pass'];
										$con_pass = $_POST['con_pass'];

										$error = array();

										$old = mysqli_query($connect,"SELECT * from hospital_admin where username='$ad'");
										$row = mysqli_fetch_array($old);
										$pass = $row['password'];

										if(empty($old_pass))
										{
											$error['p'] = "Enter old password";
										}
										elseif(empty($new_pass))
										{
											$error['p'] = "Enter New password";
										}
										elseif(empty($con_pass))
										{
											$error['p'] = "Confirm password";
										}
										elseif($old_pass != $pass)
										{
											$error['p'] = "Invalid old password";
										}
										elseif($new_pass != $con_pass)
										{
											$error['p'] = "Both password does not match";
										}

										//if no error massage is set

										if(count($error) == 0)
										{
											$sql = "UPDATE hospital_admin set password='$new_pass' where username='$ad'";
											mysqli_query($connect,$sql);
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

								<form method="post" style="margin-top: 55px;">
									<h5 class="text-center my-4">Change Password</h5>

									<div>
										<?php echo $show; ?>
									</div>

									<div class="form-group">
										<label>Old Password</label>
										<input type="password" name="old_pass" class="form-control" autocomplete="off">
									</div>
									
									<div class="form-group">
										<label>New Password</label>
										<input type="password" name="new_pass" class="form-control">
									</div>

									<div class="form-group">
										<label>Confirm Password</label>
										<input type="password" name="con_pass" class="form-control">
									</div>
									<br>

									<input type="submit" name="update_pass" value="Update Password" class="btn btn-info">

								</form>
									
								</form>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>