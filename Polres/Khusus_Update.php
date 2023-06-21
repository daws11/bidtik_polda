<?php
	include("sess_check.php");
	
	// query database memperbarui data pada database
	if(isset($_POST['perbarui'])) {
		$id_userlama=$_POST['id_userlama'];
		$id_user=$_POST['id_user'];
$No_Lp=$_POST['No_Lp'];
$Polsek=$_POST['Polsek'];
$Waktu=$_POST['Waktu'];
$Pelapor=$_POST['Pelapor'];
$Korban=$_POST['Korban'];
$Alamat=$_POST['Alamat'];
$Terlapor=$_POST['Terlapor'];
$Lokasi=$_POST['Lokasi'];
$Motif=$_POST['Motif'];
$Kerugian=$_POST['Kerugian'];
		
	if($id_user!=""){
		$sqlcek = "SELECT * FROM kamtibmas_khusus WHERE id_user='$id_user'";
		$ress = mysqli_query($conn, $sqlcek);
		$rows = mysqli_num_rows($ress);
		if($rows<1){
			if($id_user!=""){
				
				$sql = "UPDATE kamtibmas_khusus SET
					id_user='". $id_user ."',
					No_Lp='". $No_Lp ."',
					Polsek='". $Polsek ."',
					Waktu='". $Waktu ."',
					Pelapor='". $Pelapor ."',
					Korban='". $Korban ."',
					Alamat='". $Alamat ."',
					Terlapor='". $Terlapor ."',
					Lokasi='". $Lokasi ."',
					Motif='". $Motif ."',
					Kerugian='". $Kerugian ."',
					WHERE id_user='". $id_userlama ."'";
				$ress = mysqli_query($conn, $sql);
				header("location: kamtibmas_khusus.php?act=update&msg=success");
			}else{
				$sql = "UPDATE kamtibmas_khusus SET
				id_user='". $id_user ."',
					No_Lp='". $No_Lp ."',
					Polsek='". $Polsek ."',
					Waktu='". $Waktu ."',
					Pelapor='". $Pelapor ."',
					Korban='". $Korban ."',
					Alamat='". $Alamat ."',
					Terlapor='". $Terlapor ."',
					Lokasi='". $Lokasi ."',
					Motif='". $Motif ."',
					Kerugian='". $Kerugian ."',
					WHERE id_user='". $id_userlama ."'";
				$ress = mysqli_query($conn, $sql);
				header("location: Khusus.php?act=update&msg=success");
			}
		}else{
			header("location: user_edit.php?id_user=$id_userlama&act=add&msg=double");			
		}
	}else{
		if($id_user!=""){
			$sql = "UPDATE kamtibmas_khusus SET
					No_Lp='". $No_Lp ."',
					Polsek='". $Polsek ."',
					Waktu='". $Waktu ."',
					Pelapor='". $Pelapor ."',
					Korban='". $Korban ."',
					Alamat='". $Alamat ."',
					Terlapor='". $Terlapor ."',
					Lokasi='". $Lokasi ."',
					Motif='". $Motif ."',
					Kerugian='". $Kerugian ."',
					WHERE id_user='". $id_userlama ."'";
			$ress = mysqli_query($conn, $sql);
			header("location: Khusus.php?act=update&msg=success");
		}else{
					$sql = "UPDATE kamtibmas_umum SET
					No_Lp='". $No_Lp ."',
					Polsek='". $Polsek ."',
					Waktu='". $Waktu ."',
					Pelapor='". $Pelapor ."',
					Korban='". $Korban ."',
					Alamat='". $Alamat ."',
					Terlapor='". $Terlapor ."',
					Lokasi='". $Lokasi ."',
					Motif='". $Motif ."',
					Kerugian='". $Kerugian ."',
					WHERE id_user='". $id_userlama ."'";
			$ress = mysqli_query($conn, $sql);
			header("location: Khusus.php?act=update&msg=success");
		}
	}
}
?>