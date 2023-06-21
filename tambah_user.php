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
                        <h1 class="page-header">Data User</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->

				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal" action="user_insert.php" method="POST" enctype="multipart/form-data">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Tambah Data</h3></div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-sm-3">Id User</label>
										<div class="col-sm-4">
											<input type="text" name="id_user" onBlur="checkNppAvailability()" class="form-control" placeholder=" ID User" required>
											<span id="user-availability-status" style="font-size:12px;"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Nama User</label>
										<div class="col-sm-4">
											<input type="text" name="nama_user" class="form-control" placeholder="Nama User" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Hak Akses</label>
										<div class="col-sm-3">
											<select name="hak_akses" id="akses" class="form-control" required>
												<option value="" selected>--- Pilih Hak Akses ---</option>
                                            <option value="Polres">Polres</option>
                                            <option value="Satker">Satker</option>
                                            <option value="Anggota">Anggota Bid TIK</option>
                                            <option value="Atasan">KABID/KADIT/KARO</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Password</label>
										<div class="col-sm-4">
											<input type="text" name="password" class="form-control" placeholder="Password" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Foto</label>
										<div class="col-sm-3">
											<input type="file" name="foto_emp" class="form-control" accept="image/*" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Id Adm</label>
										<div class="col-sm-4">
											<input type="text" name="id_adm" class="form-control" placeholder=" id_adm" required>
										</div>
									</div>
									
									
								</div>
								<div class="panel-footer">
									<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
									<a href="user.php" class="btn btn-success">Batal</a>
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