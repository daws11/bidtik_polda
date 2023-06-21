<?php

	include("sess_check.php");
	require_once"../fungsiIO.php";
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
<a href="laporan5.php">UMUM</a>  | <a href="laporan6.php">KHUSUS</a>
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
		$sqld="select No_Lp from $TABEL where `Waktu` between '$awal' and '$ahir'";
		$jumlah=getJuml($conn,$sqld);
		$lap.="{ Periode: '$periode', Jumlah: $jumlah },";
$no++;
}
 $lap=POT($lap); 

?>	 
    <link rel="stylesheet" href="../jqwidgets/styles/jqx.base.css" type="text/css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1 minimum-scale=1" />	
    <script type="text/javascript" src="../scripts/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxdraw.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxchart.core.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxradiobutton.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxcheckbox.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxslider.js"></script>
    <script type="text/javascript" src="../scripts/demos.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            var data = [<?php echo $lap;?>];

            var settings = {
                title: "<?php echo $pagedesc." (Total Data)";?>",
                description: "<?php echo $gab;?>",
                enableAnimations: true,
                showLegend: true,
                padding: { left: 5, top: 5, right: 15, bottom: 5 },
                titlePadding: { left: 90, top: 0, right: 0, bottom: 10 },
                source: data,
                xAxis:
                    {
                        padding: { top: 0, bottom: 0 },
                        labels: { angle: 0 },
                        dataField: 'Periode',
                        displayText: 'Periode',
                        valuesOnTicks: false,
                        gridLines: { color: '#CDCDCD'},
                        tickMarks: { color: '#CDCDCD'}
                    },
                colorScheme: 'scheme04',
                valueAxis:
                            {
                                position: 'right',
                                padding: { left: 0, right: 0 },
                                title: { text: '<br><br>Case'},
                                labels: {
                                    visible: true,
                                    angle: 0,
                                    formatSettings: { decimalPlaces: 0, sufix: ' Case' }
                                },
                                tickMarks: {
                                    visible: true,
                                    //dashStyle: '2,2',
                                    color: '#CDCDCD',
                                    size: 5
                                },
                                gridLines: {
                                    visible: true,
                                    color: '#CDCDCD',
                                    //dashStyle: '2,2' 
                               },
                               alternatingBackgroundColor: '#EFEFEF',
                               alternatingBackgroundColor2: '#CECECE',
                               alternatingBackgroundOpacity: 0.2
                            },
                seriesGroups:
                [
                        {
                            type: 'stepline',
                            series: [
                                    { formatSettings: { decimalPlaces: 0 }, dataField: 'Jumlah', displayText: 'Total Case', showLabels: true, symbolType: 'circle' }
                                ]
                        }
                ]
            };

            $('#chartContainer').jqxChart(settings);
            var chartInstance = $('#chartContainer').jqxChart('getInstance');
            chartInstance.enableAnimations = false;

            // valueAxis left padding change handler
            $('#sliderValueAxisLeftPadding').jqxSlider({ min: 0, max: 50, ticksFrequency: 5, value: 0, step: 1, mode: 'fixed', width: '250px' })
                .on('change', function (event) {
                    settings.valueAxis.padding.left = event.args.value;
                    chartInstance.refresh();
                });

            // valueAxis right padding change handler
            $('#sliderValueAxisRightPadding').jqxSlider({ min: 0, max: 50, ticksFrequency: 5, value: 0, step: 1, mode: 'fixed', width: '250px' })
                .on('change', function (event) {
                    settings.valueAxis.padding.right = event.args.value;
                    chartInstance.refresh();
                });

            // valueAxis labels angle change handler
            $('#sliderValueAxisAngle').jqxSlider({ min: 0, max: 360, ticksFrequency: 30, value: 0, step: 1, mode: 'fixed', width: '250px' })
                .on('change', function (event) {
                    settings.valueAxis.labels.angle = event.args.value;
                    chartInstance.refresh();
                });

            // xAxis top padding change handler
            $('#sliderXAxisTopPadding').jqxSlider({ min: 0, max: 50, ticksFrequency: 5, value: 0, step: 1, mode: 'fixed', width: '250px' })
                .on('change', function (event) {
                    settings.xAxis.padding.top = event.args.value;
                    chartInstance.refresh();
                });

            // xAxis bottom padding change handler
            $('#sliderXAxisBottomPadding').jqxSlider({ min: 0, max: 50, ticksFrequency: 5, value: 0, step: 1, mode: 'fixed', width: '250px' })
                .on('change', function (event) {
                    settings.xAxis.padding.bottom = event.args.value;
                    chartInstance.refresh();
                });

            // xAxis labels angle change handler
            $('#sliderXAxisAngle').jqxSlider({ min: 0, max: 360, ticksFrequency: 30, value: 0, step: 1, mode: 'fixed', width: '250px' })
                .on('change', function (event) {
                    settings.xAxis.labels.angle = event.args.value;
                    chartInstance.refresh();
                });


            // valueAxis left position selection
            $("#btnLeft").jqxRadioButton({ width: 60, height: 25, checked: false, groupName: 'valueAxis'}).
                on('change', function (event) {
                    if (event.args.checked)
                    {
                        settings.valueAxis.position = 'left';
                        chartInstance.refresh();
                    }
                });

            // valueAxis right position selection
            $("#btnRight").jqxRadioButton({ width: 60, height: 25, checked: true, groupName: 'valueAxis'}).
                on('change', function (event) {
                    if (event.args.checked)
                    {
                        settings.valueAxis.position = 'right';
                        chartInstance.refresh();
                    }
                });

            // xAxis top position selection
            $("#btnTop").jqxRadioButton({ width: 60, height: 25, checked: false, groupName: 'xAxis'}).
                on('change', function (event) {
                    if (event.args.checked)
                    {
                        settings.xAxis.position = 'top';
                        chartInstance.refresh();
                    }
                });

            // xAxis bottom position selection
            $("#btnBottom").jqxRadioButton({ width: 60, height: 25, checked: true, groupName: 'xAxis'}).
                on('change', function (event) {
                    if (event.args.checked)
                    {
                        settings.xAxis.position = 'bottom';
                        chartInstance.refresh();
                    }
                });

            $("#btnValueAxisFlip").jqxCheckBox({  height: 25, hasThreeStates: false, checked: false});
            $("#btnValueAxisFlip").on('change', function (event) {
                    settings.valueAxis.flip = event.args.checked;
                    chartInstance.refresh();
                });

            $("#btnXAxisFlip").jqxCheckBox({  height: 25, hasThreeStates: false, checked: false});
            $("#btnXAxisFlip").on('change', function (event) {
                    settings.xAxis.flip = event.args.checked;
                    chartInstance.refresh();
                });
                
        });
    </script>
