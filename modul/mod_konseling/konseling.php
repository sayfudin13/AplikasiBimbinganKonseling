<link type="text/css" href="css/smoothness/jquery-ui-1.8.24.custom.css" rel="stylesheet" />
		<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.24.custom.min.js"></script>
		<script type="text/javascript">
		$(function() {
		$( "#tgl" ).datepicker({
				changeMonth: true,
				changeYear: true,
				yearRange: "2012:2013",
				dateFormat: "dd-mm-yy"
			});
		});
		function onlyNumbers(evt)
		{
			var e = event || evt;
			var charCode = e.which || e.keyCode;
			if (charCode > 31 && (charCode < 48 || charCode > 57))
				return false;
			return true;
		}
		</script>
<script Language="JavaScript">
<!-- 
function Blank_TextField_Validator()
{
if (text_form.nis.value == "")
{
   alert("NIS Siswa tidak boleh kosong !");
   text_form.nis.focus();
   return (false);
}
if (text_form.tgl.value == "")
{
   alert("Tanggal Konseling tidak boleh kosong !");
   text_form.tgl.focus();
   return (false);
}
if (text_form.kasus.value == "")
{
   alert("Kasus tidak boleh kosong !");
   text_form.kasus.focus();
   return (false);
}
if (text_form.deskripsi_masalah.value == "")
{
   alert("Deskripsi Masalah tidak boleh kosong !");
   text_form.deskripsi_masalah.focus();
   return (false);
}
if (text_form.diagnosa_masalah.value == "")
{
   alert("Diagnosa Masalah tidak boleh kosong !");
   text_form.diagnosa_masalah.focus();
   return (false);
}
if (text_form.tindak_lanjut.value == "")
{
   alert("Tindak Lanjut tidak boleh kosong !");
   text_form.tindak_lanjut.focus();
   return (false);
}

return (true);
}
-->
</script>
<script type='text/javascript' src='autocomplete/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="autocomplete/jquery.autocomplete.css" />

