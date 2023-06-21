<?php
	include("sess_check.php");
	
	if(isset($_GET['id_radio'])) {
		$sql =  "SELECT tabel_alkom.*, employee. * From tabel_alkom, employee WHERE tabel_alkom.id_user=employee.id_user AND tabel_alkom.id_radio='". $_GET['id_radio'] ."'";
		$ress = mysqli_query($conn, $sql);
		$data = mysqli_fetch_array($ress);
	}
	// deskripsi halaman
	$pagedesc = "Data Radio HT";
	$menuparent = "master";
	include("layout_top.php");
?>
<script type="text/javascript">
	function checkNppAvailability() {
	$("#loaderIcon").show();
	jQuery.ajax({
		url: "check_nppavailability.php",
		data:'id_radio='+$("#id_radio").val(),
		type: "_GET",
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
                        <h1 class="page-header">Data Registrasi RADIO HT</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->

				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal" action="Alkom_Update.php" method="POST" enctype="multipart/form-data">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Edit Data</h3></div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-sm-3"> ID USER </label>
										<div class="col-sm-4">
											<input type="text" name="id_user" class="form-control" placeholder="ID USER" value="<?php echo $data['id_user'] ?>" readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Nama</label>
										<div class="col-sm-4">
											<input type="text" name="Nama" class="form-control" placeholder="Nama" value="<?php echo $data['Nama'] ?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Pangkat/NRP</label>
										<div class="col-sm-4">
											<input type="text" name="Pangkat" class="form-control" placeholder="Pangkat/NRP" value="<?php echo $data['Pangkat'] ?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Jabatan</label>
										<div class="col-sm-4">
											<input type="text" name="Jabatan" class="form-control" placeholder="Jabatan" value="<?php echo $data['Jabatan'] ?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">No. Telp/Hp</label>
										<div class="col-sm-4">
											<input type="text" name="telp" class="form-control" placeholder="No. Telp/Hp" value="<?php echo $data['telp'] ?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">ID RADIO</label>
										<div class="col-sm-4">
											<input type="text" name="id_radiolama" class="form-control" placeholder="ID USER" value="<?php echo $data['id_radio'] ?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">ID RADIO Baru (Abaikan jika tidak diubah)</label>
										<div class="col-sm-4">
											<input type="text" name="id_radio" onBlur="checkNppAvailability()" class="form-control" placeholder="ID RADIO Baru (Abaikan Jika Tidak Ada Perubahan!)">
											<span id="user-availability-status" style="font-size:12px;"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Serial Number</label>
										<div class="col-sm-4">
											<input type="text" name="serial_number" class="form-control" placeholder=" serial_number" value="<?php echo $data['serial_number'] ?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Kondisi</label>
										<div class="col-sm-3">
											<select name="kondisi" id="kondisi" class="form-control" required>
												<option value="<?php echo $data['kondisi'] ?>" selected><?php echo $data['kondisi'] ?></option>
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
											<textarea name="Keterangan" class="form-control" placeholder="Keterangan" rows="3" value="<?php echo $data['Keterangan'] ?>" required><?php echo $data['Keterangan'] ?></textarea>
										</div>
									</div>
								</div>
								<div class="panel-footer">
									<button type="submit" name="perbarui" class="btn btn-success">Update</button>
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