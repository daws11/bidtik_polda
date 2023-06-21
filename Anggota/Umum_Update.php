<?php
	include("sess_check.php");
	
	// query database memperbarui data pada database
	if(isset($_POST['perbarui'])) {
		$id_userlama=$_POST['id_userlama'];
		$id_user=$_POST['id_user'];
		$nama_user=$_POST['nama_user'];
		$akses=$_POST['hak_akses'];
		$cekfoto=$_FILES["foto_emp"]["name"];
		$pass=$_POST['password'];
		$aktif=$_POST['active'];
		
	if($id_user!=""){
		$sqlcek = "SELECT * FROM employee WHERE id_user='$id_user'";
		$ress = mysqli_query($conn, $sqlcek);
		$rows = mysqli_num_rows($ress);
		if($rows<1){
			if($cekfoto!=""){
				$foto=substr($_FILES["foto_emp"]["name"],-5);
				$newfoto = "foto_emp".$id_user.$foto_emp;				
				move_uploaded_file($_FILES["foto_emp"]["tmp_name"],"Gambar/".$newfoto);
				$sql = "UPDATE employee SET
					id_user='". $id_user ."',
					nama_user='". $nama_user ."',
					hak_akses='". $akses ."',
					password='". $pass ."',
					active='". $aktif ."',
					foto_emp='". $newfoto ."'
					WHERE id_user='". $id_userlama ."'";
				$ress = mysqli_query($conn, $sql);
				header("location: user.php?act=update&msg=success");
			}else{
				$sql = "UPDATE employee SET
				id_user='". $id_user ."',
					nama_user='". $nama_user ."',
					hak_akses='". $akses ."',
					password='". $pass ."',
					active='". $aktif ."',
					foto_emp='". $newfoto ."'
					WHERE id_user='". $id_userlama ."'";
				$ress = mysqli_query($conn, $sql);
				header("location: user.php?act=update&msg=success");
			}
		}else{
			header("location: user_edit.php?id_user=$id_userlama&act=add&msg=double");			
		}
	}else{
		if($cekfoto!=""){
			$foto_emp=substr($_FILES["foto_emp"]["name"],-5);
			$newfoto = "foto_emp".$id_userlama.$foto_emp;				
			move_uploaded_file($_FILES["foto_emp"]["tmp_name"],"Gambar/".$newfoto);
				$sql = "UPDATE employee SET
					nama_user='". $nama_user ."',
					hak_akses='". $akses ."',
					password='". $pass ."',
					active='". $aktif ."',
					foto_emp='". $newfoto ."'
					WHERE id_user='". $id_userlama ."'";
			$ress = mysqli_query($conn, $sql);
			header("location: user.php?act=update&msg=success");
		}else{
				$sql = "UPDATE employee SET
					nama_user='". $nama_user ."',
					hak_akses='". $akses ."',
					password='". $pass ."',
					active='". $aktif ."',
					foto_emp='". $newfoto ."'
					WHERE id_user='". $id_userlama ."'";
			$ress = mysqli_query($conn, $sql);
			header("location: user.php?act=update&msg=success");
		}
	}
}
?>