<html>
<head>
<link type="text/css" href="css/smoothness/jquery-ui-1.8.24.custom.css" rel="stylesheet" />
		<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.24.custom.min.js"></script>
</head>
<body>
<?php
include "pengaturan/fungsi_alert.php";
$aksi="modul/mod_siswa/aksi_siswa.php";
echo "<h2>Cari Data Siswa</h2>

<form method='post' action='?module=showsiswa'>
<table>
  
   <tr><td><select name=pilih id=pilih>
			<option value='NIS'>NIS Siswa</option>
			<option value='Nama'>Nama Siswa</option>
			</select></td><td><input type='text' name='cari' id='cari'></td></tr>
   
   <tr><td></td><td><input type=image src=gambar/cari.png name=submit width='40' height='40' title='Cari' alt='Cari'><img src=gambar/hapus.png style='cursor:pointer' width='40' height='40' title='Batal' alt='Batal' onclick=\"window.location.href='?module=siswa';\" ></td></tr>   
</table></form>";


include "pengaturan/koneksi.php";

if($_POST['pilih']=='NIS'){
$nis = $_POST['cari'];
$bagianWhere  = "nis LIKE '%$nis%'";
$bagianParam  = "nis=".$nis;
}else{
$nis = $_POST['cari'];
$bagianWhere  = "nama_siswa LIKE '%$nis%'";
$bagianParam  = "nama_siswa=".$nis;
}
// jumlah data yang akan ditampilkan per halaman

$dataPerPage = 10;

// apabila $_GET['page'] sudah didefinisikan, gunakan nomor halaman tersebut, 
// sedangkan apabila belum, nomor halamannya 1.

if(isset($_GET['page']))
{
    $noPage = $_GET['page'];
} 
else $noPage = 1;

// perhitungan offset

$offset = ($noPage - 1) * $dataPerPage;

// query SQL untuk menampilkan data perhalaman sesuai offset

$query = "SELECT * FROM tb_siswa WHERE ".$bagianWhere." LIMIT $offset, $dataPerPage";

$hasil = mysql_query($query);
$jum = mysql_num_rows($hasil);

// menampilkan data

if ($jum > 0)
{

// menampilkan data 
$i=$offset+1;
echo" <table>
          <tr>
		  <th>No</th>
		  <th width=50>NIS</th>
		  <th width=150>Nama Lengkap</th>
		  <th width=50>Kelas</th>
		  <th width=100>Jurusan</th>
		  <th width=100>Aksi</th>
		  </tr>"; 
		  
$warnaGenap = "#B2CCFF";   // warna tua
$warnaGanjil = "#E0EBFF";  // warna muda
$counter = 1;

while ($data = mysql_fetch_array($hasil))
{
if ($counter % 2 == 0) $warna = $warnaGenap;
	else $warna = $warnaGanjil;
	 echo "<tr bgcolor='".$warna."'>
			 <td align=center>$i</td>
	         <td align=center>$data[nis]</td>
			 <td>$data[nama_siswa]</td>
			 <td align=center>$data[kelas]</td>
			 <td align=center>$data[jurusan]</td>
			 <td align=center><a href=?module=siswa&act=editsiswa&id=$data[nis]><img src='gambar/edit.png' title='Edit' alt='Edit' width='14' height='14'></a> &nbsp;
	               <a href=\"JavaScript: confirmIt('Anda yakin akan menghapusnya ?','$aksi?module=siswa&act=hapus&id=$data[nis]','','','','u','n','Self','Self')\" onMouseOver=\"self.status=''; return true\" onMouseOut=\"self.status=''; return true\"><img src='gambar/hapus.png' title='Hapus' alt='Hapus' width='14' height='14'></a>
				&nbsp;   <a href=$aksi?module=siswa&act=print&id=$data[nis] target='_blank'><img src='gambar/printer.png' title='Cetak' alt='Cetak' width='15' height='15'></a>
             </td></tr>";
$i++;
$counter++;
}
echo "</table>";
echo "<br>";
}

else echo "
		<div class=\"ui-widget\">
			<div class=\"ui-state-highlight ui-corner-all\" style=\"margin-top: 20px; padding: 0 .7em;\">
				<span class=\"ui-icon ui-icon-info\" style=\"float: left; margin-right: .3em;\"></span>
				<strong>Data tidak ditemukan !</strong>
			</div>
		</div>";

// mencari jumlah semua data dalam tabel guestbook

$query  = "SELECT COUNT(*) AS jumData FROM tb_siswa WHERE ".$bagianWhere;
$hasil  = mysql_query($query);
$data   = mysql_fetch_array($hasil);

$jumData = $data['jumData'];

// menentukan jumlah halaman yang muncul berdasarkan jumlah semua data

$jumPage = ceil($jumData/$dataPerPage);

// menampilkan link previous

if ($noPage > 1) echo  "<a href='".$_SERVER['PHP_SELF']."?module=showsiswa&page=".($noPage-1)."&".$bagianParam."'>&lt;&lt; Prev</a>";

// memunculkan nomor halaman dan linknya

for($page = 1; $page <= $jumPage; $page++)
{
         if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
         {   
            if (($showPage == 1) && ($page != 2))  echo "..."; 
            if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  echo "...";
            if ($page == $noPage) echo " <b>".$page."</b> ";
            else echo " <a href='".$_SERVER['PHP_SELF']."?module=showsiswa&page=".$page."&".$bagianParam."'>".$page."</a> ";
            $showPage = $page;          
         }
}

// menampilkan link next

if ($noPage < $jumPage) echo "<a href='".$_SERVER['PHP_SELF']."?module=showsiswa&page=".($noPage+1)."&".$bagianParam."'>Next &gt;&gt;</a>";

?>
</body>
</html>