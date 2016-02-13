<?php
error_reporting(0);
session_start();
include "../../pengaturan/koneksi.php";
include "../../pdf/fpdf.php";
$module=$_GET[module];
$act=$_GET[act];

// Hapus siswa
if ($module=='siswa' AND $act=='hapus'){
  mysql_query("DELETE FROM tb_siswa WHERE nis='$_GET[id]'");
  header('location:../../main.php?module='.$module);
}

// Input siswa
elseif ($module=='siswa' AND $act=='input'){
$nis=mysql_real_escape_string($_POST[nis]);
$nama_siswa=mysql_real_escape_string($_POST[nama_siswa]);
$nama_panggilan=mysql_real_escape_string($_POST[nama_panggilan]);
$kelas=mysql_real_escape_string($_POST[kelas]);
$jurusan=mysql_real_escape_string($_POST[jurusan]);
$gol_darah=mysql_real_escape_string($_POST[gol_darah]);
$jns_kelamin=mysql_real_escape_string($_POST[jns_kelamin]);
$tpt_lahir=mysql_real_escape_string($_POST[tpt_lahir]);
$tgl_lahir=mysql_real_escape_string($_POST[tgl_lahir]);
$tgl = explode("-", $tgl_lahir);
$tgl2 = $tgl[2]."-".$tgl[1]."-".$tgl[0];
$agama=mysql_real_escape_string($_POST[agama]);
$anak_ke=mysql_real_escape_string($_POST[anak_ke]);
$jml_saudara=mysql_real_escape_string($_POST[jml_saudara]);
$asal_sekolah=mysql_real_escape_string($_POST[asal_sekolah]);
$jml_SKHU=mysql_real_escape_string($_POST[jml_SKHU]);
$telp=mysql_real_escape_string($_POST[telp]);
$alamat=mysql_real_escape_string($_POST[alamat]);
$status_ayah=mysql_real_escape_string($_POST[status_ayah]);
$nama_ayah=mysql_real_escape_string($_POST[nama_ayah]);
$umur_ayah=mysql_real_escape_string($_POST[umur_ayah]);
$pekerjaan_ayah=mysql_real_escape_string($_POST[pekerjaan_ayah]);
$agama_ayah=mysql_real_escape_string($_POST[agama_ayah]);
$pend_akhir_ayah=mysql_real_escape_string($_POST[pend_akhir_ayah]);
$status_ibu=mysql_real_escape_string($_POST[status_ibu]);
$nama_ibu=mysql_real_escape_string($_POST[nama_ibu]);
$umur_ibu=mysql_real_escape_string($_POST[umur_ibu]);
$pekerjaan_ibu=mysql_real_escape_string($_POST[pekerjaan_ibu]);
$agama_ibu=mysql_real_escape_string($_POST[agama_ibu]);
$pend_akhir_ibu=mysql_real_escape_string($_POST[pend_akhir_ibu]);
$riwayat_sakit=mysql_real_escape_string($_POST[riwayat_sakit]);
$hobby=mysql_real_escape_string($_POST[hobby]);
$prestasi=mysql_real_escape_string($_POST[prestasi]);
//$photo=mysql_real_escape_string($_POST[photo]);
$file = $_FILES ['file'];
$name1 = $file ['name'];
$type = $file ['type'];
$size = $file ['size'];
$tmppath = $file ['tmp_name']; 
if($name1!="")
{
if(move_uploaded_file ($tmppath, '../../photo/'.$name1))
{
mysql_query("INSERT INTO tb_siswa(
			      nis,
				  nama_siswa,
				  nama_panggilan,
				  kelas,
				  jurusan,
				  gol_darah,
				  jns_kelamin,
				  tpt_lahir,
				  tgl_lahir,
				  agama,
				  anak_ke,
				  jml_saudara,
				  asal_sekolah,
				  jml_SKHU,
				  telp,
				  alamat,
				  status_ayah,
				  nama_ayah,
				  umur_ayah,
				  pekerjaan_ayah,
				  agama_ayah,
				  pend_akhir_ayah,
				  status_ibu,
				  nama_ibu,
				  umur_ibu,
				  pekerjaan_ibu,
				  agama_ibu,
				  pend_akhir_ibu,
				  riwayat_sakit,
				  hobby,
				  prestasi,
				  photo
				  ) 
	        VALUES(
				'$nis',
				'$nama_siswa',
				'$nama_panggilan',
				'$kelas',
				'$jurusan',
				'$gol_darah',
				'$jns_kelamin',
				'$tpt_lahir',
				'$tgl2',
				'$agama',
				'$anak_ke',
				'$jml_saudara',
				'$asal_sekolah',
				'$jml_SKHU',
				'$telp',
				'$alamat',
				'$status_ayah',
				'$nama_ayah',
				'$umur_ayah',
				'$pekerjaan_ayah',
				'$agama_ayah',
				'$pend_akhir_ayah',
				'$status_ibu',
				'$nama_ibu',
				'$umur_ibu',
				'$pekerjaan_ibu',
				'$agama_ibu',
				'$pend_akhir_ibu',
				'$riwayat_sakit',
				'$hobby',
				'$prestasi',
				'$name1'
				)");
  header('location:../../main.php?module='.$module);
}
}else{
mysql_query("INSERT INTO tb_siswa(
			      nis,
				  nama_siswa,
				  nama_panggilan,
				  kelas,
				  jurusan,
				  gol_darah,
				  jns_kelamin,
				  tpt_lahir,
				  tgl_lahir,
				  agama,
				  anak_ke,
				  jml_saudara,
				  asal_sekolah,
				  jml_SKHU,
				  telp,
				  alamat,
				  status_ayah,
				  nama_ayah,
				  umur_ayah,
				  pekerjaan_ayah,
				  agama_ayah,
				  pend_akhir_ayah,
				  status_ibu,
				  nama_ibu,
				  umur_ibu,
				  pekerjaan_ibu,
				  agama_ibu,
				  pend_akhir_ibu,
				  riwayat_sakit,
				  hobby,
				  prestasi,
				  photo
				  ) 
	        VALUES(
				'$nis',
				'$nama_siswa',
				'$nama_panggilan',
				'$kelas',
				'$jurusan',
				'$gol_darah',
				'$jns_kelamin',
				'$tpt_lahir',
				'$tgl2',
				'$agama',
				'$anak_ke',
				'$jml_saudara',
				'$asal_sekolah',
				'$jml_SKHU',
				'$telp',
				'$alamat',
				'$status_ayah',
				'$nama_ayah',
				'$umur_ayah',
				'$pekerjaan_ayah',
				'$agama_ayah',
				'$pend_akhir_ayah',
				'$status_ibu',
				'$nama_ibu',
				'$umur_ibu',
				'$pekerjaan_ibu',
				'$agama_ibu',
				'$pend_akhir_ibu',
				'$riwayat_sakit',
				'$hobby',
				'$prestasi',
				''
				)");
  header('location:../../main.php?module='.$module);
}
}

