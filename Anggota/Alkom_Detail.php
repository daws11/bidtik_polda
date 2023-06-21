<!-- Printing -->
	<link rel="stylesheet" href="css/printing.css">
		
<?php
include("sess_check.php");
include("dist/function/format_tanggal.php");
if($_GET) {
	$kode = $_GET['code'];
	$sql = "SELECT tabel_alkom.*, employee.* FROM tabel_alkom, employee WHERE tabel_alkom.id_user=employee.id_user='". $_GET['code'] ."'";
	$query = mysqli_query($conn,$sql);
	$result = mysqli_fetch_array($query);
}
else {
	echo "Nomor Transaksi Tidak Terbaca";
	exit;
}
?>
<html>
<head>
</head>
<body>
<div id="section-to-print">
<div id="only-on-print">
</div>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
	<h4 class="modal-title" id="myModalLabel">Detail Data Radio HT</h4>
</div>
<div><br/>
<table width="100%">
	<tr>
		<td width="20%"><b>Nama User</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><?php echo $result['nama_user'];?></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><b>Nama</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><?php echo $result['Nama'];?></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><b>Pangkat/NRP</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><b><?php echo $result['Pangkat'];?></b></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><b>Jabatan</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><b><?php echo $result['Jabatan'];?></b></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><b>No. Telp/Hp</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><b><?php echo $result['telp'];?></b></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><b>ID Radio Hp</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><b><?php echo $result['id_radio'];?></b></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><b>Serial Number</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><b><?php echo $result['serial_number'];?></b></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><b>Kondisi</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><b><?php echo $result['Kondisi'];?></b></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><b>Keterangan</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><b><?php echo $result['Keterangan'];?></b></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
</table>
</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	</div>
</div>

</body>
</html>