<script type="text/javascript">
$().ready(function() {
	$("#nis").autocomplete("autocomplete/get_list.php", {
		width: 260,
		matchContains: true,
		selectFirst: false
	});
});
</script>
<?php
include "pengaturan/fungsi_alert.php";
$aksi="modul/mod_konseling/aksi_konseling.php";
switch($_GET[act]){

  default:
  $offset=$_GET['offset'];
  
	$limit = 10;
	if (empty ($offset)) {
		$offset = 0;
	}
  $tampil=mysql_query("SELECT * FROM tb_konseling ORDER BY id_konseling");
    echo "<h2>Data Konseling</h2>
          <img src='gambar/add.png' width='40' height='40' style='cursor:pointer' title='Tambah Data Konseling' alt='tambah' onclick=\"window.location.href='?module=konseling&act=tambahkonseling';\">
		  <a href=$aksi?module=konseling&act=cetak target='_blank'><img src='gambar/printer.jpg' title='Cetak Laporan Konseling' alt='Cetak' width='40' height='40'></a>";
	$baris=mysql_num_rows($tampil);
if(isset($_GET['pesan'])){
		echo "
		
		<div class=\"ui-widget\">
			<div class=\"ui-state-highlight ui-corner-all\" style=\"margin-top: 20px; padding: 0 .7em;\">
				<span class=\"ui-icon ui-icon-info\" style=\"float: left; margin-right: .3em;\"></span>
				<strong>".$_GET['pesan']."</strong>
			</div>
		</div>";
	}
	if($baris>0){
	echo" <table>
          <tr>
		  <th>No</th>
		  <th width=100>NIS</th>
		  <th width=100>Tanggal</th>
		  <th width=150>Kasus</th>
		  <th width=100>Aksi</th>
		  </tr>"; 
	$hasil = mysql_query("SELECT * FROM tb_konseling ORDER BY id_konseling limit $offset,$limit");
	$no = 1;
	$no = 1 + $offset;
	$warnaGenap = "#B2CCFF";   // warna tua
	$warnaGanjil = "#E0EBFF";  // warna muda
	$counter = 1;
    while ($r=mysql_fetch_array($hasil)){
	$tgl = explode("-", $r[tgl]);
$tgl2 = $tgl[2]."-".$tgl[1]."-".$tgl[0];
	if ($counter % 2 == 0) $warna = $warnaGenap;
	else $warna = $warnaGanjil;
       echo "<tr bgcolor='".$warna."'>
			 <td align=center>$no</td>
	         <td>$r[nis]</td>
			 <td align=center>$tgl2</td>
			 <td>$r[kasus]</td>
			 <td align=center><a href=?module=konseling&act=editkonseling&id=$r[id_konseling]><img src='gambar/edit.png' title='Edit' alt='Edit' width='14' height='14'></a> &nbsp;
	               <a href=\"JavaScript: confirmIt('Anda yakin akan menghapusnya ?','$aksi?module=konseling&act=hapus&id=$r[id_konseling]','','','','u','n','Self','Self')\" onMouseOver=\"self.status=''; return true\" onMouseOut=\"self.status=''; return true\"><img src='gambar/hapus.png' title='Hapus' alt='Hapus' width='14' height='14'></a>
				   &nbsp;   <a href=$aksi?module=konseling&act=print&id=$r[id_konseling] target='_blank'><img src='gambar/printer.png' title='Cetak' alt='Cetak' width='15' height='15'></a>
				   
             </td></tr>";
      $no++;
	  $counter++;
    }
    echo "</table>";
	echo "<div class=paging>";

	if ($offset!=0) {
		$prevoffset = $offset-10;
		echo "<span class=prevnext> <a href=$PHP_SELF?module=konseling&offset=$prevoffset>Back</a></span>";
	}
	else {
		echo "<span class=disabled>Back</span>";//cetak halaman tanpa link
	}
	//hitung jumlah halaman
	$halaman = intval($baris/$limit);//Pembulatan

	if ($baris%$limit){
		$halaman++;
	}
	for($i=1;$i<=$halaman;$i++){
		$newoffset = $limit * ($i-1);
		if($offset!=$newoffset){
			echo "<a href=$PHP_SELF?module=konseling&offset=$newoffset>$i</a>";
			//cetak halaman
		}
		else {
			echo "<span class=current>".$i."</span>";//cetak halaman tanpa link
		}
	}

	//cek halaman akhir
	if(!(($offset/$limit)+1==$halaman) && $halaman !=1){

		//jika bukan halaman terakhir maka berikan next
		$newoffset = $offset + $limit;
		echo "<span class=prevnext><a href=$PHP_SELF?module=kelas&offset=$newoffset>Next</a>";
	}
	else {
		echo "<span class=disabled>Next</span>";//cetak halaman tanpa link
	}
	
	echo "</div>";
	}else{
	echo "<br><b>Data Kosong !</b>";
	}
    break;
  
  case "tambahkonseling":
    echo "<h2>Tambah Data Konseling</h2>
          <form name=text_form method=POST action='$aksi?module=konseling&act=input' onsubmit='return Blank_TextField_Validator()' autocomplete='off'>
          <table>
		  <tr><td>NIS</td>   <td> : <input type=text name='nis' id='nis' size=30 onkeypress=\"return onlyNumbers();\"></td></tr>
		  <tr><td>Tanggal</td>   <td> : <input type=text name='tgl' id='tgl' size=30></td></tr>
		  <tr><td>Kasus</td>   <td> : <textarea name='kasus' id='kasus' cols=31 rows=3></textarea></td></tr>
		  <tr><td>Deskripsi Masalah</td>   <td> : <textarea name='deskripsi_masalah' id='deskripsi_masalah' cols=31 rows=3></textarea></td></tr>
		  <tr><td>Diagnosa Masalah</td>   <td> : <textarea name='diagnosa_masalah' id='diagnosa_masalah' cols=31 rows=3></textarea></td></tr>
		  <tr><td>Tindak Lanjut</td>   <td> : <textarea name='tindak_lanjut' id='tindak_lanjut' cols=31 rows=3></textarea></td></tr>
		  <tr><td colspan=2><input type=image src=gambar/simpan.png name=submit width='40' height='40' title='Simpan' alt='Simpan'>
							<img src=gambar/batal.png style='cursor:pointer' width='40' height='40' title='Batal' alt='Batal' onclick=self.history.back() ></td></tr>
          </table></form>";
     break;
    
  case "editkonseling":
    $edit=mysql_query("SELECT * FROM tb_konseling WHERE id_konseling='$_GET[id]'");
    $r=mysql_fetch_array($edit);
	$tgl = explode("-", $r[tgl]);
$tgl2 = $tgl[2]."-".$tgl[1]."-".$tgl[0];
    echo "<h2>Edit Data Konseling</h2>
          <form name=text_form method=POST action='$aksi?module=konseling&act=update' onsubmit='return Blank_TextField_Validator()' autocomplete='off'>
          <input type=hidden name=id value='$r[id_konseling]'>
          <table>
		  <tr><td>NIS</td>   <td> : <input type=text name='nis' id='nis' size=30 value=\"$r[nis]\" onkeypress=\"return onlyNumbers();\"></td></tr>
		  <tr><td>Tanggal</td>   <td> : <input type=text name='tgl' id='tgl' size=30 value=\"$tgl2\"></td></tr>
		  <tr><td>Kasus</td>   <td> : <input type=text name='kasus' id='kasus' size=30 value=\"$r[kasus]\"></td></tr>
		  <tr><td>Deskripsi Masalah</td>   <td> : <input type=text name='deskripsi_masalah' id='deskripsi_masalah' size=30 value=\"$r[deskripsi_masalah]\"></td></tr>
		  <tr><td>Diagnosa Masalah</td>   <td> : <input type=text name='diagnosa_masalah' id='diagnosa_masalah' size=30 value=\"$r[diagnosa_masalah]\"></td></tr>
		  <tr><td>Tindak Lanjut</td>   <td> : <input type=text name='tindak_lanjut' id='tindak_lanjut' size=30 value=\"$r[tindak_lanjut]\"></td></tr>
          <tr><td colspan=2><input type=image src=gambar/update.png name=submit width='40' height='40' title='Update' alt='Update'>
							<img src=gambar/batal.png style='cursor:pointer' width='40' height='40' title='Batal' alt='Batal' onclick=self.history.back() ></td></tr>
          </table></form>";
    break;  
}
?>
