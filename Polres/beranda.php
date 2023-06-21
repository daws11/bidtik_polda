<?php
session_start();
	//include("sess_check.php");
	include("dist/config/koneksi.php"); 
	$id=$_SESSION["Polres"];//$sess_Polresid;
	require_once"../fungsiIO.php";
	
	$sql_g = "SELECT * FROM employee WHERE id_user='$id'";
	$ress_g = mysqli_query($conn, $sql_g);
	$res = mysqli_fetch_array($ress_g);
	
	
	// deskripsi halaman
	$pagedesc = "Beranda";
	include("layout_top.php");
	include("dist/function/format_rupiah.php");
?>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal">
							<div class="panel panel-default">
								<div class="panel-body">
								<h2 align="center">Selamat Datang, <?php echo $res['nama_user'];?>!</h2>
								<hr/>
								<center><img src="../Gambar/<?php echo $res['foto_emp']?>" width="500px"></center>
								<hr/>
								</div>
							</div><!-- /.panel -->
						</form>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
				<div class="row">
                    <div class="col-lg-8 col-md-8">
                        <h1 class="page-header">Beranda</h1>              
                         <div class="col-lg-9 col-md-9 px-1 bg-blue light">
                    <?php
                                           
                                        
//$sql =( "SELECT kamtibmas_umum.*, employee.* FROM kamtibmas_umum, employee WHERE kamtibmas_umum.id_user=employee.id_user AND 
                                        //hak_akses='Polres'");
$sql = "SELECT * FROM kamtibmas_umum order by rand()";
$ress = mysqli_query($conn, $sql);
$gab="";
while($data = mysqli_fetch_array($ress)){
		$wkt= $data['Waktu'];
		$No_Lp= $data['No_Lp'];
		$Jenis_ppgk= $data['Jenis_ppgk'];
		$lokasi= $data['Lokasi'];
		$nama=$data['Polsek'];
		$arw=explode(" ",$wkt);
		$tg=$arw[0];
		$hari=T2H($tg);
		$tgl=TGLL($tg);
		$jam=$arw[1];
		$waktu="$hari, $tgl; Jam $jam Wib";
    $gab.="<b>$nama  </b><br> No : $No_Lp <br> Jenis Peristiwa : $Jenis_ppgk <br> Waktu : $waktu <br> 
	<small><i>$lokasi</small></i><br>".
         "-------------------------------------------------------------------------<br>";
}
echo'<marquee onmouseover=this.stop() onmouseout=this.start() scrollamount=2 scrolldelay=90 direction=up width=100% height=450>'.$gab.'</marquee>';

?>
                </div>
                </div>
<div class="col-lg-3 col-md-3 header-content px- 1 pt-md-1 pb-md-1 mx-auto text-justify bg-gray">
                        <h5 class="page-header">Kegiatan Anggota BID TIK</h5>
                        <img src="../Gambar/BID-TIK.png" style="width: 300px" height="300px">
                        <div class="d-block mb-3"> 
                        <h5>Layanan CCTV</h5>               
                </div>
                <h5>Suara METRO</h5>
                        <div class="d-block mb-3 position-relative video-contain">
                            
                            <iframe frameborder="0"class="video-cust" src="http://173.82.58.69:8900/stream" allowfullscreen="">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
<!-- bottom of file -->
<?php
	include("layout_bottom.php");
?>