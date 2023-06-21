<?php
// memulai session
session_start();
// memanggil file koneksi
include("dist/config/koneksi.php");
$_SESSION['nama_user']="";

// mengecek apakah tombol login sudah di tekan atau belum
if(isset($_POST['login'])) {
	// mengecek apakah username dan password sudah di isi atau belum
	if(empty($_POST['username']) || empty($_POST['password'])) {
		// mengarahkan ke halaman login.php
		header("location: login.php?err=empty");
	}
	else {
		// membaca nilai variabel username dan password
		$username = $_POST['username'];
		$password = $_POST['password'];
		$akses = $_POST['akses'];
		// mencegah sql injection
		$username = htmlentities(trim(strip_tags($username)));
		$password = htmlentities(trim(strip_tags($password)));
			// memeriksa username di tabel admin

			if($akses=="Admin"){			
				$sql = "SELECT * FROM admin WHERE user_adm='". $username ."' AND pass_adm='". $password ."'";
				$ress = mysqli_query($conn, $sql);
				$rows = mysqli_num_rows($ress);
				$dataku = mysqli_fetch_array($ress);
				// mendaftarkan session jika username di temukan
				if($rows == 1) {
					// membuat variabel session
					
					$_SESSION['admin'] = strtolower($dataku['id_adm']);
					// mengarahkan ke halaman indeks.php
					header("location: beranda.php?login=success");
				}else{
					header("location: login.php?err=not_found");
				}
			}else if($akses=="Polres"){
				$aks = "Polres";
				$sql = "SELECT * FROM employee WHERE hak_akses='".$aks."' AND id_user='". $username ."' AND password='". $password ."'";
				$ress = mysqli_query($conn, $sql);
				$rows = mysqli_num_rows($ress);
				$dataku = mysqli_fetch_array($ress);
				// mendaftarkan session jika username di temukan
				if($rows == 1) {
					// membuat variabel session
					$_SESSION['Polres'] = strtolower($dataku['id_user']);
					$_SESSION['nama_user'] = strtolower($dataku['nama_user']);
					// mengarahkan ke halaman indeks.php
					header("location: Polres/beranda.php?login=success");
				}else{
					header("location: login.php?err=not_found");
				}
			}else if($akses=="Satker"){			
				$aks = "Satker";
				$sql = "SELECT * FROM employee WHERE hak_akses='".$aks."' AND id_user='". $username ."' AND password='". $password ."'";
				$ress = mysqli_query($conn, $sql);
				$rows = mysqli_num_rows($ress);
				$dataku = mysqli_fetch_array($ress);
				// mendaftarkan session jika username di temukan
				if($rows == 1) {
					// membuat variabel session
					$_SESSION['Satker'] = strtolower($dataku['id_user']);
					// mengarahkan ke halaman indeks.php
					header("location: Satker/beranda.php?login=success");
				}else{
					header("location: login.php?err=not_found");
				}
			}else if($akses=="Anggota"){			
				$aks = "Anggota";
				$sql = "SELECT * FROM employee WHERE hak_akses='".$aks."' AND id_user='". $username ."' AND password='". $password ."'";
				$ress = mysqli_query($conn, $sql);
				$rows = mysqli_num_rows($ress);
				$dataku = mysqli_fetch_array($ress);
				// mendaftarkan session jika username di temukan
				if($rows == 1) {
					// membuat variabel session
					$_SESSION['Anggota'] = strtolower($dataku['id_user']);
					// mengarahkan ke halaman indeks.php
					header("location: Anggota/beranda.php?login=success");
				}else{
					header("location: login.php?err=not_found");
				}
			}else{			
				$aks = "Atasan";
				$sql = "SELECT * FROM employee WHERE hak_akses='".$aks."' AND id_user='". $username ."' AND password='". $password ."'";
				$ress = mysqli_query($conn, $sql);
				$rows = mysqli_num_rows($ress);
				$dataku = mysqli_fetch_array($ress);
				// mendaftarkan session jika username di temukan
				if($rows == 1) {
					// membuat variabel session
					$_SESSION['Atasan'] = strtolower($dataku['id_user']);
					// mengarahkan ke halaman indeks.php
					header("location: Atasan/beranda.php?login=success");
				}else{
					header("location: login.php?err=not_found");
				}
			}
	}
}
?>