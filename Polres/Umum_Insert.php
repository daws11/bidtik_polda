<?php
include("sess_check.php");
$id_user=$_SESSION["id_user"];//$_POST['id_user'];
$No_Lp=$_POST['No_Lp'];
$Polsek=$_SESSION["nama_user"];//$_POST['Polsek'];
$Jenis_ppgk=$_POST['Jenis_ppgk'];
$Waktu=$_POST['Waktu'];
$Pelapor=$_POST['Pelapor'];
$Korban=$_POST['Korban'];
$Alamat=$_POST['Alamat'];
$Terlapor=$_POST['Terlapor'];
$Lokasi=$_POST['Lokasi'];
$Motif=$_POST['Motif'];
$Kerugian=$_POST['Kerugian'];

$sqlcek =  "SELECT kamtibmas_umum.*, employ* FROM kamtibmas_umum, employee WHERE kamtibmas_umum.id_user=employee.id_user AND kamtibmas_umum.id_user='$id_user'";
$resscek = mysqli_query($conn, $sqlcek);
$rowscek = mysqli_num_rows($resscek);
if($rowscek<1){
	$sql="INSERT INTO kamtibmas_umum(id_user,No_Lp,Polsek,Jenis_ppgk,Waktu,Pelapor,Korban,Alamat,Terlapor,Lokasi,Motif,Kerugian)
		  VALUES('$id_user','$No_Lp','$Polsek','$Jenis_ppgk','$Waktu','$Pelapor','$Korban','$Alamat','$Terlapor','$Lokasi','$Motif','$Kerugian')";
	$ress = mysqli_query($conn, $sql);
	if($ress){
		echo "<script>alert('Tambah User Berhasil!');</script>";
		echo "<script type='text/javascript'> document.location = 'Umum.php'; </script>";
	}else{
		echo("Error description: " . mysqli_error($conn));
		echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
		echo "<script type='text/javascript'> document.location = 'Umum_Tambah.php'; </script>";
	}
}else{
	header("location: Umum_Tambah.php?act=add&msg=double");	
}
?>