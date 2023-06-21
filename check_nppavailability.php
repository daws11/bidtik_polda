<?php 
require_once("dist/config/koneksi.php");
// code user username availablity
if(!empty($_POST["username"])) {
	$npp= $_POST["username"];
	$sql = "SELECT * FROM tabel_user WHERE username='$username'";
	$query = mysqli_query($conn,$sql);
	if(mysqli_num_rows($query)>0){
		echo "<span style='color:red'> ID sudah terdaftar.</span>";
		echo "<script>$('#submit').prop('disabled',true);</script>";
	}else{
		echo "<span style='color:green'> ID bisa digunakan.</span>";
		echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}

?>
