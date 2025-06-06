
<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
</head>
<body>

<?php
	include("../project/home.php");
?>

<div class="container-fluid">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-2" style="margin-left: -28px;">
				<?php
					include("side_navBar.php");
					include("../project/connection.php");
				?>
			</div>
			<div class="col-md-10">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
							<h5 class="text-center">All Admin</h5>

							<?php
								$ad = $_SESSION['hospital_admin'];
								$sql = "SELECT * from hospital_admin where username !='$ad'";
								$res = mysqli_query($connect,$sql);

								$output = "
									<table class='table table-bordered'>
									  <tr>
										<th>ID</th>
										<th>Username</th>
										<th style='width: 10%;'>Action</th>
									 </tr>
								";

								if(mysqli_num_rows($res) < 1)
								{
									$output .= "<tr><td colspan='3' class='text-center'>No New Admin</td></tr>";
								}

								while($row = mysqli_fetch_array($res))
								{
									$id = $row['id'];
									$username = $row['username'];

									$output .= "
										<tr>
											<td>$id</td>
											<td>$username</td>
											<td>
												<a href='add_admin.php?id=$id'><button id='$id' class='btn btn-danger remove'>Remove</button></a>
											</td>
									";
								}

								$output .= "
										</tr>
								</table>
								";

								echo $output;


								if(isset($_GET['id']))
								{
									$id = $_GET['id'];

									$sql = "DELETE from hospital_admin where id='$id'";
									mysqli_query($connect,$sql);
								}

							?>

						</div>
						<div class="col-md-6">
							<!--Adding Admin to the database-->
							<?php
							$show="";
							if($_SERVER["REQUEST_METHOD"] == "POST")
							{
								if(isset($_POST['add']))
								{
									$uname = $_POST['uname'];
									$pass = $_POST['pass'];
									$image = $_FILES['img']['name'];

									$error = array();

									if(empty($uname))
									{
										$error['u'] = "Enter Username";
									}
									elseif(empty($pass)) 
									{
										$error['u'] = "Enter Password";
									}
									elseif(empty($image))
									{
										$error['u'] = "Add Admin Profile Picture";
									}

									if(count($error) == 0)
									{
										$sql = "INSERT into hospital_admin(username,password,profile) values('$uname','$pass','$image')";

										$result = mysqli_query($connect,$sql);

										if($result)
										{
											move_uploaded_file($_FILES['img']['tmp_name'], "img/$image");
										}
										else
										{

										}
									}

								}

								if(isset($error['u']))
								{
									$er = $error['u'];

									$show = "<h5 class='text-center alert alert-danger' style='font-size:15px;'>$er</h5>";
								}
								else
								{
									$show = "";
								}
							}

							?>

							<h5 class="text-center">Add Admin</h5>

							<form method="post" enctype="multipart/form-data">

								<div>
									<?php echo $show; ?>
								</div>

								<div class="from-group">
									<label for="user">Username</label>
									<input type="text" name="uname" id="user" class="form-control" autocomplete="off">
								</div>
								<div class="from-group">
									<label for="secu">Password</label>
									<input type="Password" name="pass" id="secu" class="form-control" autocomplete="off">
								</div>

								<div class="from-group">
									<label>Add Admin Image</label>
									<input type="file" name="img" class="form-control">
								</div><br>
								<input type="submit" name="add" value="Add New Admin" class="btn btn-success">

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