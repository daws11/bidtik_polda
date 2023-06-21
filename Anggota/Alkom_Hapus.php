<?php
	include("sess_check.php");
		$id = $_GET['id_user'];	
		$sql = "DELETE tabel_alkom.*, employee.* FROM tabel_alkom, employee WHERE tabel_alkom.id_user=employee.id_user='". $id ."'";
		$ress = mysqli_query($conn, $sql);
		header("location: Alkom.php?act=delete&msg=success");
?>