<?php
	include("sess_check.php");
	
	// deskripsi halaman
	$pagedesc = "Laporan";
	include("fungsiIO.php");
	include("layout_top.php");
	include("dist/function/format_tanggal.php");
	include("dist/function/format_rupiah.php");
	
$awal=date("dd/mm/yyyy");	
$akhir=date("dd/mm/yyyy");	
?> 
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
						<div align="right">
						<a href="laporancari.php">
						Laporan Kamtibmas Umum</a> | 
						<a href="laporancari2.php">Khusus</a>
						</div></h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-body">
<form method="get" name="laporan" onSubmit="return valid();"> 
<div class="form-group">
<div class="col-sm-4">
<label>Tanggal Awal</label>
<input type="date" class="form-control" value="<?php echo $awal;?>" name="awal" placeholder="From Date(dd/mm/yyyy)" required>
</div>
<div class="col-sm-4">
<label>Tanggal Akhir</label>
<input type="date" class="form-control"  value="<?php echo $awal;?>" name="akhir" placeholder="To Date(dd/mm/yyyy)" required>
</div>
<div class="col-sm-4">
<label>&nbsp;</label><br/>
<input type="submit" name="submit" value="Lihat Laporan" class="btn btn-primary">
</div>
</div>
</form>
							</div>
						</div>
<?php
$TABLE="kamtibmas_umum";
 $sql = "SELECT * from $TABLE  order by Waktu asc";	
$lap="<h2>Data Kamtibmas Umum</h2>"; 
if(isset($_GET['submit'])){
$no=0;
$mulai 	 = $_GET['awal'];
$selesai = $_GET['akhir'];
//$sql = "SELECT * from kamtibmas_umum where Waktu between '$mulai' and '$selesai' orer by Waktu asc";
//$query = mysqli_query($conn,$sql);

//where Waktu between '$mulai' and '$selesai'
	 $sql = "SELECT * from $TABLE where  Waktu between '$mulai' and '$selesai' order by Waktu asc";		
	$w1=TGLL($mulai);
	$w2=TGLL($selesai);
	$lap="<h2>Hasil Pencarian Data Kamtibmas Umum $w1 s/d $w2</h2>";
}
echo $lap;
?>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-body">
								<table class="table table-striped table-bordered table-hover" id="tabel-data">
									<thead>
										<tr>
											<th width="1%">No</th>
											<th width="1%">No LP</th>
											<th width="5%">Kategori</th>
											<th width="10%">Waktu</th>
											<th width="5%">Pelapor</th>
											<th width="5%">Korban</th>
											<th width="10%">Terlapor</th>
											<th width="10%">Lokasi</th>
											<th width="10%">Kerugian</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i = 1;
												
											$ress = mysqli_query($conn, $sql);
											while($data = mysqli_fetch_array($ress)) {
												$wkt= $data['Waktu'];
												$arw=explode(" ",$wkt);
												$tgl=TGLL($arw[0]);
												$jam=$arw[1];
												$waktu="$tgl $jam Wib";
												echo '<tr>';
												echo '<td class="text-center">'. $i .'</td>';
												echo '<td class="text-center"><label title="'.$data['Motif'].'">'. $data['No_Lp'] .'</label></td>';
												echo '<td class="text-center">'. $data['Jenis_ppgk'].'</td>';
												echo '<td class="text-center">'. $waktu.'</td>';
												echo '<td class="text-center">'. $data['Pelapor'] .'</td>';
												echo '<td class="text-center">'. $data['Korban'] .'</td>';
												echo '<td class="text-center">'. $data['Terlapor'] .'</td>';
												echo '<td class="text-center"><small>'. $data['Lokasi'] .'</small></td>';
												echo '<td class="text-center">'. $data['Kerugian'] .'</td>';
												?>
													  
												<?php
													  echo '</td>';
												echo '</tr>';												
												$i++;
											}
										?>
									</tbody>
								</table>
							<div class="form-group">
									<a href="laporan_cetak.php?awal=<?php echo $mulai;?>&akhir=<?php echo $selesai;?>" target="_blank" class="btn btn-warning">Cetak</a>
							</div>
							</div>
			<!-- Large modal -->
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
<script type="text/javascript">
	$(document).ready(function() {
		$('#tabel-data').DataTable({
			"responsive": true,
			"processing": true,
			"columnDefs": [
				{ "orderable": false, "targets": [4] }
			]
		});
		
		$('#tabel-data').parent().addClass("table-responsive");
	});
</script>
<script>
		var app = {
			code: '0'
		};
</script>
</div>
</div>
</body>
<?php
	include("layout_bottom.php");
?>