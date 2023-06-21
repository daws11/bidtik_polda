<?php
	include("sess_check.php");
	
	// deskripsi halaman
	$pagedesc = "Grafik";
	include("layout_top.php");
?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Grafik Laporan</h1>
            </div>
        </div>
				
        <?php
$sql1 = "select `id_user` from `kamtibmas_khusus` where `Jenis_ppgk`='Penganiayaan'";
$jum1 = getJum($conn, $sql1);

// $sql2 = "select `id_user` from `kamtibmas_khusus` where `status_pelaku`='Mahasiswa/i'";
// $jum2 = getJum($conn, $sql2);

// $sql3 = "select `id_user` from `kamtibmas_khusus` where `status_pelaku`='Staff/Pegawai'";
// $jum3 = getJum($conn, $sql3);

// $sql4 = "select `id_user` from `kamtibmas_khusus` where `status_pelaku`='Tidak Tahu'";
// $jum4 = getJum($conn, $sql4);

// $gab = "['Dosen',$jum1],['Mahasiswa/i',$jum2],['Staff/Pegawai',$jum3],['Tidak Tahu',$jum4]";

$gab = "['Penganiayaan',$jum1]";
?>
 
		
<div class="row">
	<div class="col-lg-12">
	

<?php  
$mydata="";
$nom=0;
 $sqlc="select distinct(`Waktu`) from `kamtibmas_khusus` order by `Waktu` asc";
 	$arrc=getData($conn,$sqlc);
		foreach($arrc as $dc) {	
		$nom++;
		$Waktu=$dc["Waktu"];
			 $sql="select * from `kamtibmas_khusus` where  `Waktu`='$Waktu'";
				$jum=getJum($conn,$sql);	
			$mydata.="['$Waktu',$jum],";
		}
$mydata=substr($mydata,0,strlen($mydata)-1);

?> 
<html>
<head>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
		google.charts.load("current", {
			packages: ["corechart"]
		});
		google.charts.setOnLoadCallback(drawChart);

		function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Task', 'Jumlah Laporan'], <?php echo $gab; ?>
			]);

			var options = {
				title: 'Presentase Laporan',
				is3D: true,
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
			chart.draw(data, options);
		}
	</script>
</head>

<body>
	<center><div id="piechart_3d" style="width: 1000px; height: 500px;"></div>
</body>

</html>
	
            </div>
        </div>
    </div>
</div>

</body>
<?php
	include("layout_bottom.php");
?>

<?php
function process($conn, $sql)
{
	$s = false;
	$conn->autocommit(FALSE);
	try {
		$rs = $conn->query($sql);
		if ($rs) {
			$conn->commit();
			$last_inserted_id = $conn->insert_id;
			$affected_rows = $conn->affected_rows;
			$s = true;
		}
	} catch (Exception $e) {
		echo 'fail: ' . $e->getMessage();
		$conn->rollback();
	}
	$conn->autocommit(TRUE);
	return $s;
}

function getJum($conn, $sql)
{
	$rs = $conn->query($sql);
	$jum = $rs->num_rows;
	$rs->free();
	return $jum;
}

function getField($conn, $sql)
{
	$rs = $conn->query($sql);
	$rs->data_seek(0);
	$d = $rs->fetch_assoc();
	$rs->free();
	return $d;
}

function getData($conn, $sql)
{
	$rs = $conn->query($sql);
	$rs->data_seek(0);
	$arr = $rs->fetch_all(MYSQLI_ASSOC);
	//foreach($arr as $row) {
	//  echo $row['nama_kelas'] . '*<br>';
	//}

	$rs->free();
	return $arr;
}

function getPengguna($conn, $kode)
{
	$field = "nama_pengguna";
	$sql = "SELECT `$field` FROM `tb_pengguna` where `id_pengguna`='$kode'";
	$rs = $conn->query($sql);
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
	return $row[$field];
}


?>
