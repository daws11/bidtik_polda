<?php
	include("sess_check.php");
	
	// deskripsi halaman
	$pagedesc = "Data RADIO HT";
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
                        <h1 class="page-header">Data RADIO HT</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->

				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal" action="Alkom_Insert.php" method="POST" enctype="multipart/form-data">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Registrasi RADIO HT</h3></div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-sm-3">Id User</label>
										<div class="col-sm-4">
											<input type="text" name="id_user" onBlur="checkNppAvailability()" class="form-control" placeholder=" ID User" required>
											<span id="user-availability-status" style="font-size:12px;"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Nama</label>
										<div class="col-sm-4">
											<input type="text" name="Nama" class="form-control" placeholder="Nama Pemegang Radio" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Pangkat/NRP</label>
										<div class="col-sm-4">
											<input type="text" name="Pangkat" class="form-control" placeholder="Pangkat/NRP" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Jabatan</label>
										<div class="col-sm-4">
											<input type="text" name="Jabatan" class="form-control" placeholder="Jabatan Pemegang Radio" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">No. Telp/Hp</label>
										<div class="col-sm-4">
											<input type="text" name="telp" class="form-control" placeholder="No. Telp/Hp Pemegang Radio" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">ID RADIO HT</label>
										<div class="col-sm-4">
											<input type="text" name="id_radio" class="form-control" placeholder="ID Radio HT" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Serial Number</label>
										<div class="col-sm-4">
											<input type="text" name="serial_number" class="form-control" placeholder="Serial Number Radio HT" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Kondisi</label>
										<div class="col-sm-3">
											<select name="kondisi" id="kondisi" class="form-control" required>
												<option value="" selected>--- Pilih Kondisi Radio HT ---</option>
                                            <option value="Barang Baru">Barang Baru</option>
                                            <option value="Rusak Ringan">Rusak Ringan</option>
                                            <option value="Rusak Berat">Rusak Berat</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Keterangan</label>
										<div class="col-sm-4">
											<textarea name="Keterangan" class="form-control" placeholder="Keterangan" rows="3" required></textarea>
										</div>
									</div>
									
									
								</div>
								<div class="panel-footer">
									<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
									<a href="Alkom.php" class="btn btn-success">Batal</a>
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