<?php
require_once"../fungsiIO.php";
	include("sess_check.php");
	
	// deskripsi halaman
	$pagedesc = "DATA KAMTIBMAS UMUM";
	include("layout_top.php");
	include("dist/function/format_tanggal.php");
	include("dist/function/format_rupiah.php");
	
?>

<div id="page-wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<h1 class="page-header"><?php echo ucwords($_SESSION["nama_user"]);?> 
<sub><i>DATA KAMTIBMAS UMUM</i></sub>
</h1>
<div align="right">
<a href="laporan.php">UMUM</a>  | <a href="laporan2.php">KHUSUS</a>
</div>
</div>
</div>

<div class="row">
<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
</div>

<div class="row">
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../jqwidgets/styles/jqx.base.css" type="text/css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1 minimum-scale=1" />	
    <script type="text/javascript" src="../scripts/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxdraw.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxchart.core.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxmenu.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxgrid.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxgrid.selection.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxgrid.pager.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxgrid.filter.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxcheckbox.js"></script>
    <script type="text/javascript" src="../scripts/demos.js"></script>

<?php
$no = 1;
$Polsek=$_SESSION["nama_user"];
$TABEL="kamtibmas_umum";
$sql="SELECT Waktu FROM `$TABEL` GROUP BY DATE_FORMAT(`Waktu`, '%Y%m')";
//where Polsek='
$ress = mysqli_query($conn, $sql);
$gab="Periode ";
$judul_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei","Juni", "Juli", "Agustus", "September","Oktober", "November", "Desember");
$jum=getJum($conn,$sql); 
	
$arJ=array(); 
$sqlc="select distinct(`Jenis_ppgk`) from $TABEL";
$arrc = getData($conn, $sqlc);
	$i=0;
	$lap2="";
	$lap3="";
	foreach ($arrc as $dc) {
		$Jenis_pggk = $dc["Jenis_ppgk"];
		$arJ[$i]=$Jenis_pggk; 
		$i++;
	} 
$arJJ=array();
$jj=0;	 
while($data = mysqli_fetch_array($ress)) {
	$wkt= $data['Waktu'];
	$arw=explode(" ",$wkt);
	$tg=$arw[0];
	$tgl=TGLL($tg);
	$jam=$arw[1];
	$waktu="$tgl $jam Wib";
	$artgl=explode("-",$tg);
	$bulan=$artgl[1]+0;
	$tahun=$artgl[0]+0;
	
	$awal="$tahun-$bulan-01";
	$ahir="$tahun-$bulan-31";
	$periode=$judul_bln[$bulan]." $tahun"; 
	if($no==1){$gab.=$periode." s/d ";}
	else if($no==$jum){$gab.=$periode;} 
	//echo"<tr><td>$no. #$waktu $awal s/d $ahir : $jumlah";
$no++;
}
 
 

$k=0;
$arD=array();
$arE=array();
$sqlc="select distinct(`nama_user`) from `employee` where `active` ='Aktif' and `hak_akses`='Polres' and (`nama_user` like '%Jakarta%' or `nama_user` like '%Seribu%') order by `nama_user` asc";
$arrc = getData($conn, $sqlc);
	foreach ($arrc as $dc) {
		$nama_user = $dc["nama_user"];
		////echo"$nama_user<br>";
		$lap1="";
		for($j=0;$j<$i;$j++){
			$Jenis_ppgk=$arJ[$j];
			$sqld="select No_Lp from $TABEL where `Jenis_ppgk`='$Jenis_ppgk' and `Polsek`='$nama_user'";
			$jumlah=getJuml($conn,$sqld);
			$lap1.="{ Browser: '$Jenis_ppgk', Share: $jumlah },";
		}
		$lap1=POT($lap1);
		$arE[$k]=$nama_user;
		$arD[$k]=$lap1;
		$k++;
	}

