<?php
	include("sess_check.php");
	
	if(isset($_GET['id_user'])) {
		$sql = "SELECT * FROM employee WHERE id_user='". $_GET['id_user'] ."'";
		$ress = mysqli_query($conn, $sql);
		$data = mysqli_fetch_array($ress);
	}
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
						<form class="form-horizontal" action="user_update.php" method="POST" enctype="multipart/form-data">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Edit Data</h3></div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-sm-3"> ID User </label>
										<div class="col-sm-4">
											<input type="text" name="id_userlama" class="form-control" placeholder="ID User" value="<?php echo $data['id_user'] ?>" readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">ID User Baru (Abaikan jika tidak diubah)</label>
										<div class="col-sm-4">
											<input type="text" name="id_user" onBlur="checkNppAvailability()" class="form-control" placeholder="ID Baru (Abaikan Jika Tidak Ada Perubahan!)">
											<span id="user-availability-status" style="font-size:12px;"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Nama</label>
										<div class="col-sm-4">
											<input type="text" name="nama_user" class="form-control" placeholder="Nama" value="<?php echo $data['nama_user'] ?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Hak Akses</label>
										<div class="col-sm-3">
											<select name="hak_akses" id="akses" class="form-control" required>
												<option value="<?php echo $data['hak_akses'] ?>" selected><?php echo $data['hak_akses'] ?></option>
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
										<div class="col-sm-3">
											<input type="text" name="password" class="form-control" placeholder="password" value="<?php echo $data['password'] ?>" required>
										</div>
									</div>
										<div class="form-group">
										<label class="control-label col-sm-3">Aktif</label>
										<div class="col-sm-3">
											<select name="active" id="aktif" class="form-control" required>
												<option value="<?php echo $data['active']; ?>" selected><?php echo $data['active']; ?></option>
												<option value="Aktif">Aktif</option>
												<option value="Tidak Aktif">Tidak Aktif</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Foto (Abaikan Jika Tidak Diubah)</label>
										<div class="col-sm-3">
											<input type="file" name="foto_emp" class="form-control" accept="image/*">
										</div>
									</div>
								</div>
								<div class="panel-footer">
									<button type="submit" name="perbarui" class="btn btn-success">Update</button>
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