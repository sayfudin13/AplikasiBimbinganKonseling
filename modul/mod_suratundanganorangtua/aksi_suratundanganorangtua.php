<?php
error_reporting(0);
session_start();
include "../../pengaturan/koneksi.php";
include "../../pdf/fpdf.php";
$module=$_GET[module];
$act=$_GET[act];

if ($module=='surat_ortu' AND $act=='hapus'){
  mysql_query("DELETE FROM tb_suratundanganorangtua WHERE no_surat='$_GET[id]'");
  header('location:../../main.php?module='.$module);
}

elseif ($module=='surat_ortu' AND $act=='input'){
$no_surat=mysql_real_escape_string($_POST[no_surat]);
$perihal=mysql_real_escape_string($_POST[perihal]);
$nis=mysql_real_escape_string($_POST[nis]);
$hari=mysql_real_escape_string($_POST[hari]);
$tgl=mysql_real_escape_string($_POST[tgl]);
$waktu=mysql_real_escape_string($_POST[waktu]);
$tempat=mysql_real_escape_string($_POST[tempat]);
$keperluan=mysql_real_escape_string($_POST[keperluan]);
$sql=mysql_query("SELECT * FROM tb_siswa WHERE nis='$nis'");
$r=mysql_num_rows($sql);
if($r>0){
mysql_query("INSERT INTO tb_suratundanganorangtua(
					no_surat,
					perihal,
					nis,
					hari,
					tgl,
					waktu,
					tempat,
					keperluan
					) 
	        VALUES(
				'$no_surat',
				'$perihal',
				'$nis',
				'$hari',
				'$tgl',
				'$waktu',
				'$tempat',
				'$keperluan'
				)");
  header('location:../../main.php?module='.$module);
  }else{
 header('location:../../main.php?module='.$module.'&pesan=Data NIS siswa '.$nis.' tidak ada dalam database !');
 }
}

