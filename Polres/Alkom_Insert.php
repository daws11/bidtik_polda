<?php
include("sess_check.php");
$id_user=$_POST['id_user'];
$Nama=$_POST['Nama'];
$Pangkat=$_POST['Pangkat'];
$Jabatan=$_POST['Jabatan'];
$telp=$_POST['telp'];
$id_radio=$_POST['id_radio'];
$serial_number=$_POST['serial_number'];
$kondisi=$_POST['kondisi'];
$Keterangan=$_POST['Keterangan'];

$sqlcek =  "SELECT tabel_alkom.*, employee.* FROM tabel_alkom, employee WHERE tabel_alkom.id_user=employee.id_user AND tabel_alkom.id_radio='$id_radio'";
$resscek = mysqli_query($conn, $sqlcek);
$rowscek = mysqli_num_rows($resscek);
if($rowscek<1){
	$sql="INSERT INTO tabel_alkom(Nama,Pangkat,Jabatan,telp,id_radio,serial_number,kondisi,Keterangan)
		  VALUES('$Nama','$Pangkat','$Jabatan','$telp','$id_radio','$serial_number','$kondisi','$Keterangan')";
	$ress = mysqli_query($conn, $sql);
	if($ress){
		echo "<script>alert('Tambah User Berhasil!');</script>";
		echo "<script type='text/javascript'> document.location = 'Alkom.php'; </script>";
	}else{
		echo("Error description: " . mysqli_error($conn));
		echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
		echo "<script type='text/javascript'> document.location = 'Alkom_Tambah.php'; </script>";
	}
}else{
	header("location: Alkom_Tambah.php?act=add&msg=double");	
}
?>