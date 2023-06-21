<?php
	include("sess_check.php");
	require_once"../fungsiIO.php";
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
<h1 class="page-header"><?php echo ucwords($_SESSION["nama_user"]);?> <sub><i>DATA KAMTIBMAS UMUM</i></sub></h1>
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
								<a href="beranda.php" class="btn btn-success">Back</a>
							</div>
						</div>
					</div>
					<div class="panel-body">
								<table class="table table-striped table-bordered table-hover" id="tabel-data">
									<thead>
										<tr>
											<th width="1%">No</th>
											<th width="1%">No LP</th>
											<th width="10%">Polsek yang Menangani</th>
											<th width="5%">Jenis Peristiwa</th>
											<th width="10%">Waktu</th>
											<th width="5%">Pelapor</th>
											<th width="5%">Korban</th>
											<th width="10%">Terlapor</th>
											<th width="10%">Lokasi</th>
											<th width="10%">Kerugian</th>
											
										</tr>
									</thead>
									<tbody>
										<?php
											$i = 1;
										//	$sql = "SELECT kamtibmas_umum.*, employee.* FROM kamtibmas_umum, employee WHERE kamtibmas_umum.id_user=employee.id_user AND 
										//kamtibmas_umum.id_user='$id' ORDER BY kamtibmas_umum.id_user ASC";
											
										$sql = "SELECT * from kamtibmas_umum where Polsek='".$_SESSION["nama_user"]."' order by Waktu asc";		
											$ress = mysqli_query($conn, $sql);
											while($data = mysqli_fetch_array($ress)) {
												$wkt= $data['Waktu'];
												$arw=explode(" ",$wkt);
												$tgl=TGLL($arw[0]);
												$jam=$arw[1];
												$waktu="$tgl $jam Wib";
												echo '<tr>';
												echo '<td class="text-center">'. $i .'</td>';
												echo '<td class="text-center"><label title="'.$data['Motif'].'">'. $data['No_Lp'] .'</label></td>';
												echo '<td class="text-center">'. $data['Polsek'] .'</td>';
												echo '<td class="text-center">'. $data['Jenis_ppgk'].'</td>';
												echo '<td class="text-center">'. $waktu.'</td>';
												echo '<td class="text-center">'. $data['Pelapor'] .'</td>';
												echo '<td class="text-center">'. $data['Korban'] .'</td>';
												echo '<td class="text-center">'. $data['Terlapor'] .'</td>';
												echo '<td class="text-center">'. $data['Lokasi'] .'</td>';
												echo '<td class="text-center">'. $data['Kerugian'] .'</td>';
												?>
													  
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