<script Language="JavaScript">
<!-- 
function Blank_TextField_Validator()
{
if (text_form.no_surat.value == "")
{
   alert("Nomor Surat tidak boleh kosong !");
   text_form.no_surat.focus();
   return (false);
}
if (text_form.perihal.value == "")
{
   alert("Perihal tidak boleh kosong !");
   text_form.perihal.focus();
   return (false);
}
if (text_form.nis.value == "")
{
   alert("NIS Siswa tidak boleh kosong !");
   text_form.nis.focus();
   return (false);
}

if (text_form.jam.value == "")
{
   alert("Jam tidak boleh kosong !");
   text_form.jam.focus();
   return (false);
}
if (text_form.perlu.value == "")
{
   alert("Keperluan tidak boleh kosong !");
   text_form.perlu.focus();
   return (false);
}
if (text_form.guru.value == "")
{
   alert("Guru tidak boleh kosong !");
   text_form.guru.focus();
   return (false);
}

return (true);
}
-->
</script>
<link type="text/css" href="css/smoothness/jquery-ui-1.8.24.custom.css" rel="stylesheet" />
		<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.24.custom.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
				<script type="text/javascript">
		$(function() {
				$( "#jam" ).timepicker({
				
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
$aksi="modul/mod_surat_panggilansiswa/aksi_surat_panggilansiswa.php";
switch($_GET[act]){

  default:
  $offset=$_GET['offset'];
  
	$limit = 10;
	if (empty ($offset)) {
		$offset = 0;
	}
  $tampil=mysql_query("SELECT * FROM tb_surat_panggilansiswa ORDER BY no_surat");
    echo "<h2>Surat Panggilan Siswa</h2>
          <img src='gambar/add.png' width='40' height='40' style='cursor:pointer' title='Tambah Surat Panggilan Siswa' alt='tambah' onclick=\"window.location.href='?module=surat_siswa&act=tambahsurat_panggilansiswa';\">
		  <a href=$aksi?module=surat_siswa&act=print target='_blank'><img src='gambar/printer.jpg' title='Cetak Laporan Surat Panggilan Siswa' alt='Cetak' width='40' height='40'></a>";
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
		  <th width=100>No Surat</th>
		  <th width=100>Perihal</th>
		  <th width=100>NIS Siswa</th>
		  <th width=50>Aksi</th>
		  </tr>"; 
	$hasil = mysql_query("SELECT * FROM tb_surat_panggilansiswa ORDER BY no_surat limit $offset,$limit");
	$no = 1;
	$no = 1 + $offset;
	$warnaGenap = "#B2CCFF";   // warna tua
	$warnaGanjil = "#E0EBFF";  // warna muda
	$counter = 1;
    while ($r=mysql_fetch_array($hasil)){
	if ($counter % 2 == 0) $warna = $warnaGenap;
	else $warna = $warnaGanjil;
       echo "<tr bgcolor='".$warna."'>
			 <td align=center>$no</td>
	         <td>$r[no_surat]</td>
			 <td>$r[perihal]</td>
			 <td>$r[nis]</td>
			 <td align=center><a href=$aksi?module=surat_siswa&act=cetak&id=$r[no_surat] target='_blank'><img src='gambar/Printer.png' title='Cetak' alt='Cetak' width='14' height='14'></a> &nbsp;
	               <a href=\"JavaScript: confirmIt('Anda yakin akan menghapusnya ?','$aksi?module=surat_siswa&act=hapus&id=$r[no_surat]','','','','u','n','Self','Self')\" onMouseOver=\"self.status=''; return true\" onMouseOut=\"self.status=''; return true\"><img src='gambar/hapus.png' title='Hapus' alt='Hapus' width='14' height='14'></a>
				   
             </td></tr>";
      $no++;
	  $counter++;
    }
    echo "</table>";
	echo "<div class=paging>";

	if ($offset!=0) {
		$prevoffset = $offset-10;
		echo "<span class=prevnext> <a href=$PHP_SELF?module=surat_siswa=$prevoffset>Back</a></span>";
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
			echo "<a href=$PHP_SELF?module=surat_siswa&offset=$newoffset>$i</a>";
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
		echo "<span class=prevnext><a href=$PHP_SELF?module=surat_siswa&offset=$newoffset>Next</a>";
	}
	else {
		echo "<span class=disabled>Next</span>";//cetak halaman tanpa link
	}
	
	echo "</div>";
	}else{
	echo "<br><b>Surat Panggilan Siswa Kosong !</b>";
	}
    break;
  
  case "tambahsurat_panggilansiswa":
    echo "<h2>Tambah Surat Panggilan Siswa</h2>
          <form name=text_form method=POST action='$aksi?module=surat_siswa&act=input' onsubmit='return Blank_TextField_Validator()' autocomplete='off'>
          <table>
		  <tr><td>No Surat</td>   <td> : <input type=text name='no_surat' id='no_surat' size=30></td></tr>
          <tr><td>Perihal</td>   <td> : <input type=text name='perihal' id='perihal' size=30></td></tr>
		  <tr><td>NIS</td>   <td> : <input type=text name='nis' id='nis' size=30 onkeypress=\"return onlyNumbers();\"></td></tr>
		  <tr><td>Jam</td>   <td> : <input type=text name='jam' id='jam' size=30></td></tr>
		  <tr><td>Keperluan</td>   <td> : <input type=text name='perlu' id='perlu' size=30></td></tr>
		  <tr><td>Guru</td>   <td> : <input type=text name='guru' id='guru' size=30></td></tr>
		  <tr><td>NIP</td>   <td> : <input type=text name='nip' id='nip' size=30 onkeypress=\"return onlyNumbers();\"></td></tr>
		  <tr><td colspan=2><input type=image src=gambar/simpan.png name=submit width='40' height='40' title='Simpan' alt='Simpan'>
							<img src=gambar/batal.png style='cursor:pointer' width='40' height='40' title='Batal' alt='Batal' onclick=self.history.back() ></td></tr>
          </table></form>";
     break;

}
?>
