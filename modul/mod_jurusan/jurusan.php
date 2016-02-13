<script Language="JavaScript">
<!-- 
function Blank_TextField_Validator()
{
if (text_form.jurusan.value == "")
{
   alert("jurusan tidak boleh kosong !");
   text_form.jurusan.focus();
   return (false);
}
return (true);
}
-->
</script>
<?php
include "pengaturan/fungsi_alert.php";
$aksi="modul/mod_jurusan/aksi_jurusan.php";
switch($_GET[act]){

  default:
  $offset=$_GET['offset'];
  
	$limit = 10;
	if (empty ($offset)) {
		$offset = 0;
	}
  $tampil=mysql_query("SELECT * FROM tb_jurusan ORDER BY jurusan");
    echo "<h2>Data Jurusan</h2>
          <img src='gambar/add.png' width='40' height='40' style='cursor:pointer' title='Tambah Data Jurusan' alt='tambah' onclick=\"window.location.href='?module=jurusan&act=tambahjurusan';\">";
	$baris=mysql_num_rows($tampil);

	if($baris>0){
	echo" <table>
          <tr>
		  <th>No</th>
		  <th width=200>Jurusan</th>
		  <th width=50>Aksi</th>
		  </tr>"; 
	$hasil = mysql_query("SELECT * FROM tb_jurusan ORDER BY jurusan limit $offset,$limit");
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
	         <td>$r[jurusan]</td>
			 <td align=center><a href=?module=jurusan&act=editjurusan&id=$r[id_jurusan]><img src='gambar/edit.png' title='Edit' alt='Edit' width='14' height='14'></a> &nbsp;
	               <a href=\"JavaScript: confirmIt('Anda yakin akan menghapusnya ?','$aksi?module=jurusan&act=hapus&id=$r[id_jurusan]','','','','u','n','Self','Self')\" onMouseOver=\"self.status=''; return true\" onMouseOut=\"self.status=''; return true\"><img src='gambar/hapus.png' title='Hapus' alt='Hapus' width='14' height='14'></a>
				   
             </td></tr>";
      $no++;
	  $counter++;
    }
    echo "</table>";
	echo "<div class=paging>";

	if ($offset!=0) {
		$prevoffset = $offset-10;
		echo "<span class=prevnext> <a href=$PHP_SELF?module=jurusan&offset=$prevoffset>Back</a></span>";
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
			echo "<a href=$PHP_SELF?module=jurusan&offset=$newoffset>$i</a>";
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
		echo "<span class=prevnext><a href=$PHP_SELF?module=jurusan&offset=$newoffset>Next</a>";
	}
	else {
		echo "<span class=disabled>Next</span>";//cetak halaman tanpa link
	}
	
	echo "</div>";
	}else{
	echo "<br><b>Data Kosong !</b>";
	}
    break;
  
  case "tambahjurusan":
    echo "<h2>Tambah Data Jurusan</h2>
          <form name=text_form method=POST action='$aksi?module=jurusan&act=input' onsubmit='return Blank_TextField_Validator()'>
          <table>
          <tr><td>Jurusan</td>   <td> : <input type=text name='jurusan' id='jurusan' size=30></td></tr>
		  <tr><td colspan=2><input type=image src=gambar/simpan.png name=submit width='40' height='40' title='Simpan' alt='Simpan'>
							<img src=gambar/batal.png style='cursor:pointer' width='40' height='40' title='Batal' alt='Batal' onclick=self.history.back() ></td></tr>
          </table></form>";
     break;
    
  case "editjurusan":
    $edit=mysql_query("SELECT * FROM tb_jurusan WHERE id_jurusan='$_GET[id]'");
    $r=mysql_fetch_array($edit);
	
    echo "<h2>Edit Data Jurusan</h2>
          <form name=text_form method=POST action='$aksi?module=jurusan&act=update' onsubmit='return Blank_TextField_Validator()' >
          <input type=hidden name=id value='$r[id_jurusan]'>
          <table>
	      <tr><td>jurusan</td> <td> : <input type=text id='jurusan' name='jurusan' value=\"$r[jurusan]\" size=30></td></tr>
          <tr><td colspan=2><input type=image src=gambar/update.png name=submit width='40' height='40' title='Update' alt='Update'>
							<img src=gambar/batal.png style='cursor:pointer' width='40' height='40' title='Batal' alt='Batal' onclick=self.history.back() ></td></tr>
          </table></form>";
    break;  
}
?>
