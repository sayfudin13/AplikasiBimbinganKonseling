<?php
error_reporting(0);
session_start();
include "../../pengaturan/koneksi.php";
include "../../pdf/fpdf.php";
$module=$_GET[module];
$act=$_GET[act];

if ($module=='surat_siswa' AND $act=='hapus'){
  mysql_query("DELETE FROM tb_surat_panggilansiswa WHERE no_surat='$_GET[id]'");
  header('location:../../main.php?module='.$module);
}

elseif ($module=='surat_siswa' AND $act=='input'){
$no_surat=mysql_real_escape_string($_POST[no_surat]);
$perihal=mysql_real_escape_string($_POST[perihal]);
$nis=mysql_real_escape_string($_POST[nis]);
$jam=mysql_real_escape_string($_POST[jam]);
$perlu=mysql_real_escape_string($_POST[perlu]);
$guru=mysql_real_escape_string($_POST[guru]);
$nip=mysql_real_escape_string($_POST[nip]);
$sql=mysql_query("SELECT * FROM tb_siswa WHERE nis='$nis'");
$r=mysql_num_rows($sql);
if($r>0){
mysql_query("INSERT INTO tb_surat_panggilansiswa(
					no_surat,
					perihal,
					nis,
					jam,
					perlu,
					guru,
					nip
					) 
	        VALUES(
				'$no_surat',
				'$perihal',
				'$nis',
				'$jam',
				'$perlu',
				'$guru',
				'$nip'
				)");
  header('location:../../main.php?module='.$module);
}else{
 header('location:../../main.php?module='.$module.'&pesan=Data NIS siswa '.$nis.' tidak ada dalam database !');
 }
}

elseif ($module=='surat_siswa' AND $act=='cetak'){
$pdf = new FPDF();
$pdf->AddPage();

$pdf->setFont('Arial','',12);
$pdf->Image('../../gambar/logo2.jpg',15,11,20,25,'JPG');
$pdf->Image('../../gambar/logo.jpg',175,11,20,25,'JPG');
$pdf->setXY(50,12); $pdf->cell(30,6,'                             DINAS PENDIDIKAN');
$pdf->setXY(50,17); $pdf->cell(30,6,'                       KABUPATEN TASIKMALAYA');
$pdf->setXY(50,22); $pdf->cell(30,6,'                      SMA NEGERI 1 MANONJAYA');
$pdf->setFont('Arial','',8);
$pdf->setXY(50,26); $pdf->cell(30,6,'                 Jl. Patrol Kulon Manonjaya Tlp. (0265) 380054 Fax (0265) 381633');
$pdf->setXY(50,30); $pdf->cell(30,6,'         E-mail : sman1manonjaya@gmail.com - Website : www.sman1manonjaya.sch.id');
$pdf->setFont('Arial','B',16);
$pdf->setXY(15,32); $pdf->cell(30,6,'_________________________________________________________');
$pdf->setFont('Arial','U',12);
$pdf->setXY(85,65); $pdf->cell(30,6,'Surat Panggilan Siswa');
$pdf->setFont('Arial','',10);
$sql = mysql_query("select * from tb_surat_panggilansiswa WHERE no_surat = '$_GET[id]'");
$data = mysql_fetch_array($sql);
$pdf->setXY(15,41); $pdf->cell(30,6,'Nomor Surat ');$pdf->cell(50,6,': '.$data[no_surat]);
$pdf->setXY(15,47); $pdf->cell(30,6,'Perihal');$pdf->cell(50,6,': '.$data[perihal]);
$pdf->setXY(25,77); $pdf->cell(30,6,'Mohon kehadiran siswa yang namanya tertulis dibawah ini ke ruangan Bimbingan dan Konseling :');
$pdf->setXY(25,84); $pdf->cell(30,6,'NIS');$pdf->cell(50,6,': '.$data[nis]);
$sqlsiswa = mysql_query("select * from tb_siswa WHERE nis = '$data[nis]'");
$datasiswa = mysql_fetch_array($sqlsiswa);
$pdf->setXY(25,90); $pdf->cell(30,6,'Nama');$pdf->cell(50,6,': '.$datasiswa[nama_siswa]);
$sqlkelas = mysql_query("select * from tb_siswa WHERE nis = '$data[nis]'");
$datakelas = mysql_fetch_array($sqlkelas);
$pdf->setXY(25,96); $pdf->cell(30,6,'Kelas');$pdf->cell(50,6,': '.$datasiswa[kelas]);

$pdf->setXY(25,115); $pdf->cell(30,6,'Jam');$pdf->cell(50,6,': '.$data[jam]);
$pdf->setXY(25,121); $pdf->cell(30,6,'Keperluan :');$pdf->cell(50,6,': '.$data[perlu]);

$tgl = date('d-M-Y');
$pdf->setXY(135,172); $pdf->cell(30,6,'Tasikmalaya, '.$tgl);
$pdf->setFont('Arial','',10);
$pdf->setXY(135,178); $pdf->cell(30,6,'Guru Konselor');
$pdf->setXY(135,212); $pdf->cell(30,6,''.$data[guru]);
$pdf->setFont('Arial','U',10);
$pdf->setXY(135,213); $pdf->cell(30,6,'_____________________');
$pdf->setFont('Arial','',10);
$pdf->setXY(135,219); $pdf->cell(30,6,'NIP. '.$data[nip]);

$pdf->Output();

header('location:../../main.php?module='.$module);
}
elseif ($module=='surat_siswa' AND $act=='print'){
$pdf = new FPDF();
$pdf->AddPage();
$y_initial = 41;
$y_axis1 = 35;
$pdf->setFont('Arial','B',16);
$pdf->Image('../../gambar/logo.jpg',25,6,20,25,'JPG');
$pdf->setXY(60,12);
$pdf->cell(30,6,'Data Surat Panggilan Siswa');
$pdf->setXY(60,20);
$pdf->cell(30,6,'SMA Negeri 1 Manonjaya');
$pdf->setFont('Arial','',10);
$pdf->setFillColor(233,233,233);
$pdf->setY($y_axis1);
$pdf->setX(20);

$pdf->cell(7,6,'NO',1,0,'C',1);
$pdf->cell(25,6,'NO SURAT',1,0,'C',1);
$pdf->cell(30,6,'PERIHAL',1,0,'C',1);
$pdf->cell(30,6,'NIS',1,0,'C',1);
$pdf->cell(35,6,'NAMA SISWA',1,0,'C',1);
$pdf->cell(40,6,'KEPERLUAN',1,0,'C',1);

$y = $y_initial + $row;

$sql = mysql_query("select * from tb_surat_panggilansiswa order by nis");

$no = 0;
$row = 6;
while ($data = mysql_fetch_array($sql))
{
	$no++;
	$pdf->setY($y);
	$pdf->setX(20);
	$pdf->cell(7,6,$no,1,0,'C');
	$pdf->cell(25,6,$data[no_surat],1,0,'L');
	$pdf->cell(30,6,$data[perihal],1,0,'L');
	$pdf->cell(30,6,$data[nis],1,0,'C');
	$sqlsiswa = mysql_query("select * from tb_siswa WHERE nis = '$data[nis]'");
$datasiswa = mysql_fetch_array($sqlsiswa);
	$pdf->cell(35,6,$datasiswa[nama_siswa],1,0,'L');
	$pdf->cell(40,6,$data[perlu],1,0,'L');
	$y = $y + $row;
}

$pdf->Output();

  header('location:../../main.php?module='.$module);
}
 
?>