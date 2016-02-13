<?php
include "pengaturan/fungsi_alert.php";
  echo "
  <ul>
	<li><a href=?module=home>Home</a></li>";
	if($_SESSION['level']=='admin'){
	echo "
	<li><a href=?module=password>Ubah Password</a></li>";
	}
	echo"
	<li><a href=?module=user>Data User</a></li>
	<li><a href=?module=asal>Data Asal Sekolah</a></li>
	<li><a href=?module=kelas>Data Kelas</a></li>
	<li><a href=?module=jurusan>Data Jurusan</a></li>
	<li><a href=?module=siswa>Data Siswa</a></li>
	<li><a href=?module=konsultasi> Data Konsultasi</a></li>
	<li><a href=?module=konseling>Data Konseling</a></li>
	<li><a href=?module=surat_ortu>Surat Undangan Orang Tua</a></li>
	<li><a href=?module=surat_siswa>Surat Panggilan Siswa</a></li>
	<li><a href=\"JavaScript: confirmIt('Anda yakin akan logout dari aplikasi ?','logout.php','','','','u','n','Self','Self')\" onMouseOver=\"self.status=''; return true\" onMouseOut=\"self.status=''; return true\">Logout</a></li>
	</ul>
  ";
 
?>
