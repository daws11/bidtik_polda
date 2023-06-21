<?php
	// setting tanggal
	$haries = array("Sunday" => "Minggu", "Monday" => "Senin", "Tuesday" => "Selasa", "Wednesday" => "Rabu", "Thursday" => "Kamis", "Friday" => "Jum'at", "Saturday" => "Sabtu");
	$bulans = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
	$bulans_count = count($bulans);
	// tanggal bulan dan tahun hari ini
	$hari_ini = $haries[date("l")];
	$bulan_ini = $bulans[date("n")];
	$tanggal = date("d");
	$bulan = date("m");
	$tahun = date("Y");

	$id=$sess_Anggotaid;	
	$sql_g = "SELECT * FROM employee WHERE id_user='$id'";
	$ress_g = mysqli_query($conn, $sql_g);
	$res = mysqli_fetch_array($ress_g);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title> BID TIK POLDA METRO JAYA <?php echo $pagedesc ?></title>

	<link href="Gambar/tik-polri.png" rel="icon" type="images/x-icon">

    <!-- Bootstrap Core CSS -->
	<link href="libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="libs/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
	
	<!-- DataTables CSS -->
    <link href="libs/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="libs/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="dist/css/sb-admin-2.css" rel="stylesheet">
	<link href="dist/css/offline-font.css" rel="stylesheet">
	<link href="dist/css/custom.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- jQuery -->
	<script src="libs/jquery/dist/jquery.min.js"></script>

