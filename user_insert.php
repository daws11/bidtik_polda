<?php
include("sess_check.php");

$id = $sess_admid;
$id_user=$_POST['id_user'];
$nama_user=$_POST['nama_user'];
$akses=$_POST['hak_akses'];
$password=$_POST['password'];
$foto_emp=substr($_FILES["foto_emp"]["name"],-5);
$newfoto = "foto_emp".$id_user.$foto_emp;
$aktif = "aktif";

$sqlcek = "SELECT * FROM employee WHERE id_user='$id_user'";
$resscek = mysqli_query($conn, $sqlcek);
$rowscek = mysqli_num_rows($resscek);
if($rowscek<1){
	$sql="INSERT INTO employee(id_user,nama_user,hak_akses,password,foto_emp,active,id_adm)
		  VALUES('$id_user','$nama_user','$akses','$password','$newfoto','$aktif','$id')";
	$ress = mysqli_query($conn, $sql);
	if($ress){
		move_uploaded_file($_FILES["foto_emp"]["tmp_name"],"../Gambar/".$newfoto);
		echo "<script>alert('Tambah User Berhasil!');</script>";
		echo "<script type='text/javascript'> document.location = 'user.php'; </script>";
	}else{
		echo("Error description: " . mysqli_error($conn));
		echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
		echo "<script type='text/javascript'> document.location = 'tambah_user.php'; </script>";
	}
}else{
	header("location: tambah_user.php?act=add&msg=double");	
}
?>