elseif ($module=='surat_ortu' AND $act=='cetak'){
$pdf = new FPDF();
$pdf->AddPage();

$pdf->setFont('Arial','B',12);
$pdf->Image('../../gambar/logo2.jpg',15,19,20,25,'JPG');
$pdf->Image('../../gambar/logo.jpg',175,19,20,25,'JPG');
$pdf->setFont('Arial','',12);
$pdf->setXY(50,17); $pdf->cell(30,6,'           PEMERINTAH KABUPATEN TASIKMALAYA');
$pdf->setXY(50,22); $pdf->cell(30,6,'                              DINAS PENDIDIKAN');
$pdf->setXY(50,27); $pdf->cell(30,6,'                        KABUPATEN TASIKMALAYA');
$pdf->setXY(50,32); $pdf->cell(30,6,'                       SMA NEGERI 1 MANONJAYA');
$pdf->setFont('Arial','',8);
$pdf->setXY(50,36); $pdf->cell(30,6,'                       Jl. Patrol Kulon Manonjaya Tlp. (0265) 380054 Fax (0265) 381663');
$pdf->setXY(50,40); $pdf->cell(30,6,'          E-mail : sman1manonjaya@gmail.com - Website : www.sman1manonjaya.sch.id');
$pdf->setFont('Arial','B',16);
$pdf->setXY(15,41); $pdf->cell(30,6,'_________________________________________________________');
$pdf->setFont('Arial','',10);
$sql = mysql_query("select * from tb_suratundanganorangtua WHERE no_surat = '$_GET[id]'");
$data = mysql_fetch_array($sql);
$pdf->setXY(15,54); $pdf->cell(30,6,'Nomor Surat ');$pdf->cell(50,6,': '.$data[no_surat]);
$pdf->setXY(15,60); $pdf->cell(30,6,'Perihal');$pdf->cell(50,6,': '.$data[perihal]);
$pdf->setXY(25,75); $pdf->cell(30,6,'Kepada Yth.');
$pdf->setXY(25,81); $pdf->cell(30,6, 'Bapak/Ibu Orang Tua :');
$pdf->setXY(25,89); $pdf->cell(30,6,'NIS');$pdf->cell(50,6,': '.$data[nis]);
$sqlsiswa = mysql_query("select * from tb_siswa WHERE nis = '$data[nis]'");
$datasiswa = mysql_fetch_array($sqlsiswa);
$pdf->setXY(25,95); $pdf->cell(30,6,'Nama');$pdf->cell(50,6,': '.$datasiswa[nama_siswa]);
$pdf->setXY(40,104); $pdf->cell(30,6,'Di Tempat');
$pdf->setXY(25,124); $pdf->cell(30,6,'Dengan hormat');
$pdf->setXY(25,130); $pdf->cell(30,6,'Mengharap dengan hormat atas kehadiran Bapak/Ibu besok pada :');
$tgl = explode("-", $data[tgl]);
$tgl2 = $tgl[2]."-".$tgl[1]."-".$tgl[0];
$pdf->setXY(25,140); $pdf->cell(30,6,'Hari/Tanggal');$pdf->cell(50,6,': '.$data[hari].', '.$tgl2);
$pdf->setXY(25,148); $pdf->cell(30,6,'Waktu');$pdf->cell(50,6,': '.$data[waktu]);
$pdf->setXY(25,156); $pdf->cell(30,6,'Tempat');$pdf->cell(50,6,': '.$data[tempat]);
$pdf->setXY(25,164); $pdf->cell(30,6,'Keperluan');$pdf->cell(50,6,': Membicarakan keadaan putra-putri Bapak/Ibu di sekolah');
$pdf->setXY(25,172); $pdf->cell(30,6,'Atas perhatian dan kerjasamanya kami ucapkan banyak terima kasih.');
$tgl = date('d-M-Y');
$pdf->setXY(135,205); $pdf->cell(30,6,'Tasikmalaya, '.$tgl);
$pdf->setXY(135,211); $pdf->cell(30,6,'Kepala Sekolah');
$pdf->setFont('Arial','BU',10);
$pdf->setXY(135,240); $pdf->cell(30,6,'Drs. H. Dudus Dustiana, MM.');
$pdf->setFont('Arial','',10);
$pdf->setXY(135,246); $pdf->cell(30,6,'NIP. 19640315 1986 09 1 004');

$pdf->Output();

header('location:../../main.php?module='.$module);
}
elseif ($module=='suratundanganorangtua' AND $act=='cetak'){
$pdf = new FPDF();
$pdf->AddPage('L');
$y_initial = 41;
$y_axis1 = 35;
$pdf->setFont('Arial','B',16);
$pdf->Image('../../gambar/logo.jpg',25,6,20,25,'JPG');
$pdf->setXY(60,12);
$pdf->cell(30,6,'Data Surat Undangan Orang Tua');
$pdf->setXY(60,20);
$pdf->cell(30,6,'SMA Negeri 1 Manonjaya');
$pdf->setFont('Arial','',10);
$pdf->setFillColor(233,233,233);
$pdf->setY($y_axis1);
$pdf->setX(20);

$pdf->cell(7,6,'NO',1,0,'C',1);
$pdf->cell(32,6,'NO SURAT',1,0,'C',1);
$pdf->cell(30,6,'PERIHAL',1,0,'C',1);
$pdf->cell(30,6,'NIS',1,0,'C',1);
$pdf->cell(40,6,'NAMA SISWA',1,0,'C',1);
$pdf->cell(30,6,'TANGGAL',1,0,'C',1);
$pdf->cell(80,6,'KEPERLUAN',1,0,'C',1);

$y = $y_initial + $row;

$sql = mysql_query("select * from tb_suratundanganorangtua order by nis");

$no = 0;
$row = 6;
while ($data = mysql_fetch_array($sql))
{
 $tgl = explode("-", $data[tgl]);
$tgl2 = $tgl[2]."-".$tgl[1]."-".$tgl[0];
	$no++;
	$pdf->setY($y);
	$pdf->setX(20);
	$pdf->cell(7,6,$no,1,0,'C');
	$pdf->cell(32,6,$data[no_surat],1,0,'L');
	$pdf->cell(30,6,$data[perihal],1,0,'L');
	$pdf->cell(30,6,$data[nis],1,0,'C');
	$sqlsiswa = mysql_query("select * from tb_siswa WHERE nis = '$data[nis]'");
$datasiswa = mysql_fetch_array($sqlsiswa);
	$pdf->cell(40,6,$datasiswa[nama_siswa],1,0,'L');
	$pdf->cell(30,6,$tgl2,1,0,'C');
	$pdf->cell(80,6,$data[keperluan],1,0,'L');
	$y = $y + $row;
}

$pdf->Output();

  header('location:../../main.php?module='.$module);
}
 
?>