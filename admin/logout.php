<?php
session_start();

if(isset($_SESSION['hospital_admin']))
{
	unset($_SESSION['hospital_admin']);

	header("Location:../index.php");
	
}

?>