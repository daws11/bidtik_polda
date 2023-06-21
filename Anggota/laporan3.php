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
<a href="laporan3.php">UMUM</a>  | <a href="laporan4.php">KHUSUS</a>
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

$var1="{ name: 'Periode', type: 'string' },";

$sqlc="select distinct(`Jenis_ppgk`) from $TABEL";
$arrc = getData($conn, $sqlc);
	$i=0;
	$lap2="";
	$lap3="";
	foreach ($arrc as $dc) {
		$Jenis_pggk = $dc["Jenis_ppgk"];
		$arJ[$i]=$Jenis_pggk;
		$lap2.="{ dataField: '$Jenis_pggk', displayText: '$Jenis_pggk' },";
		$lap3.="{ text: '$Jenis_pggk',width: '10%', datafield: '$Jenis_pggk' },";
		$var1.="{ name: '$Jenis_pggk', type: 'string' },";
		$i++;
	}
	$lap2=POT($lap2);
	$lap3=POT($lap3);
	$var1=POT($var1);

$arJJ=array();
$jj=0;	
$lap1="";
$per="";
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
	$per.="\"$periode\",";
	if($no==1){$gab.=$periode." s/d ";}
	else if($no==$jum){$gab.=$periode;}
	
	$lap1.="{ Periode: '$periode', ";
		for($j=0;$j<$i;$j++){
			$Jenis_ppgk=$arJ[$j];
			$sqld="select No_Lp from $TABEL where `Jenis_ppgk`='$Jenis_ppgk' and `Waktu` between '$awal' and '$ahir'";
			$jumlah=getJuml($conn,$sqld);
			$arJJ[$jj][$j]=$jumlah;
			$lap1.="'$Jenis_ppgk': $jumlah,";
		}
		$lap1=POT($lap1);
		$lap1.="},";
		$jj++;
	//echo"<tr><td>$no. #$waktu $awal s/d $ahir : $jumlah";
$no++;
}
$lap1=POT($lap1);
$per=POT($per);


?>	
    <link rel="stylesheet" href="../jqwidgets/styles/jqx.base.css" type="text/css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1 minimum-scale=1" />	
    <script type="text/javascript" src="../scripts/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxdraw.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxchart.core.js"></script>
    <script type="text/javascript" src="../scripts/demos.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxcheckbox.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {

            // prepare chart data as an array
            var sampleData = [<?php echo $lap1;?>];

            // prepare jqxChart settings
            var settings = {
                title: "<?php echo $pagedesc;?>",
                description: "<?php echo $gab;?>",
                enableAnimations: true,
                showLegend: true,
                padding: { left: 5, top: 5, right: 5, bottom: 5 },
                titlePadding: { left: 40, top: 0, right: 0, bottom: 10 },
                source: sampleData,
                rtl: true,
                colorScheme: 'scheme01',
                xAxis:
                    {
                        dataField: 'Periode',
                        unitInterval: 1,
                        tickMarks:
                        { visible: true,
                            interval: 1,
                            color: '#CACACA'
                        },
                        gridLines: { visible: false,
                            interval: 1,
                            color: '#CACACA'
                        },
                        axisSize: 'auto'
                    },
                seriesGroups:
                    [
                        {
                            type: 'stackedcolumn',
                            columnsGapPercent: 100,
                            seriesGapPercent: 5,
                            valueAxis:
                            {
                                minValue: 0,
                                maxValue: 100,
                                unitInterval: 10,
                                visible: true,
                                title: { text: 'Time in minutes' },
                                tickMarks: {color: '#CACACA'},
                                gridLines: {color: '#CACACA'},
                                axisSize: 'auto',
                            },
                            series: [<?php echo $lap2;?> ]
                        }
                    ]
            };

            // setup the chart
            $('#chartContainer').jqxChart(settings);
        });
    </script>
</head>
<body class='default'>
    <div id='chartContainer' style="width: 1150px; height: 500px"></div>
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