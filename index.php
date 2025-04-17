
<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>

  <link rel="stylesheet" type="text/css" href="css/mystyle.css">
  <style>
    #myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  top:0%;
  min-width: 100%;
  min-height: 100%;
}

    </style>
</head>
<body>

<?php
  include("project/home.php");
?>

  <div style="margin-top: 50px;"></div>

  <div class="container">
  	<div class="col-md-12">
  		<div class="row">

  			<div class="col-md-4 mx-1 shadow">
  				<img src="images/info.jpg" style="width: 100%; height: 252px;">

          <h5 class="text-center" style="color:white;">Click on the button for more information</h5>

          <a href="#">
            <button class="btn btn-success my-3" style="margin-left: 34%;">More Info</button>
          </a> 

  			</div>

  			<div class="col-md-4 mx-1 shadow">
  				<img src="images/patient.jpg" style="width: 100%;"> 

          <h5 class="text-center" style="color:white;">Creating Account so that we can take good care of you.</h5>

          <a href="patient_account.php">
            <button class="btn btn-success my-3" style="margin-left: 30%;">Create Account!!..</button>
          </a>  

  			</div>

  			<div class="col-md-3 mx-1 shadow">
  				<img src="images/doctor.jpg" style="width: 100%;">

          <h5 class="text-center" style="color:white;">We are employing for doctors</h5>

          <a href="apply.php">
            <button class="btn btn-success my-3" style="margin-left: 30%;">Apply Now!!..</button>
          </a> 

  			</div>

  		</div>
  	</div>
  </div>

  <video autoplay muted loop id="myVideo" class="backimg">
  <source src="health.mp4" type="video/mp4">
  </video>

</body>
</html>