</head>
<body style="font-family: Verdana; font-size: 13px;">
    <div id='chartContainer' style="width:1200px; height:500px">
    </div>
    
    <table style="padding-left: 30px; padding-top: 10px;">
        <tr style="height:50px;">
            <td style="width:300px"><b>Value axis properties:</b</td>
            <td><b>xAxis properties:</b></td>
        </tr>
        <tr>
            <td>Left padding:<div id="sliderValueAxisLeftPadding"></div></td>
            <td>Top padding:<div id="sliderXAxisTopPadding"></div></td>
        </tr>
        <tr>
            <td>Right padding:<div id="sliderValueAxisRightPadding"></div></td>
            <td>Bottom padding:<div id="sliderXAxisBottomPadding"></div></td>
        </tr>
        <tr>
            <td>Labels angle:<div id="sliderValueAxisAngle"></div></td>
            <td>Labels angle:<div id="sliderXAxisAngle"></div></td>
        </tr>
        <tr>
            <td>Position:
            <table><tr>
            <td><div style='margin-left: 10px;' id="btnLeft">Left</div></td>
            <td><div style='margin-left: 10px;' id="btnRight">Right</div></td>
            </tr></table>
            </td>
            <td>Position:
            <table><tr>
            <td><div style='margin-left: 10px;' id="btnTop">Top</div></td>
            <td><div style='margin-left: 10px;' id="btnBottom">Bottom</div></td>
            </tr></table>
            </td>
        </tr>
        <tr>
            <td>
            <div id="btnValueAxisFlip">Flip valueAxis positions</div>
            </td>
            <td>
            <div id="btnXAxisFlip">Flip xAxis positions</div>
            </td>
        </tr>
    </table>
    
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