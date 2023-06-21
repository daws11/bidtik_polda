<?php
include("sess_check.php");

$id_user=$_POST['id_user'];
$foto_emp=substr($_FILES["foto_emp"]["name"],-5);
$newfoto = "foto_emp".$id_user.$foto_emp;

	$sql = "UPDATE employee SET foto_emp='". $newfoto ."' WHERE id_user='". $id_user ."'";
	$ress = mysqli_query($conn, $sql);
	if($ress){
		move_uploaded_file($_FILES["foto_emp"]["tmp_name"],"../Gambar/".$newfoto);
		echo "<script>alert('Ubah Foto Berhasil!');</script>";
		echo "<script type='text/javascript'> document.location = 'ubah_foto.php'; </script>";
	}else{
		echo("Error description: " . mysqli_error($conn));
		echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
		echo "<script type='text/javascript'> document.location = 'ubah_foto.php'; </script>";
	}
?>