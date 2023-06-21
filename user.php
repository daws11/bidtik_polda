<?php
	include("sess_check.php");
	
	// deskripsi halaman
	$pagedesc = "Data User";
	include("layout_top.php");
	include("dist/function/format_tanggal.php");
	include("dist/function/format_rupiah.php");
?>
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
						<div class="panel panel-default">
							<div class="panel-heading">
								<a href="tambah_user.php" class="btn btn-success">Tambah</a>
							</div>
						</div>
					</div>
					<div class="panel-body">
											
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#examplec').DataTable();
} );
</script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
		<table id="examplec" class="display" style="width:100%">										<thead>
										<tr>
											<th width="1%">No</th>
											<th width="5%">Id User</th>
											<th width="15%">Nama User</th>
											<th width="10%">Hak Akses</th>
											<th width="10%">Password</th>
											<th width="5%">Aktif</th>
											<th width="5%">ID Admin</th>
											<th width="15%">Tindakan</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i = 1;
											$sql = "SELECT * FROM employee ORDER BY nama_user ASC";
											$ress = mysqli_query($conn, $sql);
											while($data = mysqli_fetch_array($ress)) {
												echo '<tr>';
												echo '<td class="text-center">'. $i .'</td>';
												echo '<td class="text-center">'. $data['id_user'] .'</td>';
												echo '<td class="text-center">'. $data['nama_user'] .'</td>';
												echo '<td class="text-center">'. $data['hak_akses'] .'</td>';
												echo '<td class="text-center">'. $data['password'] .'</td>';
												echo '<td class="text-center">'. $data['active'] .'</td>';
												echo '<td class="text-center">'. $data['id_adm'] .'</td>';
												echo '<td class="text-center">
												 	  <a href="user_edit.php?id_user='. $data['id_user'] .'" class="btn btn-warning btn-xs">Edit</a>';?>
													  <a href="user_hapus.php?id_user=<?php echo $data['id_user'];?>" onclick="return confirm('Apakah anda yakin akan menghapus <?php echo $data['nama_user'];?>?');" class="btn btn-danger btn-xs">Hapus</a></td>
												<?php
													  echo '</td>';
												echo '</tr>';												
												$i++;
											}
										?>
									</tbody>
								</table>
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
<?php
	include("layout_bottom.php");
?>