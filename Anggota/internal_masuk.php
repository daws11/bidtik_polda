<?php
	include("sess_check.php");
	
	// deskripsi halaman
	$pagedesc = "internal";
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
                        <h1 class="page-header">Surat Masuk Internal</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<a href="tambah_internal_masuk.php" class="btn btn-success">Tambah</a>
								<a href="beranda.php" class="btn btn-success">Back</a>
							</div>
						</div>
					</div>
					<div class="panel-body">
								<table class="table table-striped table-bordered table-hover" id="tabel-data">
									<thead>
										<tr>
											<th width="1%">No</th>
											<th width="15%">Tanggal Surat</th>
											<th width="20%">No Surat</th>
											<th width="20%">Dari</th>
											<th width="10%">Keterangan</th>
											<th width="10%">Untuk</th>
											<th width="25%">Tindakan</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i = 1;
											$sql = "SELECT * FROM internal_masuk
													INNER join employee on internal_masuk.id_user=employee.id_user
											";
											$ress = mysqli_query($conn, $sql);
											while($data = mysqli_fetch_array($ress)) {
												echo '<tr>';
												echo '<td class="text-center">'. $i .'</td>';
												echo '<td class="text-center">'. $data['tgl_surat'] .'</td>';
												echo '<td class="text-center">'. $data['No_Surat'] .'</td>';
												echo '<td class="text-center">'. $data['Dari'] .'</td>';
												echo '<td class="text-center">'. $data['Keterangan'] .'</td>';
												echo '<td class="text-center">'. $data['Untuk'] .'</td>';
												echo '<td class="text-center">
													  <a href="Alkom_edit.php?id_user='. $data['id_user'] .'" class="btn btn-warning btn-xs">Edit</a>';?>
													  <a href="Alkom_Hapus.php?id_user=<?php echo $data['id_user'];?>" onclick="return confirm('Apakah anda yakin akan menghapus <?php echo $data['id_radio'];?>?');" class="btn btn-danger btn-xs">Hapus</a></td>
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