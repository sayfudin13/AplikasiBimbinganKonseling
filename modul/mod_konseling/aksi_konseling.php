<?php
error_reporting(0);
session_start();
include "../../pengaturan/koneksi.php";
include "../../pdf/fpdf.php";
$module=$_GET[module];
$act=$_GET[act];

// Hapus konseling
if ($module=='konseling' AND $act=='hapus'){
  mysql_query("DELETE FROM tb_konseling WHERE id_konseling='$_GET[id]'");
  header('location:../../main.php?module='.$module);
}

// Input konseling
elseif ($module=='konseling' AND $act=='input'){
$nis=mysql_real_escape_string($_POST[nis]);
$tgl=mysql_real_escape_string($_POST[tgl]);
$tgl = explode("-", $_POST[tgl]);
$tgl2 = $tgl[2]."-".$tgl[1]."-".$tgl[0];
$kasus=mysql_real_escape_string($_POST[kasus]);
$deskripsi_masalah=mysql_real_escape_string($_POST[deskripsi_masalah]);
$diagnosa_masalah=mysql_real_escape_string($_POST[diagnosa_masalah]);
$tindak_lanjut=mysql_real_escape_string($_POST[tindak_lanjut]);
$sql=mysql_query("SELECT * FROM tb_siswa WHERE nis='$nis'");
$r=mysql_num_rows($sql);
if($r>0){
mysql_query("INSERT INTO tb_konseling(
					nis,
					tgl,
					kasus,
					deskripsi_masalah,
					diagnosa_masalah,
					tindak_lanjut
					) 
	        VALUES(
				'$nis',
				'$tgl2',
				'$kasus',
				'$deskripsi_masalah',
				'$diagnosa_masalah',
				'$tindak_lanjut'
				)");
  header('location:../../main.php?module='.$module.'&pesan=Data berhasil disimpan !');
 }else{
 header('location:../../main.php?module='.$module.'&pesan=Data NIS siswa '.$nis.' tidak ada dalam database !');
 }
}