?>	 
    <link rel="stylesheet" href="../jqwidgets/styles/jqx.base.css" type="text/css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1 minimum-scale=1" />	
    <script type="text/javascript" src="../scripts/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxdraw.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxchart.core.js"></script>
    <script type="text/javascript" src="../scripts/demos.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxdata.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var dataBarat = [<?php echo $arD[0];?>];
            var dataPusat = [<?php echo $arD[1];?>];
            var dataSelatan = [<?php echo $arD[2];?>];
            var dataTimur = [<?php echo $arD[3];?>];
			var dataUtara = [<?php echo $arD[4];?>];
            var dataSeribu = [<?php echo $arD[5];?>];

            var charts = [
                { title: '<?php echo $arE[0];?>', label: '<?php echo $arE[0];?>', dataSource: dataBarat },
                { title: '<?php echo $arE[1];?>', label: '<?php echo $arE[1];?>', dataSource: dataPusat },
                { title: '<?php echo $arE[2];?>', label: '<?php echo $arE[2];?>', dataSource: dataSelatan },
                { title: '<?php echo $arE[3];?>', label: '<?php echo $arE[3];?>', dataSource: dataTimur },
				{ title: '<?php echo $arE[4];?>', label: '<?php echo $arE[4];?>', dataSource: dataUtara },
				{ title: '<?php echo $arE[5];?>', label: '<?php echo $arE[5];?>', dataSource: dataSeribu }
            ];

            for (var i = 0; i < charts.length; i++) {
                var chartSettings = {
                    source: charts[i].dataSource,
                    title: '',
                    description: charts[i].title,
                    enableAnimations: false,
                    showLegend: true,
                    showBorderLine: true,
                    padding: { left: 5, top: 5, right: 5, bottom: 5 },
                    titlePadding: { left: 0, top: 0, right: 0, bottom: 10 },
                    colorScheme: 'scheme03',
                    seriesGroups: [
                        {
                            type: 'pie',
                            showLegend: true,
                            enableSeriesToggle: true,
                            series:
                                [
                                    {
                                        dataField: 'Share',
                                        displayText: 'Browser',
                                        showLabels: true,
                                        labelRadius: 160,
                                        labelLinesEnabled: true,
                                        labelLinesAngles: true,
                                        labelsAutoRotate: false,
                                        initialAngle: 0,
                                        radius: 125,
                                        minAngle: 0,
                                        maxAngle: 180,
                                        centerOffset: 0,
                                        offsetY: 170,
                                        formatFunction: function (value, itemIdx, serieIndex, groupIndex) {
                                            if (isNaN(value))
                                                return value;

                                            return value + '%';
                                        }
                                    }
                                ]
                        }
                    ]
                };

                // select container and apply settings
                var selector = '#chartContainer' + (i + 1);
                $(selector).jqxChart(chartSettings);

            } // for
        });
    </script>
</head>
<body class='default'>
    <table>
        <tr>
            <td>
                <div id='chartContainer1' style="width: 570px; height: 250px;">
                </div>
            </td>
            <td>
                <div id='chartContainer2' style="width: 570px; height: 250px;">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div id='chartContainer3' style="width: 570px; height: 250px;">
                </div>
            </td>
            <td>
                <div id='chartContainer4' style="width: 570px; height: 250px;">
                </div>
            </td>
        </tr>
		
		        <tr>
            <td>
                <div id='chartContainer5' style="width: 570px; height: 250px;">
                </div>
            </td>
            <td>
                <div id='chartContainer6' style="width: 570px; height: 250px;">
                </div>
            </td>
        </tr>
		
		
    </table>
    <div class="example-description">
    <br />
    <h2>Range Pembacaan <?php echo ucwords($pagedesc)?></h2>
    <br />Dari <?php echo $gab;?>
    </div>


 <?php
 //echo $lap1."<hr>";
 //echo $lap2."<hr>";
 //echo $lap3."<hr>";
 
 
 ?>
</body>
</html>



<!-- 	
<div class="panel-body">
<table class="table table-striped table-bordered table-hover" id="tabel-data">
<thead>
<tr>
<th width="1%">No</th>
</tr>
</thead>
<tbody>
</tbody>
</table>
 </div>
Large modal -->
			<div class="modal fade bs-example-modal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-body">
							<p>One fine body…</p>
						</div>
					</div>
				</div>
			</div>    
						</div><!-- /.panel -->
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
<!-- bottom of file -->
<?php
	//include("layout_bottom.php");
?>