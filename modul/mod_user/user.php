<script Language="JavaScript">
<!-- 
function Blank_TextField_Validator()
{
if (text_form.namauser.value == "")
{
   alert("nama user tidak boleh kosong !");
   text_form.namauser.focus();
   return (false);
}
if (text_form.password.value == "")
{
   alert("Password tidak boleh kosong !");
   text_form.password.focus();
   return (false);
}
if (text_form.nama_lengkap.value == "")
{
   alert("Nama Lengkap tidak boleh kosong !");
   text_form.nama_lengkap.focus();
   return (false);
}
return (true);
}
-->
</script>
<?php
include "pengaturan/fungsi_alert.php";
$aksi="modul/mod_user/aksi_user.php";
switch($_GET[act]){
	// Tampil user
  default:
  $offset=$_GET['offset'];
	//jumlah data yang ditampilkan perpage
	$limit = 10;
	if (empty ($offset)) {
		$offset = 0;
	}
  $tampil=mysql_query("SELECT * FROM tb_user ORDER BY namauser");
    echo "<h2>Data user</h2>
          <img src='gambar/tambahuser.png' width='40' height='40' style='cursor:pointer' title='Tambah User' alt='tambah' onclick=\"window.location.href='?module=user&act=tambahuser';\">";
	$baris=mysql_num_rows($tampil);

	if($baris>0){
	echo" <table>
          <tr>
		  <th>No</th>
		  <th width=100>Nama User</th>
		  <th width=150>Nama Lengkap</th>
		  <th width=120>NIP</th>
		  <th width=50>Aksi</th>
		  </tr>"; 
	$hasil = mysql_query("SELECT * FROM tb_user ORDER BY namauser limit $offset,$limit");
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
	         <td>$r[namauser]</td>
			 <td>$r[nama_lengkap]</td>
			 <td>$r[nip]</td>
			 <td align=center><a href=?module=user&act=edituser&id=$r[namauser]><img src='gambar/edit.png' title='Edit' alt='Edit' width='14' height='14'></a> &nbsp;
	               <a href=\"JavaScript: confirmIt('Anda yakin akan menghapusnya ?','$aksi?module=user&act=hapus&id=$r[namauser]','','','','u','n','Self','Self')\" onMouseOver=\"self.status=''; return true\" onMouseOut=\"self.status=''; return true\"><img src='gambar/hapus.png' title='Hapus' alt='Hapus' width='14' height='14'></a>
				   
             </td></tr>";
      $no++;
	  $counter++;
    }
    echo "</table>";
	echo "<div class=paging>";

	if ($offset!=0) {
		$prevoffset = $offset-10;
		echo "<span class=prevnext> <a href=$PHP_SELF?module=user&offset=$prevoffset>Back</a></span>";
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
			echo "<a href=$PHP_SELF?module=user&offset=$newoffset>$i</a>";
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
		echo "<span class=prevnext><a href=$PHP_SELF?module=user&offset=$newoffset>Next</a>";
	}
	else {
		echo "<span class=disabled>Next</span>";//cetak halaman tanpa link
	}
	
	echo "</div>";
	}else{
	echo "<br><b>Data Kosong !</b>";
	}
    break;
  
  case "tambahuser":
    echo "<h2>Tambah Data User</h2>
          <form name=text_form method=POST action='$aksi?module=user&act=input' onsubmit='return Blank_TextField_Validator()'>
          <table>
          <tr><td>Nama User</td>   <td> : <input type=text id='namauser' name='namauser' size=30></td></tr>
		  <tr><td>Password</td>   <td> : <input type=password id='password' name='password' size=30></td></tr>
		  <tr><td>NIP</td>   <td> : <input type=text id='nip' name='nip' size=30></td></tr>
		  <tr><td>Nama Lengkap</td>   <td> : <input type=text id='nama_lengkap' name='nama_lengkap' size=30></td></tr>
		  <tr><td colspan=2><input type=image src=gambar/simpan.png name=submit width='40' height='40' title='Simpan' alt='Simpan'>
							<img src=gambar/batal.png style='cursor:pointer' width='40' height='40' title='Batal' alt='Batal' onclick=self.history.back() ></td></tr>
          </table></form>";
     break;
    
  case "edituser":
    $edit=mysql_query("SELECT * FROM tb_user WHERE namauser='$_GET[id]'");
    $r=mysql_fetch_array($edit);
	
    echo "<h2>Edit Data User</h2>
          <form name=text_form method=POST action='$aksi?module=user&act=update' onsubmit='return Blank_TextField_Validator()'>
          <input type=hidden name=id value='$r[id_user]'>
          <table>
	      <tr><td>Nama User</td> <td> : <input type=text id='namauser' name='namauser' value=\"$r[namauser]\" size=30></td></tr>
		  <tr><td>NIP</td> <td> : <input type=text id='nip' name='nip' value=\"$r[nip]\" size=30></td></tr>
		  <tr><td>Nama Lengkap</td> <td> : <input type=text id='nama_lengkap' name='nama_lengkap' value=\"$r[nama_lengkap]\" size=30></td></tr>
          <tr><td colspan=2><input type=image src=gambar/update.png name=submit width='40' height='40' title='Update' alt='Update'>
							<img src=gambar/batal.png style='cursor:pointer' width='40' height='40' title='Batal' alt='Batal' onclick=self.history.back() ></td></tr>
          </table></form>";
    break;  
}
?>
