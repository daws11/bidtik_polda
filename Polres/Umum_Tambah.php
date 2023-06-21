<?php
	include("sess_check.php");
	require_once"../fungsiIO.php";
	// deskripsi halaman
	$pagedesc = "Data Kamtibmas Umum";
	$menuparent = "master";
	include("layout_top.php");
?>
<script type="text/javascript">
	function checkNppAvailability() {
	$("#loaderIcon").show();
	jQuery.ajax({
		url: "check_nppavailability.php",
		data:'id_user='+$("#id_user").val(),
		type: "POST",
		success:function(data){
			$("#user-availability-status").html(data);
			$("#loaderIcon").hide();
		},
		error:function (){}
	});
	}
</script>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                     <h1 class="page-header"><?php echo ucwords($_SESSION["nama_user"]);?> <sub><i>DATA KAMTIBMAS UMUM</i></sub></h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->

				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal" action="umum_insert.php" method="POST" enctype="multipart/form-data">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Tambah Data</h3></div>
								<div class="panel-body">
					
									<div class="form-group">
										<label class="control-label col-sm-3">No Lp</label>
										<div class="col-sm-4">
											<input type="text" name="No_Lp" class="form-control" placeholder="No_Lp" required>
										</div>
									</div>
					
									<div class="form-group">
										<label class="control-label col-sm-3">Kategori</label>
<?php
$TABEL="kamtibmas_umum";
$sqlc="select distinct(`Jenis_ppgk`) from $TABEL";
$arrc = getData($conn, $sqlc);
$gab="";
foreach ($arrc as $dc) {
	$Jenis_pggk = $dc["Jenis_ppgk"];
	$gab.="$Jenis_pggk\n";
}
?>
<div class="col-sm-4">
								<input type="text" name="Jenis_ppgk" class="form-control" placeholder="Jenis PPGK /Kategori Kasus" title="<?php echo $gab;?>" required>
										</div> 
										
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Waktu</label>
										<div class="col-sm-4">
											<input type="datetime-local" name="Waktu" class="form-control" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Pelapor</label>
										<div class="col-sm-4">
											<input type="text" name="Pelapor" class="form-control" placeholder="Pelapor" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Korban</label>
										<div class="col-sm-4">
											<input type="text" name="Korban" class="form-control" placeholder="Korban" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Alamat Pelapor/Korban</label>
										<div class="col-sm-4">
											<input type="text" name="Alamat" class="form-control" placeholder="Alamat" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Terlapor</label>
										<div class="col-sm-4">
											<input type="text" name="Terlapor" class="form-control" placeholder="Terlapor" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Lokasi Kejadian</label>
										<div class="col-sm-4">
											<input type="text" name="Lokasi" class="form-control" placeholder="Lokasi" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Motif / Berita Acara</label>
										<div class="col-sm-4">
											<input type="text" name="Motif" class="form-control" placeholder="Motif" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Kerugian / Kronologi /Rekonstruksi</label>
										<div class="col-sm-4">
											<input type="text" name="Kerugian" class="form-control" placeholder="Kerugian" required>
										</div>
									</div>								
								</div>
								<div class="panel-footer">
									<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
									<a href="Umum.php" class="btn btn-success">Batal</a>
								</div>
							</div><!-- /.panel -->
						</form>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
<!-- bottom of file -->
<?php
	include("layout_bottom.php");
?>