</head>
<body>
<div id="wrapper">
<header>
    <nav class="navbar navbar-expand-lg navbar-dark nav-menu bg-blue-light">
        <div class="logo"> <img src="../Gambar/header.png" style="width: 350px">      
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown dropdown-right">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<i class="fa fa-user fa-fw"></i>&nbsp;<?php echo ucfirst($sess_Anggotaname); ?>&nbsp;<i class="fa fa-caret-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-user">
						<li><a href="pengaturan.php"><i class="fa fa-gear fa-fw"></i>&nbsp;Pengaturan Akun</a></li>
						<li class="divider"></li>
						<li><a href="ubah_foto.php"><i class="fa fa-photo fa-fw"></i>&nbsp;Ubah Foto</a></li>
						<li class="divider"></li>
						<li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Keluar</a></li>
					</ul><!-- /.dropdown-user -->
				</li><!-- /.dropdown -->
			</ul><!-- /.navbar-top-links -->

          <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                    <?php
                            if($pagedesc == "Beranda") {
                                echo '<li><a href="Beranda.php" class="active"><i class="fa fa-home fa-fw"></i>&nbsp;Beranda</a></li>';
                            }
                            else {
                                echo '<li><a href="Beranda.php"><i class="fa fa-home fa-fw"></i>&nbsp;Beranda</a></li>';
                            }
                            if(isset($menuparent) && $menuparent == "master") {
                                echo '<li class="active">';
                            }
                            else {
                                echo '<li>';
                            }
                        ?>
                        <!-- open <li> tag generated with php, see line 134-139 -->
                           <a href="#"><i class="fa fa-group fa-fw"></i>&nbsp;RADIO HT<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<?php
									if($pagedesc == "SUBBID TEKKOM") {
										echo '<li><a href="alkom.php" class="active">SUBBID TEKKOM</a></li>';
									}
									else {
										echo '<li><a href="alkom.php">Input Data Radio HT</a></li>';
												}
									if($pagedesc == "SUBBID TEKKOM") {
										echo '<li><a href="perbaikan.php" class="active">SUBBID TEKKOM</a></li>';
									}
									else {
										echo '<li><a href="perbaikan.php">Pengajuan Perbaikan Radio HT</a></li>';
									}
								?>
							</ul>
                        <!-- open <li> tag generated with php, see line 155-160 -->
                                                <?php
                            if(isset($menuparent) && $menuparent == "laporan") {
                                echo '<li class="active">';
                            }
                            else {
                                echo '<li>';
                            }
                        ?>
                        <a href="#"><i class="fa fa-group fa-fw"></i>&nbsp;KAMTIBMAS<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<?php
									if($pagedesc == "KAMTIBMAS") {
										echo '<li><a href="Umum.php" class="active">KAMTIBMAS</a></li>';
									}
									else {
										echo '<li><a href="Umum.php">KAMTIBMAS UMUM</a></li>';
									}
									if($pagedesc == "KAMTIBMAS") {
										echo '<li><a href="Khusus.php" class="active">KAMTIBMAS</a></li>';
									}
									else {
										echo '<li><a href="Khusus.php">KAMTIBMAS KHUSUS</a></li>';
									}
									if($pagedesc == "HILTEM") {
										echo '<li><a href="hiltem.php" class="active">REKAPITULASI</a></li>';
									}
									else {
										echo '<li><a href="hiltem.php">REKAPITULASI</a></li>';
									}
								?>
							</ul>
                        <!-- open <li> tag generated with php, see line 155-160 -->
                                                <?php
                            if(isset($menuparent) && $menuparent == "laporan") {
                                echo '<li class="active">';
                            }
                            else {
                                echo '<li>';
                            }
                        ?>
                        <a href="#"><i class="fa fa-group fa-fw"></i>&nbsp;SURAT MASUK/KELUAR<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<?php
									if($pagedesc == "internal_masuk") {
										echo '<li><a href="internal_masuk.php" class="active">Surat Masuk Internal</a></li>';
									}
									else {
										echo '<li><a href="internal_masuk.php">Surat Masuk Internal</a></li>';
									}
									if($pagedesc == "internal_keluar") {
										echo '<li><a href="internal_keluar.php" class="active">Surat Keluar Internal</a></li>';
									}
									else {
										echo '<li><a href="internal_keluar.php">Surat Keluar Internal</a></li>';
									}
									if($pagedesc == "eksternal") {
										echo '<li><a href="cuti_waitapp.php" class="active">Surat Masuk Eksternal</a></li>';
									}
									else {
										echo '<li><a href="cuti_waitapp.php">Surat Masuk Eksternal</a></li>';
									}
									if($pagedesc == "eksternal") {
										echo '<li><a href="cuti_waitapp.php" class="active">Surat Keluar Eksternal</a></li>';
									}
									else {
										echo '<li><a href="cuti_waitapp.php">Surat Keluar Eksternal</a></li>';
									}
						
								?>
							</ul>
                        <!-- open <li> tag generated with php, see line 155-160 -->
                                                <?php
                            if(isset($menuparent) && $menuparent == "laporan") {
                                echo '<li class="active">';
                            }
                            else {
                                echo '<li>';
                            }


                        ?>
                        <a href="#"><i class="fa fa-group fa-fw"></i>&nbsp;Data User<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<?php
									if($pagedesc == "Data User") {
										echo '<li><a href="user.php" class="active">Data User</a></li>';
									}
									else {
										echo '<li><a href="user.php">Data User</a></li>';
									}
								?>
							</ul>
                        <!-- open <li> tag generated with php, see line 155-160 -->
                                                <?php
                            if(isset($menuparent) && $menuparent == "laporan") {
                                echo '<li class="active">';
                            }
                            else {
                                echo '<li>';
                            }
                            

                        ?>
                        <!-- open <li> tag generated with php, see line 155-160 -->
                            <a href="#"><i class="fa fa-folder fa-fw"></i>&nbsp;Laporan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <?php
                                    if($pagedesc == "Laporan") {
                                        echo '<li><a href="laporan.php" class="active">Laporan</a></li>';
                                    }
                                    else {
                                        echo '<li><a href="laporan.php">Laporan 1</a></li>';
										 echo '<li><a href="laporan3.php">Laporan 2</a></li>';
										  echo '<li><a href="laporan5.php">Laporan 3</a></li>';
										   echo '<li><a href="laporan7.php">Laporan 4</a></li>';
										    echo '<li><a href="laporan9.php">Laporan 5</a></li>';
                                    }
                                ?>
                            </ul><!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>