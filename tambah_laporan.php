<?php
	include("sess_check.php");
	
	// deskripsi halaman
	$pagedesc = "Data User";
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
                        <h1 class="page-header">Laporan</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->

				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal" action="laporan_insert.php" method="POST" enctype="multipart/form-data">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Tambah Laporan</h3></div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-sm-3">Jenis Kejahatan</label>
										<div class="col-sm-3">
											<select name="..." id="..." class="form-control" required>
												<option value="" selected>--- Pilih Jelis Kejahatan ---</option>
                                            <option value="...">Umum</option>
                                            <option value="...">Khusus</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">No LP</label>
										<div class="col-sm-4">
											<input type="text" name="No_Lp" class="form-control" placeholder="..." required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Polse</label>
										<div class="col-sm-4">
											<input type="text" name="Polsek" class="form-control" placeholder="..." required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Kategori</label>
										<div class="col-sm-4">
											<input type="text" name="Motif" class="form-control" placeholder="..." required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Waktu</label>
										<div class="col-sm-4">
											<input type="text" name="Waktu" class="form-control" placeholder="..." required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Pelapor</label>
										<div class="col-sm-4">
											<input type="text" name="Pelapor" class="form-control" placeholder="..." required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Korban</label>
										<div class="col-sm-4">
											<input type="text" name="Korban" class="form-control" placeholder="..." required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Terlapor</label>
										<div class="col-sm-4">
											<input type="text" name="Terlapor" class="form-control" placeholder="..." required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Lokasi</label>
										<div class="col-sm-4">
											<input type="text" name="Lokasi" class="form-control" placeholder="..." required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Kerugian</label>
										<div class="col-sm-4">
											<input type="text" name="Kerugian" class="form-control" placeholder="..." required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Bukti Foto</label>
										<div class="col-sm-3">
											<input type="file" name="..." class="form-control" accept="image/*" required>
										</div>
									</div>
									
								</div>
								<div class="panel-footer">
									<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
									<a href="lapcari.php" class="btn btn-success">Batal</a>
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