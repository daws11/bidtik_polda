<?php
    include("sess_check.php");
	 include("fungsiIO.php");
    // query database mencari data admin
    $sql_e = "SELECT id_user FROM employee WHERE active='Aktif'";
    $ress_e = mysqli_query($conn, $sql_e);
    $e = mysqli_num_rows($ress_e);

    // deskripsi halaman
    $pagedesc = "Beranda";
    include("layout_top.php");
?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <h1 class="page-header">Beranda</h1>              
                         <div class="col-lg-9 col-md-9">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-check-circle fa-3x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $e; ?></div>
                                        <div><h4>Jumlah User Aktif</h4></div>
                                    </div>
                                </div>
                            </div>
                            <a href="user.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Lihat Rincian</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
						
						
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
echo'<marquee onmouseover=this.stop() onmouseout=this.start() scrollamount=2 scrolldelay=90 direction=up width=100% height=350>'.$gab.'</marquee>';

?>


                    </div>
                </div>
                <div class="col-lg-3 col-md-3 header-content px- 1 pt-md-1 pb-md-1 mx-auto text-justify bg-gray">
                        <h5 class="page-header">Kegiatan Anggota BID TIK</h5>
                        <img src="Gambar/tik-polri.png" width="300px" height="300px">
                        <div class="d-block mb-3"> 
                        <h5>Layanan CCTV</h5>               
                </div>
                <h5>Suara METRO</h5>
                        <div class="d-block mb-3 position-relative video-contain">
                            <iframe frameborder="0"class="video-cust" src="http://173.82.58.69:8900/stream" allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
<?php
    include("layout_bottom.php");
?>