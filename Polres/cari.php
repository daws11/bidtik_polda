<?php
	include("sess_check.php");
		// deskripsi halaman
	 if(isset($_GET['id_radio'])) {
        $sql =  "SELECT * From tabel_alkom WHERE id_radio='". $_GET['id_radio'] ."'";
        $ress = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($ress);
    }
	$pagedesc = "Pengajuan Perbaikan Radio HT";
	$menuparent = "master";
	include("layout_top.php");
?>
<script type="text/javascript">
	function checkNppAvailability() {
	$("#loaderIcon").show();
	jQuery.ajax({
		url: "check_nppavailability.php",
		data:'id_radio='+$("#id_radio").val(),
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
                        <h1 class="page-header">Pengajuan Perbaikan Radio HT</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->

				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal" action="Alkom_Update.php" method="POST" enctype="multipart/form-data">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Input Data</h3></div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-sm-3">Cari ID Radio</label>
										<div class="col-sm-4">
											<input type="text" name="id_radio" class="form-control" placeholder="ID RADIO" id="id_radio">
											<a href="Cari.php" class="btn btn-success">Cari</a>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Tanggal Pengajuan</label>
										<div class="col-sm-4">
											<input type="date" name="tgl_pengajuan" class="form-control" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">No Pengajuan</label>
										<div class="col-sm-4">
											<input type="text" name="No_Pengajuan" class="form-control" placeholder=" No Pengajuan" value="" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">ID Radio</label>
										<div class="col-sm-4">
											<input type="text" name="id_radio" class="form-control" placeholder="ID RADIO" value="" readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Nama</label>
										<div class="col-sm-4">
											<input type="text" name="Nama" class="form-control" placeholder="Nama" value="" readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Pangkat/NRP</label>
										<div class="col-sm-4">
											<input type="text" name="Pangkat" class="form-control" placeholder="Pangkat/NRP" value="" readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Jabatan</label>
										<div class="col-sm-4">
											<input type="text" name="Jabatan" class="form-control" placeholder="Jabatan" value="" readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">No. Telp/Hp</label>
										<div class="col-sm-4">
											<input type="text" name="telp" class="form-control" placeholder="No. Telp/Hp" value="" readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Serial Number</label>
										<div class="col-sm-4">
											<input type="text" name="serial_number" class="form-control" placeholder=" serial_number" value="" readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Kondisi</label>
										<div class="col-sm-3">
											<select name="kondisi" id="kondisi" class="form-control" required>
												<option value="<?php echo $data['kondisi'] ?>" selected></option>
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