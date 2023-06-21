<?php
	include("sess_check.php");
	
	// deskripsi halaman
	$pagedesc = "Data KAMTIBMAS UMUM";
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
                        <h1 class="page-header">Data KAMTIBMAS UMUM</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<a href="Umum_Tambah.php" class="btn btn-success">Tambah</a>
							</div>
						</div>
					</div>
					<div class="panel-body">
								<table class="table table-striped table-bordered table-hover" id="tabel-data">
									<thead>
										<tr>
											<th width="1%">No</th>
											<th width="10%">No LP</th>
											<th width="15%">Polsek yang Menangani</th>
											<th width="10%">Jenis Peristiwa</th>
											<th width="10%">Waktu</th>
											<th width="5%">Pelapor</th>
											<th width="5%">Korban</th>
											<th width="10%">Alamat</th>
											<th width="10%">Terlapor</th>
											<th width="10%">Lokasi</th>
											<th width="10%">Motif</th>
											<th width="10%">Kerugian</th>
											<th width="10%">Tindakan</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i = 1;
											$sql = "SELECT * FROM employee ORDER BY id_user ASC";
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
<!-- <script type="text/javascript">
	$(document).ready(function() {
		$('#tabel-data').DataTable({
			"responsive": true,
			"processing": true,
			"columnDefs": [
				{ "orderable": false, "targets": [6] }
			]
		});
		
		$('#tabel-data').parent().addClass("table-responsive");
	});
</script>
	<script>
		var app = {
			code: '0'
		};
		
		$('[data-load-code]').on('click',function(e) {
					e.preventDefault();
					var $this = $(this);
					var kode = $this.data('load-code');
					if(kode) {
						$($this.data('remote-target')).load('user_detail.php?code='+code);
						app.code = code;
						
					}
		});		
    </script> -->
<?php
	include("layout_bottom.php");
?>