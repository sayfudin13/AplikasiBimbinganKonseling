<?php
error_reporting(0);
session_start();
include "../../pengaturan/koneksi.php";
include "../../pdf/fpdf.php";
$module=$_GET[module];
$act=$_GET[act];

// Hapus konsultasi
if ($module=='konsultasi' AND $act=='hapus'){
  mysql_query("DELETE FROM tb_konsultasi WHERE id_konsultasi='$_GET[id]'");
  header('location:../../main.php?module='.$module);
}

// Input konsultasi
elseif ($module=='konsultasi' AND $act=='input'){
$nis=mysql_real_escape_string($_POST[nis]);
$tgl_konsultasi=mysql_real_escape_string($_POST[tgl_konsultasi]);
$tgl = explode("-", $tgl_konsultasi);
$tgl2 = $tgl[2]."-".$tgl[1]."-".$tgl[0];
$hasil_konsultasi=mysql_real_escape_string($_POST[hasil_konsultasi]);
$sql=mysql_query("SELECT * FROM tb_siswa WHERE nis='$nis'");
$r=mysql_num_rows($sql);
if($r>0){
mysql_query("INSERT INTO tb_konsultasi(
					nis,
					tgl_konsultasi,
					hasil_konsultasi
					) 
	        VALUES(
				'$nis',
				'$tgl2',
				'$hasil_konsultasi'
				)");
  header('location:../../main.php?module='.$module.'&pesan=Data berhasil disimpan !');
 }else{
 header('location:../../main.php?module='.$module.'&pesan=Data NIS siswa '.$nis.' tidak ada dalam database !');
 }
}

// Update konsultasi
elseif ($module=='konsultasi' AND $act=='update'){
$nis=mysql_real_escape_string($_POST[nis]);
$tgl_konsultasi=mysql_real_escape_string($_POST[tgl_konsultasi]);
$tgl = explode("-", $tgl_konsultasi);
$tgl2 = $tgl[2]."-".$tgl[1]."-".$tgl[0];
$hasil_konsultasi=mysql_real_escape_string($_POST[hasil_konsultasi]);
$sql=mysql_query("SELECT * FROM tb_siswa WHERE nis='$nis'");
$r=mysql_num_rows($sql);
if($r>0){
  mysql_query("UPDATE tb_konsultasi SET
					nis   = '$nis',
					tgl_konsultasi   = '$tgl2',
					hasil_konsultasi   = '$hasil_konsultasi'
                           WHERE id_konsultasi       = '$_POST[id]'");
  header('location:../../main.php?module='.$module.'&pesan=Data berhasil di update !');
 }else{
 header('location:../../main.php?module='.$module.'&pesan=Data NIS siswa '.$nis.' tidak ada dalam database !');
 }
 }
 
 elseif ($module=='konsultasi' AND $act=='cetak'){

include "class.ezpdf.php";
$pdf = new Cezpdf('a4','portrait');
		// Atur margin
		$pdf->ezSetCmMargins(2, 3, 3, 3);
		$pdf->addObject($all, 'all');
		$pdf->closeObject();
		$sql = mysql_query("SELECT k.*,s.nama_siswa,s.kelas,s.jurusan FROM tb_konsultasi k,tb_siswa s where k.nis=s.nis"); 	 	
		$i = 1;
		while($r = mysql_fetch_array($sql)) {
			 $tgl = explode("-", $r[tgl_konsultasi]);
		$tgl2 = $tgl[2]."-".$tgl[1]."-".$tgl[0];
			$data[$i]=array('No'=> $i, 	 	 	
							'NIS'=>$r[nis],
							'Nama Siswa'=>$r[nama_siswa],
							'Kelas'=>$r[kelas],
							'Jurusan'=>$r[jurusan],
							'Tanggal Konsultasi'=>$tgl2,
							'Hasil Konsultasi'=>$r[hasil_konsultasi]
							);
			$i++;
		}
		$pdf->addJpegFromFile('../../gambar/logo.jpg',100,$pdf->y-50,50,0); 
		$pdf->ezText("Data Konsultasi" . "\n" . "SMA Negeri 1 Manonjaya" . "\n",20,array('justification'=>'centre')); 
		$pdf->ezStartText(100, 557, 8);
		$pdf->ezStartText2(500, 557, 8);
		$pdf->ezStartPageNumbers(35, 15, 10);
		$pdf->ezTable($data, '', '', '');
		$pdf->ezStream();
 }

elseif ($module=='konsultasi' AND $act=='print'){
$pdf = new FPDF();
$pdf->AddPage();

$pdf->setFont('Arial','B',16);
$pdf->Image('../../gambar/logo.jpg',25,3,20,25,'JPG');
$pdf->setFont('Arial','B',16);
$pdf->setXY(60,11); $pdf->cell(30,6,'Data Konsultasi Siswa/Siswi');
$pdf->setFont('Arial','B',16);
$pdf->setXY(60,19); $pdf->cell(30,6,'SMA Negeri 1 Manonjaya');
$pdf->setFont('Arial','B',16);
$pdf->setXY(15,24); $pdf->cell(30,6,'_________________________________________________________');
$pdf->setFont('Arial','',10);
$sql = mysql_query("select * from tb_konsultasi join tb_siswa using(nis) WHERE id_konsultasi = '$_GET[id]'");
$data = mysql_fetch_array($sql);
$pdf->setXY(20,37); $pdf->cell(35,6,'NIS ');$pdf->cell(50,6,': '.$data[nis]);
$pdf->setXY(20,44); $pdf->cell(35,6,'Nama Siswa ');$pdf->cell(50,6,': '.$data[nama_siswa]);
$pdf->setXY(20,51); $pdf->cell(35,6,'Kelas');$pdf->cell(50,6,': '.$data[kelas]);
$pdf->setXY(20,58); $pdf->cell(35,6,'Jurusan');$pdf->cell(50,6,': '.$data[jurusan]);
$tgl = explode("-", $data[tgl_konsultasi]);
$tgl2 = $tgl[2]."-".$tgl[1]."-".$tgl[0];
$pdf->setXY(20,65); $pdf->cell(35,6,'Tanggal Konsultasi ');$pdf->cell(50,6,': '.$tgl2);
$pdf->setXY(20,72); $pdf->cell(35,6,'Hasil Konsultasi');$pdf->cell(50,6,': '.$data[hasil_konsultasi]);
$pdf->Output();

  header('location:../../main.php?module='.$module);
}
 
?>