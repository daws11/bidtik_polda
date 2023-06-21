<?php
require_once"fungsiIO.php";
	include("sess_check.php");
	
	// deskripsi halaman
	$pagedesc = "DATA KAMTIBMAS KHUSUS";
	include("layout_top.php");
	include("dist/function/format_tanggal.php");
	include("dist/function/format_rupiah.php");
	
?>

<div id="page-wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<h1 class="page-header"><?php echo ucwords($_SESSION["nama_user"]);?> 
<sub><i>DATA KAMTIBMAS KHUSUS</i></sub>
</h1>
<div align="right">
<a href="laporan7.php">UMUM</a>  | <a href="laporan8.php">KHUSUS</a>
</div>
</div>
</div>

<div class="row">
<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
</div>

<div class="row"> 
<?php
$no = 1;
$Polsek=$_SESSION["nama_user"];
$TABEL="kamtibmas_khusus";
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
	

$k=0;
$arE=array();
$sqlc="select distinct(`nama_user`) from `employee` where `active` ='Aktif' and `hak_akses`='Polres' and (`nama_user` like '%Jakarta%' or `nama_user` like '%Seribu%') order by `nama_user` asc";
$arrc = getData($conn, $sqlc);
	foreach ($arrc as $dc) {
		$nama_user = $dc["nama_user"];
		$arE[$k]=$nama_user;
		$k++;
	}
	
$arJJ=array();
$jj=0;	 
$lap="";
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
	
	$arM=array();$h=0;
	for($n=0;$n<$k;$n++){
		$lpolsek=$arE[$n];
		$sqld="select (`No_Lp`) from $TABEL where Polsek='$lpolsek' and `Waktu` between '$awal' and '$ahir'";
			$jum0=getJuml($conn,$sqld);
			$arM[$h]=$jum0;
			$h++;
	}
		$jmin=min($arM);
		$jmax=max($arM);
		$jum2=(($jmax-$jmin)/2)+$jmin;
		//$sqld2="select (`No_Lp`) from $TABEL where Polsek like '%$Polsek%' and  `Waktu` between '$awal' and '$ahir'";
		//$jum2=getJuml($conn,$sqld2);
		
		$lap.="{ 'month': '$periode', 'min': $jmin, 'max': $jmax, 'avg': $jum2 },";
$no++;
}
 $lap=POT($lap); 

?>	 <link rel="stylesheet" href="jqwidgets/styles/jqx.base.css" type="text/css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1 minimum-scale=1" />	
    <script type="text/javascript" src="scripts/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxdraw.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxchart.core.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxcheckbox.js"></script>
    <script type="text/javascript" src="scripts/demos.js"></script>    

    <script type="text/javascript">
        $(document).ready(function () {
            var data = [<?php echo $lap;?>];

            var toolTipCustomFormatFn = function (value, itemIndex, serie, group, categoryValue, categoryAxis) {
                var dataItem = data[itemIndex];
                return '<DIV style="text-align:left"><b>Periode: ' +
                        categoryValue + '</b><br />Min: ' +
                        dataItem.min + ' Kasus<br />Max: ' +
                        dataItem.max + ' Kasus<br />Case: ' +
                        dataItem.avg + ' Kasus</DIV>';
            };

            // prepare jqxChart settings
            var settings = {
                title: "<?php echo ucwords($Polsek) ." Terhadap Semua Polres";?>",
                description: "<?php echo $gab;?>",
                enableAnimations: true,
                showLegend: true,
                padding: { left: 10, top: 5, right: 10, bottom: 5 },
                titlePadding: { left: 0, top: 0, right: 0, bottom: 10 },
                enableCrosshairs: true,
                source: data,
                colorScheme: 'scheme05',
                xAxis:
                {
                    textRotationAngle: 0,
                    dataField: 'month',
                    unitInterval: 1,
                    tickMarks: { 
                        visible: true,
                        step: 1,
                        color: '#888888'
                    },
                    gridLines: {
                        visible: true,
                        step: 1,
                        color: '#888888'
                    }
                },
                valueAxis:
                {
                    unitInterval: 5,
                    title: {text: 'Jumlah Case'},
                    tickMarks: {color: '#888888'},
                    minValue: -5,
                    maxValue: 30,
                    alternatingBackgroundColor: '#E5E5E5',
                    alternatingBackgroundColor2: '#F5F5F5',
                    alternatingBackgroundOpacity: 0.5
                },
                seriesGroups:
                    [
                        {
                            type: 'rangecolumn',
                            columnsGapPercent: 100,
                            toolTipFormatFunction: toolTipCustomFormatFn,
                            series: [
                                    { dataFieldTo: 'max', displayText: 'Case Range', dataFieldFrom: 'min', opacity: 1 }
                                ]
                        },
                        {
                            type: 'spline',
                            toolTipFormatFunction: toolTipCustomFormatFn,
                            series: [
                                    { dataField: 'avg', displayText: 'Value Case', opacity: 1, lineWidth: 2 }
                                ]
                        }

                    ]
            };

            $('#chartContainer').jqxChart(settings);

            var chart = $('#chartContainer').jqxChart('getInstance');

            $("#checkboxSwapAxis").jqxCheckBox({ checked: false });
            $("#checkboxSwapAxis").on('change', function (event) {
                var swap = event.args.checked;

                for (var i = 0; i < chart.seriesGroups.length; i++)
                    chart.seriesGroups[i].orientation = swap ? 'horizontal' : 'vertical';

                chart.refresh();
            });

        });
    </script>
</head>
<body class='default'>
    <div id='chartContainer' style="width:1250px; height:500px"></div>
    <div style='margin-top: 5px;' id='checkboxSwapAxis'>Swap X and Y axes</div>
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
include("layout_bottom.php");
?>