// Update konseling
elseif ($module=='konseling' AND $act=='update'){
$nis=mysql_real_escape_string($_POST[nis]);
$tgl=mysql_real_escape_string($_POST[tgl]);
$tgl = explode("-", $_POST[tgl]);
$tgl2 = $tgl[2]."-".$tgl[1]."-".$tgl[0];
$kasus=mysql_real_escape_string($_POST[kasus]);
$deskripsi_masalah=mysql_real_escape_string($_POST[deskripsi_masalah]);
$diagnosa_masalah=mysql_real_escape_string($_POST[diagnosa_masalah]);
$tindak_lanjut=mysql_real_escape_string($_POST[tindak_lanjut]);
$sql=mysql_query("SELECT * FROM tb_siswa WHERE nis='$nis'");
$r=mysql_num_rows($sql);
if($r>0){
  mysql_query("UPDATE tb_konseling SET
					nis   = '$nis',
					tgl   = '$tgl2',
					kasus   = '$kasus',
					deskripsi_masalah   = '$deskripsi_masalah',
					diagnosa_masalah   = '$diagnosa_masalah',
					tindak_lanjut   = '$tindak_lanjut'
                           WHERE id_konseling       = '$_POST[id]'");
  header('location:../../main.php?module='.$module.'&pesan=Data berhasil di update !');
 }else{
 header('location:../../main.php?module='.$module.'&pesan=Data NIS siswa '.$nis.' tidak ada dalam database !');
 }
 }
 
 elseif ($module=='konseling' AND $act=='cetak'){

include "class.ezpdf.php";
$pdf = new Cezpdf('a4','landscape');
		// Atur margin
		$pdf->ezSetCmMargins(2, 3, 3, 3);
		$pdf->addObject($all, 'all');
		$pdf->closeObject();
		$sql = mysql_query("SELECT k.*,s.nama_siswa,s.kelas,s.jurusan FROM tb_konseling k,tb_siswa s where k.nis=s.nis"); 	 	
		$i = 1;
		while($r = mysql_fetch_array($sql)) {
			 $tgl = explode("-", $r[tgl]);
$tgl2 = $tgl[2]."-".$tgl[1]."-".$tgl[0];
			$data[$i]=array('No'=> $i, 	 	 	
							'NIS'=>$r[nis],
							'Nama Siswa'=>$r[nama_siswa],
							'Kelas'=>$r[kelas],
							'Jurusan'=>$r[jurusan],
							'Tanggal'=>$tgl2,
							'Kasus'=>$r[kasus],
							'Deskripsi Masalah'=>$r[deskripsi_masalah],
							'Diagnosa Masalah'=>$r[diagnosa_masalah],
							'Tindak Lanjut'=>$r[tindak_lanjut]
							);
			$i++;
		}
		$pdf->addJpegFromFile('../../gambar/logo.jpg',200,$pdf->y-50,50,0); 
		$pdf->ezText("Data Konseling" . "\n" . "SMA Negeri 1 Manonjaya" . "\n",20,array('justification'=>'centre')); 
		$pdf->ezStartText(100, 557, 8);
		$pdf->ezStartText2(500, 557, 8);
		$pdf->ezStartPageNumbers(35, 15, 10);
		$pdf->ezTable($data, '', '', '');
		$pdf->ezStream();
 }

 elseif ($module=='konseling' AND $act=='print'){
$pdf = new FPDF();
$pdf->AddPage();

$pdf->setFont('Arial','B',16);
$pdf->Image('../../gambar/logo.jpg',25,3,20,25,'JPG');
$pdf->setFont('Arial','B',16);
$pdf->setXY(60,11); $pdf->cell(30,6,'Data Konseling Siswa/Siswi');
$pdf->setFont('Arial','B',16);
$pdf->setXY(60,19); $pdf->cell(30,6,'SMA Negeri 1 Manonjaya');
$pdf->setFont('Arial','B',16);
$pdf->setXY(15,24); $pdf->cell(30,6,'_________________________________________________________');
$pdf->setFont('Arial','',10);
$sql = mysql_query("select * from tb_konseling join tb_siswa using(nis) WHERE id_konseling = '$_GET[id]'");
$data = mysql_fetch_array($sql);
$pdf->setXY(20,37); $pdf->cell(35,6,'NIS ');$pdf->cell(50,6,': '.$data[nis]);
$pdf->setXY(20,44); $pdf->cell(35,6,'Nama Siswa ');$pdf->cell(50,6,': '.$data[nama_siswa]);
$pdf->setXY(20,51); $pdf->cell(35,6,'Kelas ');$pdf->cell(50,6,': '.$data[kelas]);
$pdf->setXY(20,58); $pdf->cell(35,6,'Jurusan ');$pdf->cell(50,6,': '.$data[jurusan]);
$tgl = explode("-", $data[tgl]);
$tgl2 = $tgl[2]."-".$tgl[1]."-".$tgl[0];
$pdf->setXY(20,65); $pdf->cell(35,6,'Tanggal Konseling ');$pdf->cell(50,6,': '.$tgl2);
$pdf->setXY(20,72); $pdf->cell(35,6,'Kasus');$pdf->cell(50,6,': '.$data[kasus]);
$pdf->setXY(20,79); $pdf->cell(35,6,'Deskripsi Masalah');$pdf->cell(50,6,': '.$data[deskripsi_masalah]);
$pdf->setXY(20,86); $pdf->cell(35,6,'Diagnosa Masalah');$pdf->cell(50,6,': '.$data[diagnosa_masalah]);
$pdf->setXY(20,93); $pdf->cell(35,6,'Tindak Lanjut');$pdf->cell(50,6,': '.$data[tindak_lanjut]);
$pdf->Output();

  header('location:../../main.php?module='.$module);
}
 
?>