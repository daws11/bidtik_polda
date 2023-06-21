<?php
	include("sess_check.php");
	
	// query database memperbarui data pada database
	if(isset($_POST['perbarui'])) {
		$id_user=$_POST['id_user'];
		$Nama=$_POST['Nama'];
		$Pangkat=$_POST['Pangkat'];
		$Jabatan=$_POST['Jabatan'];
		$telp=$_POST['telp'];
		$id_radiolama=$_POST['id_radiolama'];
		$id_radio=$_POST['id_radio'];
		$serial_number=$_POST['serial_number'];
		$kondisi=$_POST['kondisi'];
		$Keterangan=$_POST['Keterangan'];
		
	if($id_user!=""){
		$sqlcek = "SELECT tabel_alkom.*, employee.* FROM tabel_alkom, employee WHERE tabel_alkom.id_user=employee.id_user='$id_user'";
		$ress = mysqli_query($conn, $sqlcek);
		$rows = mysqli_num_rows($ress);
		if($rows<1){
			if($id_user!=""){
				$sql = "UPDATE tabel_alkom SET
				id_user='". $id_user."',
				Nama='". $Nama ."',
				Pangkat='". $Pangkat ."',
				Jabatan='". $Jabatan ."',
				telp='". $telp ."',
					id_radio='". $id_radio ."',
					serial_number='". $serial_number ."',
					kondisi='". $kondisi ."',
					Keterangan='". $Keterangan ."',
					WHERE id_radio='". $id_radiolama ."'";
				$ress = mysqli_query($conn, $sql);
				header("location: Alkom.php?act=update&msg=success");
			}else{
				$sql = "UPDATE tabel_alkom SET
			id_user='". $id_user."',
				Nama='". $Nama ."',
				Pangkat='". $Pangkat ."',
				Jabatan='". $Jabatan ."',
				telp='". $telp ."',
					id_radio='". $id_radio ."',
					serial_number='". $serial_number ."',
					kondisi='". $kondisi ."',
					Keterangan='". $Keterangan ."',
					WHERE id_radio='". $id_radiolama ."'";
				$ress = mysqli_query($conn, $sql);
				header("location: Alkom.php?act=update&msg=success");
			}
		}else{
			header("location: Alkom_edit.php?id_radio=$id_radiolama&act=add&msg=double");			
		}
	}else{
		if($id_user!=""){
			$sql = "UPDATE tabel_alkom SET
				id_user='". $id_user."',
				Nama='". $Nama ."',
				Pangkat='". $Pangkat ."',
				Jabatan='". $Jabatan ."',
				telp='". $telp ."',
					serial_number='". $serial_number ."',
					kondisi='". $kondisi ."',
					Keterangan='". $Keterangan ."',
					WHERE id_radio='". $id_radiolama ."'";
			$ress = mysqli_query($conn, $sql);
			header("location: Alkom.php?act=update&msg=success");
		}else{
				$sql = "UPDATE tabel_alkom SET
				id_user='". $id_user."',
				Nama='". $Nama ."',
				Pangkat='". $Pangkat ."',
				Jabatan='". $Jabatan ."',
				telp='". $telp ."',
					id_radio='". $id_radio ."',
					serial_number='". $serial_number ."',
					kondisi='". $kondisi ."',
					Keterangan='". $Keterangan ."',
					WHERE id_radio='". $id_radiolama ."'";
			$ress = mysqli_query($conn, $sql);
			header("location: Alkom.php?act=update&msg=success");
		}
	}
}
?>