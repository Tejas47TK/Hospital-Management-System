
<?php

	include("../project/connection.php");

	$id = $_POST['id'];

	$sql = "UPDATE doctors set status='Approved' where id='$id'";

	mysqli_query($connect,$sql);

?>