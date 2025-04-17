<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>My Invoice</title>
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
					<h5 class="text-center my-2">My Invoice</h5>

					<?php

					$pat = $_SESSION['patient'];

					$query = "SELECT * from patient where username='$pat'";

					$res = mysqli_query($connect,$query);

					$row = mysqli_fetch_array($res);
					$fname = $row['firstname'];

					$query = mysqli_query($connect,"SELECT * from income where patient='$fname'");

					$output="";

						$output .="

							<table class='table table-bordered'>
							<tr>
								<th>Id</th>
								<th>Doctor</th>
								<th>Patient</th>
								<th>Date Discharge</th>
								<th>Amount Paid</th>
								<th>Description</th>
								<th>Action</th>
							</tr>
						";

						if(mysqli_num_rows($query) < 1)
						{
							$output .="
								<tr>
									<td class='text-center' colspan='6'>No Invoice Yet..</td>
								</tr>
							";
						}

						while($row = mysqli_fetch_array($query))
						{
							$output .= "
								<tr>
									<td>".$row['id']."</td>
									<td>".$row['doctor']."</td>
									<td>".$row['patient']."</td>
									<td>".$row['date_discharge']."</td>
									<td>".$row['amount_paid']."</td>
									<td>".$row['description']."</td>
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
</div>
</body>
</html>