// Update siswa
elseif ($module=='siswa' AND $act=='update'){
$nis=mysql_real_escape_string($_POST[nis]);
$nama_siswa=mysql_real_escape_string($_POST[nama_siswa]);
$nama_panggilan=mysql_real_escape_string($_POST[nama_panggilan]);
$kelas=mysql_real_escape_string($_POST[kelas]);
$jurusan=mysql_real_escape_string($_POST[jurusan]);
$gol_darah=mysql_real_escape_string($_POST[gol_darah]);
$jns_kelamin=mysql_real_escape_string($_POST[jns_kelamin]);
$tpt_lahir=mysql_real_escape_string($_POST[tpt_lahir]);
$tgl_lahir=mysql_real_escape_string($_POST[tgl_lahir]);
$tgl = explode("-", $tgl_lahir);
$tgl2 = $tgl[2]."-".$tgl[1]."-".$tgl[0];
$agama=mysql_real_escape_string($_POST[agama]);
$anak_ke=mysql_real_escape_string($_POST[anak_ke]);
$jml_saudara=mysql_real_escape_string($_POST[jml_saudara]);
$asal_sekolah=mysql_real_escape_string($_POST[asal_sekolah]);
$jml_SKHU=mysql_real_escape_string($_POST[jml_SKHU]);
$telp=mysql_real_escape_string($_POST[telp]);
$alamat=mysql_real_escape_string($_POST[alamat]);
$status_ayah=mysql_real_escape_string($_POST[status_ayah]);
$nama_ayah=mysql_real_escape_string($_POST[nama_ayah]);
$umur_ayah=mysql_real_escape_string($_POST[umur_ayah]);
$pekerjaan_ayah=mysql_real_escape_string($_POST[pekerjaan_ayah]);
$agama_ayah=mysql_real_escape_string($_POST[agama_ayah]);
$pend_akhir_ayah=mysql_real_escape_string($_POST[pend_akhir_ayah]);
$status_ibu=mysql_real_escape_string($_POST[status_ibu]);
$nama_ibu=mysql_real_escape_string($_POST[nama_ibu]);
$umur_ibu=mysql_real_escape_string($_POST[umur_ibu]);
$pekerjaan_ibu=mysql_real_escape_string($_POST[pekerjaan_ibu]);
$agama_ibu=mysql_real_escape_string($_POST[agama_ibu]);
$pend_akhir_ibu=mysql_real_escape_string($_POST[pend_akhir_ibu]);
$riwayat_sakit=mysql_real_escape_string($_POST[riwayat_sakit]);
$hobby=mysql_real_escape_string($_POST[hobby]);
$prestasi=mysql_real_escape_string($_POST[prestasi]);
//$photo=mysql_real_escape_string($_POST[photo]);
$file = $_FILES ['file'];
$name1 = $file ['name'];
$type = $file ['type'];
$size = $file ['size'];
$tmppath = $file ['tmp_name']; 
if($name1!="")
{
if(move_uploaded_file ($tmppath, '../../photo/'.$name1))
{

 mysql_query("UPDATE tb_siswa SET
					nis   = '$nis',
					nama_siswa   = '$nama_siswa',
					nama_panggilan   = '$nama_panggilan',
				    kelas   = '$kelas',
				    jurusan   = '$jurusan',
				    gol_darah   = '$gol_darah',
				    jns_kelamin   = '$jns_kelamin',
				    tpt_lahir   = '$tpt_lahir',
				    tgl_lahir   = '$tgl2',
				    agama   = '$agama',
				    anak_ke   = '$anak_ke',
				    jml_saudara   = '$jml_saudara',
				    asal_sekolah   = '$asal_sekolah',
				    jml_SKHU   = '$jml_SKHU',
				    telp   = '$telp',
				    alamat   = '$alamat',
				    status_ayah   = '$status_ayah',
				    nama_ayah   = '$nama_ayah',
				    umur_ayah   = '$umur_ayah',
				    pekerjaan_ayah   = '$pekerjaan_ayah',
				    agama_ayah   = '$agama_ayah',
				    pend_akhir_ayah   = '$pend_akhir_ayah',
				    status_ibu   = '$status_ibu',
				    nama_ibu   = '$nama_ibu',
				    umur_ibu   = '$umur_ibu',
				    pekerjaan_ibu   = '$pekerjaan_ibu',
				    agama_ibu   = '$agama_ibu',
				    pend_akhir_ibu   = '$pend_akhir_ibu',
				    riwayat_sakit   = '$riwayat_sakit',
				    hobby   = '$hobby',
				    prestasi   = '$prestasi',
				    photo   = '$name1'
                        WHERE nis       = '$_POST[id]'");
    header('location:../../main.php?module='.$module);
}
}else{
mysql_query("UPDATE tb_siswa SET
					nis   = '$nis',
					nama_siswa   = '$nama_siswa',
					nama_panggilan   = '$nama_panggilan',
				    kelas   = '$kelas',
				    jurusan   = '$jurusan',
				    gol_darah   = '$gol_darah',
				    jns_kelamin   = '$jns_kelamin',
				    tpt_lahir   = '$tpt_lahir',
				    tgl_lahir   = '$tgl2',
				    agama   = '$agama',
				    anak_ke   = '$anak_ke',
				    jml_saudara   = '$jml_saudara',
				    asal_sekolah   = '$asal_sekolah',
				    jml_SKHU   = '$jml_SKHU',
				    telp   = '$telp',
				    alamat   = '$alamat',
				    status_ayah   = '$status_ayah',
				    nama_ayah   = '$nama_ayah',
				    umur_ayah   = '$umur_ayah',
				    pekerjaan_ayah   = '$pekerjaan_ayah',
				    agama_ayah   = '$agama_ayah',
				    pend_akhir_ayah   = '$pend_akhir_ayah',
				    status_ibu   = '$status_ibu',
				    nama_ibu   = '$nama_ibu',
				    umur_ibu   = '$umur_ibu',
				    pekerjaan_ibu   = '$pekerjaan_ibu',
				    agama_ibu   = '$agama_ibu',
				    pend_akhir_ibu   = '$pend_akhir_ibu',
				    riwayat_sakit   = '$riwayat_sakit',
				    hobby   = '$hobby',
				    prestasi   = '$prestasi'
                        WHERE nis       = '$_POST[id]'");
    header('location:../../main.php?module='.$module);
}
}
 
 elseif ($module=='siswa' AND $act=='print'){
$pdf = new FPDF();
$pdf->AddPage();

$pdf->setFont('Arial','B',16);
$pdf->Image('../../gambar/logo.jpg',25,3,20,25,'JPG');
$pdf->setFont('Arial','B',16);
$pdf->setXY(60,11); $pdf->cell(30,6,'Data Siswa/Siswi');
$pdf->setFont('Arial','B',16);
$pdf->setXY(60,19); $pdf->cell(30,6,'SMA Negeri 1 Manonjaya');
$pdf->setFont('Arial','B',16);
$pdf->setXY(15,24); $pdf->cell(30,6,'_________________________________________________________');
$pdf->setFont('Arial','',10);
$sql = mysql_query("select * from tb_siswa WHERE nis = '$_GET[id]'");
$data = mysql_fetch_array($sql);
$pdf->setXY(20,32); $pdf->cell(30,6,'NIS ');$pdf->cell(50,6,': '.$data[nis]);
$pdf->setXY(20,38); $pdf->cell(30,6,'Nama Siswa');$pdf->cell(50,6,': '.$data[nama_siswa]);
$pdf->setXY(20,44); $pdf->cell(30,6,'Nama Panggilan');$pdf->cell(50,6,': '.$data[nama_panggilan]);
$pdf->setXY(20,50); $pdf->cell(30,6,'Kelas');$pdf->cell(50,6,': '.$data[kelas]);
$pdf->setXY(20,56); $pdf->cell(30,6,'Jurusan');$pdf->cell(50,6,': '.$data[jurusan]);
$pdf->setXY(20,62); $pdf->cell(30,6,'Golongan Darah');$pdf->cell(50,6,': '.$data[gol_darah]);
$pdf->setXY(20,68); $pdf->cell(30,6,'Jenis Kelamin');$pdf->cell(50,6,': '.$data[jns_kelamin]);
$pdf->setXY(20,74); $pdf->cell(30,6,'Tempat Lahir');$pdf->cell(50,6,': '.$data[tpt_lahir]);
$tgl = explode("-", $data[tgl_lahir]);
$tgl2 = $tgl[2]."-".$tgl[1]."-".$tgl[0];
$pdf->setXY(20,80); $pdf->cell(30,6,'Tanggal Lahir ');$pdf->cell(50,6,': '.$tgt_lahir.''.$tgl2);
$pdf->setXY(20,86); $pdf->cell(30,6,'Agama');$pdf->cell(50,6,': '.$data[agama]);
$pdf->setXY(20,92); $pdf->cell(30,6,'Anak Ke');$pdf->cell(50,6,': '.$data[anak_ke]);
$pdf->setXY(20,98); $pdf->cell(30,6,'Jumlah Saudara');$pdf->cell(50,6,': '.$data[jml_saudara]);
$pdf->setXY(20,104); $pdf->cell(30,6,'Asal Sekolah');$pdf->cell(50,6,': '.$data[asal_sekolah]);
$pdf->setXY(20,110); $pdf->cell(30,6,'Jumlah SKHU');$pdf->cell(50,6,': '.$data[jml_SKHU]);
$pdf->setXY(20,116); $pdf->cell(30,6,'No. Telepon');$pdf->cell(50,6,': '.$data[telp]);
$pdf->setXY(20,122); $pdf->cell(30,6,'Alamat');$pdf->cell(50,6,': '.$data[alamat]);
$pdf->setFont('Arial','B',12);
$pdf->setXY(20,192); $pdf->cell(30,6,'Data Orang Tua Siswa');
$pdf->setFont('Arial','',10);
$pdf->setXY(20,200); $pdf->cell(30,6,'Status Ayah');$pdf->cell(50,6,': '.$data[status_ayah]);
$pdf->setXY(20,206); $pdf->cell(30,6,'Nama Ayah');$pdf->cell(50,6,': '.$data[nama_ayah]);
$pdf->setXY(20,212); $pdf->cell(30,6,'Umur Ayah');$pdf->cell(50,6,': '.$data[umur_ayah]);
$pdf->setXY(20,218); $pdf->cell(30,6,'Pekerjaan Ayah');$pdf->cell(50,6,': '.$data[pekerjaan_ayah]);
$pdf->setXY(20,224); $pdf->cell(30,6,'Agama Ayah');$pdf->cell(50,6,': '.$data[agama_ayah]);
$pdf->setXY(20,230); $pdf->cell(30,6,'Pend. Akhir Ayah');$pdf->cell(50,6,': '.$data[pend_akhir_ayah]);
$pdf->setXY(20,236); $pdf->cell(30,6,'Status Ibu');$pdf->cell(50,6,': '.$data[status_ibu]);
$pdf->setXY(20,242); $pdf->cell(30,6,'Nama Ibu');$pdf->cell(50,6,': '.$data[nama_ibu]);
$pdf->setXY(20,248); $pdf->cell(30,6,'Umur Ibu');$pdf->cell(50,6,': '.$data[umur_ibu]);
$pdf->setXY(20,254); $pdf->cell(30,6,'Pekerjaan Ibu');$pdf->cell(50,6,': '.$data[pekerjaan_ibu]);
$pdf->setXY(20,260); $pdf->cell(30,6,'Agama Ibu');$pdf->cell(50,6,': '.$data[agama_ibu]);
$pdf->setXY(20,266); $pdf->cell(30,6,'Pend. Akhir Ibu');$pdf->cell(50,6,': '.$data[pend_akhir_ibu]);
$pdf->setXY(20,128); $pdf->cell(30,6,'Riwayat Sakit');$pdf->cell(50,6,': '.$data[riwayat_sakit]);
$pdf->setXY(20,134); $pdf->cell(30,6,'Hobby');$pdf->cell(50,6,': '.$data[hobby]);
$pdf->setXY(20,140); $pdf->cell(30,6,'Prestasi');$pdf->cell(50,6,': '.$data[prestasi]);
$pdf->setXY(20,157); $pdf->cell(30,6,'Photo');
if(!$data[photo]==""){
$pdf->Image('../../photo/'.$data[photo],52,152,25,30,'JPG');
}
$pdf->Output();

  header('location:../../main.php?module='.$module);
}

elseif ($module=='siswa' AND $act=='cetak'){
$pdf = new FPDF();
$pdf->AddPage();
$y_initial = 41;
$y_axis1 = 35;
$pdf->setFont('Arial','B',16);
$pdf->Image('../../gambar/logo.jpg',25,6,20,25,'JPG');
$pdf->setXY(60,12);
$pdf->cell(30,6,'Data Siswa/Siswi');
$pdf->setXY(60,20);
$pdf->cell(30,6,'SMA Negeri 1 Manonjaya');
$pdf->setFont('Arial','',10);
$pdf->setFillColor(233,233,233);
$pdf->setY($y_axis1);
$pdf->setX(20);

$pdf->cell(7,6,'NO',1,0,'C',1);
$pdf->cell(25,6,'NIS',1,0,'C',1);
$pdf->cell(45,6,'NAMA SISWA',1,0,'C',1);
$pdf->cell(25,6,'KELAS',1,0,'C',1);
$pdf->cell(25,6,'JURUSAN',1,0,'C',1);
$pdf->cell(40,6,'NO. TELEPON',1,0,'C',1);

$y = $y_initial + $row;

$sql = mysql_query("select * from tb_siswa order by nis");

$no = 0;
$row = 6;
while ($data = mysql_fetch_array($sql))
{
	$no++;
	$pdf->setY($y);
	$pdf->setX(20);
	$pdf->cell(7,6,$no,1,0,'C');
	$pdf->cell(25,6,$data[nis],1,0,'L');
	$pdf->cell(45,6,$data[nama_siswa],1,0,'L');
	$pdf->cell(25,6,$data[kelas],1,0,'C');
	$pdf->cell(25,6,$data[jurusan],1,0,'C');
	$pdf->cell(40,6,$data[telp],1,0,'L');
	$y = $y + $row;
}

$pdf->Output();

  header('location:../../main.php?module='.$module);
}

 
?>