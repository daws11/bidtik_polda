<?php
	include("sess_check.php");
		$id = $_GET['id_user'];	
		$sql = "DELETE FROM employee WHERE id_user='". $id ."'";
		$ress = mysqli_query($conn, $sql);
		header("location: user.php?act=delete&msg=success");
?>