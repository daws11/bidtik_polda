<?php
	include("sess_check.php");
	
	// deskripsi halaman
	$pagedesc = "internnal";
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
                        <h1 class="page-header">Data Surat Keluar</h1>
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
										<label class="control-label col-sm-3">Tanggal Surat</label>
										<div class="col-sm-4">
											<input type="date" name="tgl_surat" class="form-control" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">No Surat</label>
										<div class="col-sm-4">
											<input type="text" name="No_Surat" class="form-control" placeholder="No Surat" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Dari</label>
										<div class="col-sm-3">
											<input type="text" name="Dari" class="form-control" placeholder="Dari" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Keterangan</label>
										<div class="col-sm-4">
											<input type="text" name="Keterangan" class="form-control" placeholder="Keterangan" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Untuk</label>
										<div class="col-sm-4">
											<input type="text" name="Untuk" class="form-control" placeholder="Untuk" required>
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