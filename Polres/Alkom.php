<?php
	include("sess_check.php");
	
	// deskripsi halaman
	$pagedesc = "Data Radio HT";
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
                        <h1 class="page-header">Data Radio HT</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<a href="Alkom_Tambah.php" class="btn btn-success">Tambah</a>
								<a href="beranda.php" class="btn btn-success">Back</a>
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
		<table id="examplec" class="display" style="width:100%">			
									<thead>
										<tr>
											<th width="1%">No</th>
											<th width="15%">Nama</th>
											<th width="20%">Pangkat/NRP</th>
											<th width="20%">Jabatan</th>
											<th width="10%">No. Telp/Hp</th>
											<th width="10%">ID Radio HT</th>
											<th width="5%">Serial Number</th>
											<th width="10%">Kondisi</th>
											<th width="25%">Keterangan</th>
											<th width="25%">Tindakan</th>
											
										</tr>
									</thead>
									<tbody>
										<?php
											$i = 1;
											$sql = "SELECT * From tabel_alkom inner join employee on tabel_alkom.id_user=employee.id_user order by employee.id_user ASC";
											$ress = mysqli_query($conn, $sql);
											while($data = mysqli_fetch_array($ress)) {
												echo '<tr>';
												echo '<td class="text-center">'. $i .'</td>';
												echo '<td class="text-center">'. $data['Nama'] .'</td>';
												echo '<td class="text-center">'. $data['Pangkat'] .'</td>';
												echo '<td class="text-center">'. $data['Jabatan'] .'</td>';
												echo '<td class="text-center">'. $data['telp'] .'</td>';
												echo '<td class="text-center">'. $data['id_radio'] .'</td>';
												echo '<td class="text-center">'. $data['serial_number'] .'</td>';
												echo '<td class="text-center">'. $data['kondisi'] .'</td>';
												echo '<td class="text-center">'. $data['Keterangan'] .'</td>';
												echo '<td class="text-center">
												 	  <a href="Alkom_edit.php?id_radio='. $data['id_radio'] .'" class="btn btn-warning btn-xs">Edit</a>';?>
													  <a href="user_hapus.php?id_radio=<?php echo $data['id_radio'];?>" onclick="return confirm('Apakah anda yakin akan menghapus <?php echo $data['id_radio'];?>?');" class="btn btn-danger btn-xs">Hapus</a></td>
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