<?php
include("sess_check.php");
	
$arP=array();
$arP[0]="Bekasi";
$arP[1]="Jakarta Pusat";
$arP[2]="Jakarta Selatan";
$arP[3]="Jakarta Barat";
$arP[4]="Jakarta Timur";
$arP[5]="Jakarta Pusat";
$arP[6]="Jakarta Utara";
$arP[7]="Kepulauan Seribu";

$arJ=array();
$arJ[0]="KDRT";
$arJ[1]="Pencurian";
$arJ[2]="Pencurian Dengan Kekerasan";
$arJ[3]="Pembulian";
$arJ[4]="Pembunuhan";
$arJ[5]="Penemuan Mayat";
$arJ[6]="Kebakaran";
$arJ[7]="Penculikan";
$arJ[8]="Hipnotis";
$arJ[9]="Kerusuhan";

$arG=array();
$arG[0]="Anggrek";
$arG[1]="Mawar";
$arG[2]="Melati";
$arG[3]="Kambodja";
$arG[4]="Arjuna";
$arG[5]="Bima";
$arG[6]="Kesturi";
$arG[7]="Cocor Bebek";
$arG[8]="Kecapi";
$arG[9]="Kelapa";
$arG[10]="Cengkeh";
$arG[11]="Padi";
$arG[12]="Victoria";
$arG[13]="Pala";

 $arNama = array(
        'Johnathon',
        'Anthony',
        'Erasmo',
        'Raleigh',
        'Nancie',
        'Tama',
        'Camellia',
        'Augustine',
        'Christeen',
        'Luz',
        'Diego',
        'Lyndia',
        'Thomas',
        'Georgianna',
        'Leigha',
        'Alejandro',
        'Marquis',
        'Joan',
        'Stephania',
        'Elroy',
        'Zonia',
        'Buffy',
        'Sharie',
        'Blythe',
        'Gaylene',
        'Elida',
        'Randy',
        'Margarete',
        'Margarett',
        'Dion',
        'Tomi',
        'Arden',
        'Clora',
        'Laine',
        'Becki',
        'Margherita',
        'Bong',
        'Jeanice',
        'Qiana',
        'Lawanda',
        'Rebecka',
        'Maribel',
        'Tami',
        'Yuri',
        'Michele',
        'Rubi',
        'Larisa',
        'Lloyd',
        'Tyisha',
        'Samatha',
		'Mischke',
        'Serna',
        'Pingree',
        'Mcnaught',
        'Pepper',
        'Schildgen',
        'Mongold',
        'Wrona',
        'Geddes',
        'Lanz',
        'Fetzer',
        'Schroeder',
        'Block',
        'Mayoral',
        'Fleishman',
        'Roberie',
        'Latson',
        'Lupo',
        'Motsinger',
        'Drews',
        'Coby',
        'Redner',
        'Culton',
        'Howe',
        'Stoval',
        'Michaud',
        'Mote',
        'Menjivar',
        'Wiers',
        'Paris',
        'Grisby',
        'Noren',
        'Damron',
        'Kazmierczak',
        'Haslett',
        'Guillemette',
        'Buresh',
        'Center',
        'Kucera',
        'Catt',
        'Badon',
        'Grumbles',
        'Antes',
        'Byron',
        'Volkman',
        'Klemp',
        'Pekar',
        'Pecora',
        'Schewe',
        'Ramage'
    );
$JN=count($arNama)-1;
$TABLE="kamtibmas_umum";
mysqli_query($conn, "TRUNCATE $TABLE");
for($i=0;$i<1000;$i++){
	$R=rand(1,1000);
	if($R<10){$R="000".$R;}
	else if($R<100){$R="00".$R;}
	else if($R<1000){$R="0".$R;}
	
	$id_user=1;
	$np=$arP[rand(0,7)];
	$Polsek="Polres Metro $np";
	$No_Lp="$R/II/2022/SPKT/SEKTOR/$np/PMJ";
	$Jenis_ppgk=$arJ[rand(0,9)];//nama_laporan
	
	$d=rand(1,28);
	$m=rand(1,12);
	if($m<10){$m="0".$m;}
	if($d<10){$d="0".$d;}
	
	$tgl="2022-$m-$d";
	$Waktu=$tgl." ".date("H:i:s");
	$Pelapor=$arNama[rand(0,$JN)];
	$Korban=$arNama[rand(0,$JN)];
	$Alamat="Jl ".$arG[rand(0,13)]." No".rand(1,30)." RT ".rand(1,10)."/RW ".rand(1,8)." Kecamatan Kccmt Kabupaten Kabbpt $np";
	$Terlapor=$arNama[rand(0,$JN)];
	$Lokasi="TKP $Alamat";//tkp
	$Kerugian="Material dan Immaterial yang berharga";// kronologi & rekonstruksi
	$Motif="pada waktu ".WKTME($tgl)." telah terjadi $Jenis_ppgk dengan pelaku $Terlapor pada lokasi $Alamat dan korban ($Korban) mengalami kerugian berupa $Kerugian, saat ini sudah ditangani oleh $Polsek";//berita_acara
 
 // kamtibmas_khusus
	$sql="INSERT INTO $TABLE (id_user,No_Lp,Polsek,Jenis_ppgk,Waktu,Pelapor,Korban,Alamat,Terlapor,Lokasi,Motif,Kerugian)
		  VALUES('$id_user','$No_Lp','$Polsek','$Jenis_ppgk','$Waktu','$Pelapor','$Korban','$Alamat','$Terlapor','$Lokasi','$Motif','$Kerugian')";
	$ress = mysqli_query($conn, $sql);
}

	
	
	
	
	
	
function WKTME($sekarang){
if($sekarang=="0000-00-00"){$sekarang=date("Y-m-d");}

$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,0,4);

$judul_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei","Juni", "Juli", "Agustus", "September","Oktober", "November", "Desember");
$wk=$tanggal." ".$judul_bln[(int)$bulan]." ".$tahun;
return $wk;
}
?> 