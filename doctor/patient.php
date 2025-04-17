<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Total Doctors</title>
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
					<h5 class="text-center" style="margin-bottom: 25px; margin-top: 15px;">Total Patient</h5>
					<?php

						$sql ="SELECT * from patient";

						$res = mysqli_query($connect,$sql);

						$output="";

						$output .="

							<table class='table table-bordered'>
							<tr>
								<th>Id</th>
								<th>Firstname</th>
								<th>Lastname</th>
								<th>Username</th>
								<th>Email</th>
								<th>Gender</th>
								<th>Phone</th>
								<th>Country</th>
								<th>Date Registered</th>
								<th>Action</th>
							</tr>
						";

						if(mysqli_num_rows($res) < 1)
						{
							$output .="
								<tr>
									<td colspan='8'>No Patient Yet..</td>
								</tr>
							";
						}

						while($row = mysqli_fetch_array($res))
						{
							$output .= "
								<tr>
									<td>".$row['id']."</td>
									<td>".$row['firstname']."</td>
									<td>".$row['lastname']."</td>
									<td>".$row['username']."</td>
									<td>".$row['email']."</td>
									<td>".$row['gender']."</td>
									<td>".$row['phone']."</td>
									<td>".$row['country']."</td>
									<td>".$row['date_reg']."</td>
									<td>
									   <a href='view.php?id=".$row['id']."'>
									   		<button class='btn btn-info'>View</button>
									   </a>
									</td>
							";
						}

						$output .="
							</tr>
							</table>
						";

						echo $output;

					?>
				</div>
			</div>
		</div>
	</div>

</body>
</html>