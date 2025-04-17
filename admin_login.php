
<?php
  
  session_start();

  include("project/connection.php");

  if(isset($_POST['login']))
  {
    $username = $_POST['uname'];
    $password = $_POST['pass'];

    $error = array();

    if(empty($username))
    {
      $error['hospital_admin'] = "Enter Username";
    }
    elseif(empty($password))
    {
      $error['hospital_admin'] = "Enter Password";
    }

    if(count($error) == 0)
    {
      $sql = "SELECT * FROM hospital_admin WHERE username='$username' and password='$password'";

      $result = mysqli_query($connect,$sql);

      if(mysqli_num_rows($result) == 1)
      {
        echo "<script>alert('You have login As an admin...')</script>";

        $_SESSION['hospital_admin'] = $username;

        header("Location:admin/index.php");
        exit();
      }
      else
      {
        echo "<script>alert('Invalid Username or password')</script>";
      }
    }
  }

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login Here</title>

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

  <div style="margin-top: 7%;"></div>

  <div class="container">
  	<div class="col-md-12">
  		<div class="row">
  			<div class="col-md-3"></div>

  			<div class="col-md-6 jumbotron" style="background-color: #a1c6ea9c;">

  				<img src="images/login.png" class="col-md-12" id="img_login">

  				<form method="post" class="my-2">

              <div>
                <?php

                  if(isset($error['hospital_admin']))
                  {
                    $sh = $error['hospital_admin'];

                    $show = "<h4 class='alert alert-danger'>$sh</h4>";
                  }
                  else
                  {
                    $show = "";
                  }

                  echo $show;
                ?>
              </div>

  					<div class="form-group">
  						<label for="user">Username</label>
  						<input type="text" name="uname" id="user" class="form-control" autocomplete="off" placeholder="Enter Username">
  					</div>
  					<div class="form-group">
  						<label for="secur">Password</label>
  						<input type="password" name="pass" id="secur" class="form-control" autocomplete="off" placeholder="Enter Password">
  					</div>

  					<input type="submit" name="login" value="Login" class="btn btn-success" style="margin-left: 40%;">
  				</form>
  			</div>

  			<div class="col-md-3"></div>
  		</div>
  	</div>
  </div>

  <video autoplay muted loop id="myVideo" class="backimg">
  <source src="health.mp4" type="video/mp4">
</video>
</body>
</html>