
<?php

/*
	$arrc = getData($conn, $sqlc);
	foreach ($arrc as $dc) {
		$status = $dc["status"];
*/
function T2H($tgl){
$dayofweek = date('l', strtotime($tgl));//w =angka, l=nama hari dalam inggris
$hari="Senin";
if($dayofweek=="Sunday"){$hari="Minggu";}
else if($dayofweek=="Monday"){$hari="Senin";}
else if($dayofweek=="Tuesday"){$hari="Selasa";}
else if($dayofweek=="Wednesday"){$hari="Rabu";}
else if($dayofweek=="Thrusday"){$hari="Kamis";}
else if($dayofweek=="Friday"){$hari="Jumat";}
else if($dayofweek=="Saturday"){$hari="Sabtu";}
return $hari;
}

function POT($lap){
	$lap=substr($lap,0,strlen($lap)-1);
	return $lap;
}
function TGLL($sekarang){
if($sekarang=="0000-00-00"){$sekarang=date("Y-m-d");}

$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,0,4);

$judul_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei","Juni", "Juli", "Agustus", "September","Oktober", "November", "Desember");
$wk=$tanggal." ".$judul_bln[(int)$bulan]." ".$tahun;
return $wk;
}
function getJuml($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
	$rs->free();
	return $jum;
}

?>


<?php
function process($conn,$sql){
$s=false;
$conn->autocommit(FALSE);
try {
  $rs = $conn->query($sql);
  if($rs){
	    $conn->commit();
	    $last_inserted_id = $conn->insert_id;
 		$affected_rows = $conn->affected_rows;
  		$s=true;
  }
} 
catch (Exception $e) {
	echo 'fail: ' . $e->getMessage();
  	$conn->rollback();
}
$conn->autocommit(TRUE);
return $s;
}

function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
	$rs->free();
	return $jum;
}

function getField($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$d= $rs->fetch_assoc();
	$rs->free();
	return $d;
}

function getData($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$arr = $rs->fetch_all(MYSQLI_ASSOC);
	//foreach($arr as $row) {
	//  echo $row['nama_kelas'] . '*<br>';
	//}
	
	$rs->free();
	return $arr;
}


?>