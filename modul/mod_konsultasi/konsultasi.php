<link type="text/css" href="css/smoothness/jquery-ui-1.8.24.custom.css" rel="stylesheet" />
		<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.24.custom.min.js"></script>
		<script type="text/javascript">
		$(function() {
		$( "#tgl_konsultasi" ).datepicker({
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
if (text_form.tgl_konsultasi.value == "")
{
   alert("Tanggal Konsultasi tidak boleh kosong !");
   text_form.tgl_konsultasi.focus();
   return (false);
}
if (text_form.hasil_konsultasi.value == "")
{
   alert("Hasil Konsultasi tidak boleh kosong !");
   text_form.hasil_konsultasi.focus();
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
$aksi="modul/mod_konsultasi/aksi_konsultasi.php";
switch($_GET[act]){

  default:
  $offset=$_GET['offset'];
  
	$limit = 10;
	if (empty ($offset)) {
		$offset = 0;
	}
  $tampil=mysql_query("SELECT * FROM tb_konsultasi ORDER BY id_konsultasi");
    echo "<h2>Data Konsultasi</h2>
          <img src='gambar/add.png' width='40' height='40' style='cursor:pointer' title='Tambah Data Konsultasi' alt='tambah' onclick=\"window.location.href='?module=konsultasi&act=tambahkonsultasi';\">
		   <a href=$aksi?module=konsultasi&act=cetak target='_blank'><img src='gambar/printer.jpg' title='Cetak Laporan Konsultasi' alt='Cetak' width='40' height='40'></a>";
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
		  <th width=150>Tanggal Konsultasi</th>
		  <th width=100>Aksi</th>
		  </tr>"; 
	$hasil = mysql_query("SELECT * FROM tb_konsultasi ORDER BY id_konsultasi limit $offset,$limit");
	$no = 1;
	$no = 1 + $offset;
	$warnaGenap = "#B2CCFF";   // warna tua
	$warnaGanjil = "#E0EBFF";  // warna muda
	$counter = 1;
    while ($r=mysql_fetch_array($hasil)){
	$tgl = explode("-", $r[tgl_konsultasi]);
$tgl2 = $tgl[2]."-".$tgl[1]."-".$tgl[0];
	if ($counter % 2 == 0) $warna = $warnaGenap;
	else $warna = $warnaGanjil;
       echo "<tr bgcolor='".$warna."'>
			 <td align=center>$no</td>
	         <td>$r[nis]</td>
			 <td align=center>$tgl2</td>
			 <td align=center><a href=?module=konsultasi&act=editkonsultasi&id=$r[id_konsultasi]><img src='gambar/edit.png' title='Edit' alt='Edit' width='14' height='14'></a> &nbsp;
	               <a href=\"JavaScript: confirmIt('Anda yakin akan menghapusnya ?','$aksi?module=konsultasi&act=hapus&id=$r[id_konsultasi]','','','','u','n','Self','Self')\" onMouseOver=\"self.status=''; return true\" onMouseOut=\"self.status=''; return true\"><img src='gambar/hapus.png' title='Hapus' alt='Hapus' width='14' height='14'></a>
				   &nbsp;   <a href=$aksi?module=konsultasi&act=print&id=$r[id_konsultasi] target='_blank'><img src='gambar/printer.png' title='Cetak' alt='Cetak' width='15' height='15'></a>
				   
             </td></tr>";
      $no++;
	  $counter++;
    }
    echo "</table>";
	echo "<div class=paging>";

	if ($offset!=0) {
		$prevoffset = $offset-10;
		echo "<span class=prevnext> <a href=$PHP_SELF?module=konsultasi&offset=$prevoffset>Back</a></span>";
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
			echo "<a href=$PHP_SELF?module=konsultasi&offset=$newoffset>$i</a>";
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
		echo "<span class=prevnext><a href=$PHP_SELF?module=konsultasi&offset=$newoffset>Next</a>";
	}
	else {
		echo "<span class=disabled>Next</span>";//cetak halaman tanpa link
	}
	
	echo "</div>";
	}else{
	echo "<br><b>Data Kosong !</b>";
	}
    break;
  
  case "tambahkonsultasi":
    echo "<h2>Tambah Data Konsultasi</h2>
          <form name=text_form method=POST action='$aksi?module=konsultasi&act=input' onsubmit='return Blank_TextField_Validator()' autocomplete='off'>
          <table>
		  <tr><td>NIS</td>   <td> : <input type=text name='nis' id='nis' size=30 onkeypress=\"return onlyNumbers();\"></td></tr>
		  <tr><td>Tanggal Konsultasi</td>   <td> : <input type=text name='tgl_konsultasi' id='tgl_konsultasi' size=30></td></tr>
		  <tr><td>Hasil Konsultasi</td>   <td> : <textarea name='hasil_konsultasi' id='hasil_konsultasi' cols=31 rows=3></textarea></td></tr></td></tr>
		  <tr><td colspan=2><input type=image src=gambar/simpan.png name=submit width='40' height='40' title='Simpan' alt='Simpan'>
							<img src=gambar/batal.png style='cursor:pointer' width='40' height='40' title='Batal' alt='Batal' onclick=self.history.back() ></td></tr>
          </table></form>";
     break;
    
  case "editkonsultasi":
    $edit=mysql_query("SELECT * FROM tb_konsultasi WHERE id_konsultasi='$_GET[id]'");
    $r=mysql_fetch_array($edit);
	$tgl = explode("-", $r[tgl_konsultasi]);
$tgl2 = $tgl[2]."-".$tgl[1]."-".$tgl[0];
    echo "<h2>Edit Data Konsultasi</h2>
          <form name=text_form method=POST action='$aksi?module=konsultasi&act=update' onsubmit='return Blank_TextField_Validator()' autocomplete='off'>
          <input type=hidden name=id value='$r[id_konsultasi]'>
          <table>
	      <tr><td>NIS</td> <td> : <input type=text id='nis' name='nis' value=\"$r[nis]\" size=30 onkeypress=\"return onlyNumbers();\"></td></tr>
		  <tr><td>Tanggal Konsultasi</td>   <td> : <input type=text name='tgl_konsultasi' id='tgl_konsultasi' size=30 value=\"$tgl2\"></td></tr>
		  <tr><td>Hasil Konsultasi</td>   <td> : <input type=text name='hasil_konsultasi' id='hasil_konsultasi' size=30 value=\"$r[hasil_konsultasi]\"></td></tr>
          <tr><td colspan=2><input type=image src=gambar/update.png name=submit width='40' height='40' title='Update' alt='Update'>
							<img src=gambar/batal.png style='cursor:pointer' width='40' height='40' title='Batal' alt='Batal' onclick=self.history.back() ></td></tr>
          </table></form>";
    break;  
}
?>
