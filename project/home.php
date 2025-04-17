
<html>
<head>
	<title>Hospital Management</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css">

  <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-info bg-info" style="background-color: #17a2b82e !important;">
    	<h5 class="text-white">Hospital Management System</h5>

    	<div class="mr-auto"></div>

    	<ul class="navbar-nav">
        <?php

          if(isset($_SESSION['hospital_admin']))
          {
            $user = $_SESSION['hospital_admin'];

              echo '
                <li class="nav-item"><a href="#" class="nav-link text-white">'.$user.'</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link text-white">logout</a></li>
              ';
          }
          else if(isset($_SESSION['doctor']))
          {
            $user = $_SESSION['doctor'];

              echo '
                <li class="nav-item"><a href="#" class="nav-link text-white">'.$user.'</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link text-white">logout</a></li>
              ';
          }
          else if(isset($_SESSION['patient']))
          {
            $user = $_SESSION['patient'];

              echo '
                <li class="nav-item"><a href="#" class="nav-link text-white">'.$user.'</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link text-white">logout</a></li>
              ';
          }
          else
          {
            echo '
              <li class="nav-item"><a href="index.php" class="nav-link text-white">Home</a></li>
              <li class="nav-item"><a href="admin_login.php" class="nav-link text-white">Admin</a></li>
              <li class="nav-item"><a href="doctor_login.php" class="nav-link text-white">Doctor</a></li>
              <li class="nav-item"><a href="patient_login.php" class="nav-link text-white">Patient</a></li>
            ';
          }

        ?>
    	</ul>
    	
    </nav>
</body>
</html>