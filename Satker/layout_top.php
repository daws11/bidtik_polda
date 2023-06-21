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

	$id=$sess_Satkerid;	
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="wrapper">
<header>
    <nav class="navbar navbar-expand-lg navbar-dark nav-menu bg-blue-light">
        <div class="logo"> <img src="../Gambar/header.png" style="width: 350px">      
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown dropdown-right">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<img src="../Gambar/<?php echo $res['foto_emp']?>" width="100px"></i>&nbsp;<?php echo ucfirst($sess_Satkername); ?>&nbsp;<i class="fa fa-caret-down"></i>
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
                                echo '<li><a href="beranda.php" class="active"><i class="fa fa-home fa-fw"></i>&nbsp;Beranda</a></li>';
                            }
                            else {
                                echo '<li><a href="beranda.php"><i class="fa fa-home fa-fw"></i>&nbsp;Beranda</a></li>';
                            }
                            if(isset($menuparent) && $menuparent == "master") {
                                echo '<li class="active">';
                            }
                            else {
                                echo '<li>';
                            }
                        ?>
                        <!-- open <li> tag generated with php, see line 134-139 -->
                         <a href="#"><i class="fa fa-group fa-fw"></i>&nbsp;JARINGAN<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <?php
                                    if($pagedesc == "SUBBID TEKKOM") {
                                        echo '<li><a href="jarkom_create.php" class="active">SUBBID TEKKOM</a></li>';
                                    }
                                    else {
                                        echo '<li><a href="jarkom_create.php">Buat Pengajuan</a></li>';
                                                }
                                    if($pagedesc == "SUBBID TEKKOM") {
                                        echo '<li><a href="jarkom_status.php" class="active">SUBBID TEKKOM</a></li>';
                                    }
                                    else {
                                        echo '<li><a href="jarkom_status.php">Status Pengajuan</a></li>';
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
                       <a href="#"><i class="fa fa-group fa-fw"></i>&nbsp;SOUND<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <?php
                                    if($pagedesc == "SUBBID TEKKOM") {
                                        echo '<li><a href="yankom_create.php" class="active">SUBBID TEKKOM</a></li>';
                                    }
                                    else {
                                        echo '<li><a href="yankom_create.php">Buat Pengajuan</a></li>';
                                                }
                                    if($pagedesc == "SUBBID TEKKOM") {
                                        echo '<li><a href="yankom_status.php" class="active">SUBBID TEKKOM</a></li>';
                                    }
                                    else {
                                        echo '<li><a href="yankom_status.php">Status Pengajuan</a></li>';
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
                                        echo '<li><a href="laporan.php">Laporan</a></li>';
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