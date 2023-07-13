<?php
include("sess_check.php");

$id = $sess_admid;
$id_user=$_POST['id_user'];
$no_lp=$_POST['No_Lp'];
$polsek=$_POST['Polsek'];
$waktu=$_POST['Waktu'];
$pelapor=$_POST['Pelapor'];
$korban=$_POST['Korban'];
$alamat=$_POST['Alamat'];
$terlapor=$_POST['Terlapor'];
$lokasi=$_POST['Lokasi'];
$motif=$_POST['Motif'];
$kerugian=$_POST['Kerugian'];

$sqlcek = "SELECT * FROM kamtibmas_umum WHERE id_user='$id_user'";
$resscek = mysqli_query($conn, $sqlcek);
$rowscek = mysqli_num_rows($resscek);
if($rowscek<1){
	$sql="INSERT INTO kamtibmas_umum(id_user,No_Lp,Polsek,Waktu,Pelapor,Korban,Alamat,Terlapor,Lokasi,Motif,Kerugian)
		  VALUES('$id_user','$no_lp','$polsek','$waktu','$pelapor','$korban','$alamat','$terlapor','$lokasi','$motif','$kerugian')";
	$ress = mysqli_query($conn, $sql);
	if($ress){
		move_uploaded_file($_FILES["foto_emp"]["tmp_name"],"../Gambar/".$newfoto);
		echo "<script>alert('Tambah Laporan Berhasil!');</script>";
		echo "<script type='text/javascript'> document.location = 'lapcari.php'; </script>";
	}else{
		echo("Error description: " . mysqli_error($conn));
		echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
		echo "<script type='text/javascript'> document.location = 'tambah_laporan.php'; </script>";
	}
}else{
	header("location: tambah_laporan.php?act=add&msg=double");	
}
?>