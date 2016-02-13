<?php
include "pengaturan/koneksi.php";
include "pengaturan/library.php";
include "pengaturan/fungsi_indotgl.php";

if ($_GET[module]=='home') {
	echo "<h2>Selamat Datang</h2>
		<p>Hai <b>$_SESSION[namalengkap]</b>, Selamat datang di Aplikasi Bimbingan & Konseling SMA Negeri 1 Manonjaya.<br>Silahkan Pilih menu disamping untuk mengolah data.</p>
	<p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>";
}
elseif ($_GET[module]=='password'){
  include "modul/mod_password/password.php";
}

elseif ($_GET[module]=='asal'){
  include "modul/mod_asal/asal.php";
}

elseif ($_GET[module]=='kelas'){
  include "modul/mod_kelas/kelas.php";
}

elseif ($_GET[module]=='jurusan'){
  include "modul/mod_jurusan/jurusan.php";
}

elseif ($_GET[module]=='siswa'){
  include "modul/mod_siswa/siswa.php";
}

elseif ($_GET[module]=='konsultasi'){
  include "modul/mod_konsultasi/konsultasi.php";
}

elseif ($_GET[module]=='konseling'){
  include "modul/mod_konseling/konseling.php";
}

elseif ($_GET[module]=='lap_konsultasi'){
  include "modul/mod_laporan_konsultasi/laporan_konsultasi.php";
}

elseif ($_GET[module]=='lap_konseling'){
  include "modul/mod_laporan_konseling/laporan_konseling.php";
}

elseif ($_GET[module]=='surat_ortu'){
  include "modul/mod_suratundanganorangtua/suratundanganorangtua.php";
}

elseif ($_GET[module]=='surat_siswa'){
  include "modul/mod_surat_panggilansiswa/surat_panggilansiswa.php";
}

elseif ($_GET[module]=='user'){
  include "modul/mod_user/user.php";
}

elseif ($_GET[module]=='showsiswa'){
  include "modul/mod_siswa/showsiswa.php";
}

else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}
?>
