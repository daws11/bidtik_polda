<?php
	include("sess_check.php");
	
	// deskripsi halaman
	$pagedesc = "Buat Pengajuan";
	$menuparent = "jarkom";
	include("layout_top.php");
	$now = date('Y-m-d');
	$id = $sess_Satkerid;
?>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Pengajuan Penggunaan Team Jarkom</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->

				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal" name="cuti" action="jarkom_insert.php" method="POST" enctype="multipart/form-data" onSubmit="return valid();">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Form Pengajuan</h3></div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-sm-3">No Pengajuan</label>
										<div class="col-sm-4">
											<input type="text" name="No_Pengajuan" onBlur="checkNppAvailability()" class="form-control" placeholder="No Pengajuan" required>
											<span id="user-availability-status" style="font-size:12px;"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Tanggal Pengajuan</label>
										<div class="col-sm-4">
											<input type="date" name="tgl_pengajuan" class="form-control" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Nama Kegiatan</label>
										<div class="col-sm-4">
											<input type="text" name="Kegiatan" class="form-control" placeholder="Nama Kegiatan" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Tanggal Kegiatan</label>
										<div class="col-sm-4">
											<input type="datetime-local" name="tgl_kegiatan" class="form-control" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Tempat Kegiatan</label>
										<div class="col-sm-4">
											<input type="text" name="tempat" class="form-control" placeholder="Tempat Kegiatan" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Nama/No Hp Penanggung Jawab Kegiatan</label>
										<div class="col-sm-4">
											<input type="text" name="kontak" class="form-control" placeholder="Nama/No Hp Penanggung Jawab Kegiatan" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Keterangan</label>
										<div class="col-sm-4">
											<textarea name="Keterangan" class="form-control" placeholder="Keterangan" rows="3" required></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">File Surat</label>
										<div class="col-sm-3">
											<input type="file" name="file" class="form-control" accept="file" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Id User</label>
										<div class="col-sm-4">
											<input type="text" name="id_user" class="form-control" placeholder=" ID User" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Diajukan Kepada</label>
										<div class="col-sm-4">
											<select name="id_user" id="id_user" class="form-control" required>
											<option value="" selected>======== Pilih  ========</option>
												<?php
													$mySql = "SELECT * FROM employee WHERE hak_akses='Anggota' AND Nama_user='Renmin' ORDER BY Nama_user";
													$myQry = mysqli_query($conn, $mySql);
													$dataAnggota = $result['id_user'];
													while ($AnggotaData = mysqli_fetch_array($myQry)) {
														if ($AnggotaData['id_user']== $dataAnggota) {
														$cek = " selected";
														} else { $cek=""; }
														echo "<option value='$AnggotaData[id_user]' $cek>".$AnggotaData[Nama_user]."</option>";
													}
												?>
											</select>
										</div>
									</div>
								</div>
								<div class="panel-footer">
									<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
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