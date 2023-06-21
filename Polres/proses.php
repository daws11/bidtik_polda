<?php
include("dist/config/koneksi.php");
//Tampilkan data dari tabel karyawan
   if(isset($_GET['id_radio'])) {
        $sql =  "SELECT tabel_alkom.*, employee. * From tabel_alkom, employee WHERE tabel_alkom.id_user=employee.id_user AND tabel_alkom.id_radio='". $_GET['id_radio'] ."'";
        $ress = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($ress);
    }

?>