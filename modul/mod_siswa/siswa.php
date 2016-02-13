<link type="text/css" href="css/smoothness/jquery-ui-1.8.24.custom.css" rel="stylesheet" />
		<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.24.custom.min.js"></script>
		<script type="text/javascript">
		$(function() {
		$( "#tgl_lahir" ).datepicker({
				changeMonth: true,
				changeYear: true,
				yearRange: "1970:2013",
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
		function ValidateAlpha()
		{
		var keyCode = window.event.keyCode;
		if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
		{
		window.event.returnValue = false;
		//alert("Enter only letters");
		}
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
if (text_form.nama_siswa.value == "")
{
   alert("Nama Siswa tidak boleh kosong !");
   text_form.nama_siswa.focus();
   return (false);
}
if (text_form.kelas.value == "")
{
   alert("Kelas Siswa tidak boleh kosong !");
   text_form.kelas.focus();
   return (false);
}
if (text_form.jurusan.value == "")
{
   alert("Jurusan Siswa tidak boleh kosong !");
   text_form.jurusan.focus();
   return (false);
}
if (text_form.gol_darah.value == "")
{
   alert("Golongan Darah Siswa tidak boleh kosong !");
   text_form.gol_darah.focus();
   return (false);
}
if (text_form.jns_kelamin.value == "")
{
   alert("Jenis Kelamin Siswa tidak boleh kosong !");
   text_form.jns_kelamin.focus();
   return (false);
}
if (text_form.tpt_lahir.value == "")
{
   alert("Tempat Lahir Siswa tidak boleh kosong !");
   text_form.tpt_lahir.focus();
   return (false);
}
if (text_form.tgl_lahir.value == "")
{
   alert("Tanggal Lahir Siswa tidak boleh kosong !");
   text_form.tgl_lahir.focus();
   return (false);
}
if (text_form.agama.value == "")
{
   alert("Agama Siswa tidak boleh kosong !");
   text_form.agama.focus();
   return (false);
}
if (text_form.anak_ke.value == "")
{
   alert("Anak Ke- Siswa tidak boleh kosong !");
   text_form.anak_ke.focus();
   return (false);
}
if (text_form.jml_saudara.value == "")
{
   alert("Jumlah Saudara Siswa tidak boleh kosong !");
   text_form.jml_saudara.focus();
   return (false);
}
if (text_form.anak_ke.value > text_form.jml_saudara.value)
{
   alert("Anak ke harus lebih kecil dari jumlah saudara !");
   text_form.anak_ke.focus();
   return (false);
}
if (text_form.asal_sekolah.value == "")
{
   alert("Asal Sekolah Siswa tidak boleh kosong !");
   text_form.asal_sekolah.focus();
   return (false);
}
if (text_form.jml_SKHU.value == "")
{
   alert("Jumlah SKHU Siswa tidak boleh kosong !");
   text_form.jml_SKHU.focus();
   return (false);
}
if (text_form.telp.value == "")
{
   alert("Nomor Telepon Siswa tidak boleh kosong !");
   text_form.telp.focus();
   return (false);
}
if (text_form.alamat.value == "")
{
   alert("Alamat Siswa tidak boleh kosong !");
   text_form.alamat.focus();
   return (false);
}
if (text_form.status_ayah.value == "")
{
   alert("Status Ayah Siswa tidak boleh kosong !");
   text_form.status_ayah.focus();
   return (false);
}
if (text_form.nama_ayah.value == "")
{
   alert("Nama Ayah Siswa tidak boleh kosong !");
   text_form.nama_ayah.focus();
   return (false);
}
if (text_form.umur_ayah.value == "")
{
   alert("Umur Ayah Siswa tidak boleh kosong !");
   text_form.umur_ayah.focus();
   return (false);
}
if (text_form.pekerjaan_ayah.value == "")
{
   alert("Pekerjaan Ayah Siswa tidak boleh kosong !");
   text_form.pekerjaan_ayah.focus();
   return (false);
}
if (text_form.agama_ayah.value == "")
{
   alert("Agama Ayah Siswa tidak boleh kosong !");
   text_form.agama_ayah.focus();
   return (false);
}
if (text_form.pend_akhir_ayah.value == "")
{
   alert("Pendidikan Akhir Ayah Siswa tidak boleh kosong !");
   text_form.pend_akhir_ayah.focus();
   return (false);
}
if (text_form.status_ibu.value == "")
{
   alert("Status Ibu tidak boleh kosong !");
   text_form.status_ibu.focus();
   return (false);
}
if (text_form.nama_ibu.value == "")
{
   alert("Nama Ibu tidak boleh kosong !");
   text_form.nama_ibu.focus();
   return (false);
}
if (text_form.umur_ibu.value == "")
{
   alert("Umur Ibu Siswa tidak boleh kosong !");
   text_form.umur_ibu.focus();
   return (false);
}
if (text_form.pekerjaan_ibu.value == "")
{
   alert("Pekerjaan Ibu Siswa tidak boleh kosong !");
   text_form.pekerjaan_ibu.focus();
   return (false);
}
if (text_form.agama_ibu.value == "")
{
   alert("Agama Ibu Siswa tidak boleh kosong !");
   text_form.agama_ibu.focus();
   return (false);
}
if (text_form.pend_akhir_ibu.value == "")
{
   alert("Pendidikan Akhir Ibu Siswa tidak boleh kosong !");
   text_form.pend_akhir_ibu.focus();
   return (false);
}
if (text_form.cari.value == "")
{
   alert("Isi dulu cari !");
   text_form.cari.focus();
   return (false);
}
return (true);
}
-->
</script>

<?php
include "pengaturan/fungsi_alert.php";
$aksi="modul/mod_siswa/aksi_siswa.php";
switch($_GET[act]){

  default:
  $offset=$_GET['offset'];
  
	$limit = 10;
	if (empty ($offset)) {
		$offset = 0;
	}
  $tampil=mysql_query("SELECT * FROM tb_siswa ORDER BY nama_siswa");
    echo "<h2>Data Siswa</h2>
          <img src='gambar/add.png' width='40' height='40' style='cursor:pointer' title='Tambah Data Siswa' alt='tambah' onclick=\"window.location.href='?module=siswa&act=tambahsiswa';\">
		  <img src='gambar/cari.png' width='40' height='40' style='cursor:pointer' title='Cari Siswa' alt='cari' onclick=\"window.location.href='?module=siswa&act=carisiswa';\">
		<a href=$aksi?module=siswa&act=cetak target='_blank'><img src='gambar/printer.jpg' title='Cetak Semua Data Siswa' alt='Cetak' width='40' height='40'></a>";
	$baris=mysql_num_rows($tampil);

	if($baris>0){
	echo" <table>
          <tr>
		  <th>No</th>
		  <th width=75>NIS</th>
		  <th width=150>Nama Lengkap</th>
		  <th width=75>Kelas</th>
		  <th width=75>Jurusan</th>
		  <th width=100>Aksi</th>
		  </tr>"; 
	$hasil = mysql_query("SELECT * FROM tb_siswa ORDER BY nama_siswa limit $offset,$limit");
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
	         <td align=center>$r[nis]</td>
			 <td>$r[nama_siswa]</td>
			 <td align=center>$r[kelas]</td>
			 <td align=center>$r[jurusan]</td>
			 <td align=center><a href=?module=siswa&act=editsiswa&id=$r[nis]><img src='gambar/edit.png' title='Edit' alt='Edit' width='14' height='14'></a> &nbsp;
	               <a href=\"JavaScript: confirmIt('Anda yakin akan menghapusnya ?','$aksi?module=siswa&act=hapus&id=$r[nis]','','','','u','n','Self','Self')\" onMouseOver=\"self.status=''; return true\" onMouseOut=\"self.status=''; return true\"><img src='gambar/hapus.png' title='Hapus' alt='Hapus' width='14' height='14'></a>
				&nbsp;   <a href=$aksi?module=siswa&act=print&id=$r[nis] target='_blank'><img src='gambar/printer.png' title='Cetak' alt='Cetak' width='15' height='15'></a>
             </td></tr>";
      $no++;
	  $counter++;
    }
    echo "</table>";
	echo "<div class=paging>";

	if ($offset!=0) {
		$prevoffset = $offset-10;
		echo "<span class=prevnext> <a href=$PHP_SELF?module=siswa&offset=$prevoffset>Back</a></span>";
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
			echo "<a href=$PHP_SELF?module=siswa&offset=$newoffset>$i</a>";
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
		echo "<span class=prevnext><a href=$PHP_SELF?module=siswa&offset=$newoffset>Next</a>";
	}
	else {
		echo "<span class=disabled>Next</span>";//cetak halaman tanpa link
	}
	
	echo "</div>";
	}else{
	echo "<br><b>Data Kosong !</b>";
	}
    break;
  
  case "tambahsiswa":
    echo "<h2>Tambah Data Siswa</h2>
          <form name=text_form method=POST action='$aksi?module=siswa&act=input' onsubmit='return Blank_TextField_Validator()' enctype='multipart/form-data'>
          <table>
          <tr><td>NIS</td>   <td> : <input type=text name='nis' id='nis' size=30 onkeypress=\"return onlyNumbers();\"></td></tr>
		  <tr><td>Nama Siswa</td>   <td> : <input type=text name='nama_siswa' id='nama_siswa' size=30 onkeypress=\"ValidateAlpha();\"></td></tr>
		  <tr><td>Nama Panggilan</td>   <td> : <input type=text name='nama_panggilan' id='nama_panggilan' size=30></td></tr>
		  <tr><td>Kelas</td>   <td> : <select name='kelas' id='kelas'><option value=''>  </option>";
				$hasil4 = mysql_query("SELECT * FROM tb_kelas order by id_kelas asc");
		while($r4=mysql_fetch_array($hasil4)){
			echo "<option value='$r4[kelas]'>$r4[kelas]</option>";
		}
		echo	"</select></td></tr>
		  <tr><td>Jurusan</td>   <td> : <select name='jurusan' id='jurusan'><option value=''>  </option>";
				$hasil4 = mysql_query("SELECT * FROM tb_jurusan order by id_jurusan");
		while($r4=mysql_fetch_array($hasil4)){
			echo "<option value='$r4[jurusan]'>$r4[jurusan]</option>";
		}
		echo	"</select></td></tr>
		  <tr><td>Golongan Darah</td>   <td> : <select name=gol_darah id=gol_darah><option value=''></option>";
			$arr=array( "A", 
						"B",
						"AB",
						"O");
			foreach ($arr as $arrdata) {
				echo "<option value='$arrdata'";
				echo ">$arrdata</option>";
            }
	echo "
			</select></td></tr>
		  <tr><td>Jenis Kelamin</td>   <td> : <select name=jns_kelamin id=jns_kelamin><option value=''></option>";
			$arr=array( "Laki-Laki", 
						"Perempuan" );
			foreach ($arr as $arrdata) {
				echo "<option value='$arrdata'";
				echo ">$arrdata</option>";
            }
	echo "
			</select></td></tr>
		  <tr><td>Tempat Lahir</td>   <td> : <input type=text name='tpt_lahir' id='tpt_lahir' size=30></td></tr>
		  <tr><td>Tanggal Lahir</td>   <td> : <input type=text name='tgl_lahir' id='tgl_lahir' size=30></td></tr>
		  <tr><td>Agama</td>   <td> : <select name=agama id=agama><option value=''></option>";
			$arr=array( "Islam",
						"Kristen Khatolik",
						"Kristen Protestan",
						"Hindu",
						"Budha",
						"Khonghucu");
			foreach ($arr as $arrdata) {
				echo "<option value='$arrdata'";
				echo ">$arrdata</option>";
            }
	echo "
			</select></td></tr>
		  <tr><td>Anak Ke</td>   <td> : <input type=text name='anak_ke' id='anak_ke' size=3 maxlength=2 onkeypress=\"return onlyNumbers();\"></td></tr>
		  <tr><td>Jumlah Saudara</td>   <td> : <input type=text name='jml_saudara' id='jml_saudara' size=3 maxlength=2 onkeypress=\"return onlyNumbers();\"> orang</td></tr>
		  <tr><td>Asal Sekolah</td>   <td> : <select name='asal_sekolah' id='asal_sekolah'><option value=''>  </option>";
				$hasil4 = mysql_query("SELECT * FROM tb_asal_sekolah order by asal_sekolah asc");
		while($r4=mysql_fetch_array($hasil4)){
			echo "<option value='$r4[asal_sekolah]'>$r4[asal_sekolah]</option>";
		}
		echo	"</select></td></tr>
		  <tr><td>Jumlah SKHU</td>   <td> : <input type=text name='jml_SKHU' id='jml_SKHU' size=3 maxlength=3 onkeypress=\"return onlyNumbers();\"></td></tr>
		  <tr><td>Telepon</td>   <td> : <input type=text name='telp' id='telp' size=30 maxlength=15 onkeypress=\"return onlyNumbers();\"></td></tr>
		  <tr><td>Alamat</td>   <td> : <textarea name='alamat' id='alamat' cols=31 rows=3></textarea></td></tr>
		  <tr><td>Status Ayah</td>   <td> : <select name=status_ayah id=status_ayah><option value=''></option>";
			$arr=array( "Ayah Kandung",
						"Ayah Angkat",
						"Ayah Tiri");
			foreach ($arr as $arrdata) {
				echo "<option value='$arrdata'";
				echo ">$arrdata</option>";
            }
	echo "
			</select></td></tr>
		  <tr><td>Nama Ayah</td>   <td> : <input type=text name='nama_ayah' id='nama_ayah' size=30></td></tr>
		  <tr><td>Umur Ayah</td>   <td> : <input type=text name='umur_ayah' id='umur_ayah' maxlength=2 size=3 onkeypress=\"return onlyNumbers();\"> tahun</td></tr>
		  <tr><td>Pekerjaan Ayah</td>   <td> : <input type=text name='pekerjaan_ayah' id='pekerjaan_ayah' size=30></td></tr>
		  <tr><td>Agama Ayah</td>   <td> : <select name=agama_ayah id=agama_ayah><option value=''></option>";
			$arr=array( "Islam",
						"Kristen Khatolik",
						"Kristen Protestan",
						"Hindu",
						"Budha",
						"Khonghucu");
			foreach ($arr as $arrdata) {
				echo "<option value='$arrdata'";
				echo ">$arrdata</option>";
            }
	echo "
			</select></td></tr>
		  <tr><td>Pendidikan Akhir Ayah</td>   <td> : <select name=pend_akhir_ayah id=pend_akhir_ayah><option value=''></option>";
			$arr=array( "SD/MI",
						"SMP/MTs",
						"SMA Sederajat",
						"D I",
						"D II",
						"D III",
						"D IV",
						"S 1",
						"S 2",
						"S 3");
			foreach ($arr as $arrdata) {
				echo "<option value='$arrdata'";
				echo ">$arrdata</option>";
            }
	echo "
			</select></td></tr>
		  <tr><td>Status Ibu</td>   <td> : <select name=status_ibu id=status_ibu><option value=''></option>";
			$arr=array( "Ibu Kandung",
						"Ibu Angkat",
						"Ibu Tiri");
			foreach ($arr as $arrdata) {
				echo "<option value='$arrdata'";
				echo ">$arrdata</option>";
            }
	echo "
			</select></td></tr>
		  <tr><td>Nama Ibu</td>   <td> : <input type=text name='nama_ibu' id='nama_ibu' size=30></td></tr>
		  <tr><td>Umur Ibu</td>   <td> : <input type=text name='umur_ibu' id='umur_ibu' maxlength=2 size=3 onkeypress=\"return onlyNumbers();\"> tahun</td></tr>
		  <tr><td>Pekerjaan Ibu</td>   <td> : <input type=text name='pekerjaan_ibu' id='pekerjaan_ibu' size=30></td></tr>
		  <tr><td>Agama Ibu</td>   <td> : <select name=agama_ibu id=agama_ibu><option value=''></option>";
			$arr=array( "Islam",
						"Kristen Khatolik",
						"Kristen Protestan",
						"Hindu",
						"Budha",
						"Khonghucu");
			foreach ($arr as $arrdata) {
				echo "<option value='$arrdata'";
				echo ">$arrdata</option>";
            }
	echo "
			</select></td></tr>
		  <tr><td>Pendidikan Akhir Ibu</td>   <td> : <select name=pend_akhir_ibu id=pend_akhir_ibu><option value=''></option>";
			$arr=array( "SD/MI",
						"SMP/MTs",
						"SMA Sederajat",
						"D I",
						"D II",
						"D III",
						"D IV",
						"S 1",
						"S 2",
						"S 3");
			foreach ($arr as $arrdata) {
				echo "<option value='$arrdata'";
				echo ">$arrdata</option>";
            }
	echo "
			</select></td></tr>
		  <tr><td>Riwayat Sakit</td>   <td> : <textarea name='riwayat_sakit' id='riwayat_sakit' cols=31 rows=3></textarea></td></tr>
		  <tr><td>Hobby</td>   <td> : <textarea name='hobby' id='hobby' cols=31 rows=3></textarea></td></tr>
		  <tr><td>Prestasi</td>   <td> : <textarea name='prestasi' id='prestasi' cols=31 rows=3></textarea></td></tr>
		  <tr><td>Photo</td>   <td> : <input type='file' name='file' /></td></tr>
		  <tr><td colspan=2><input type=image src=gambar/simpan.png name=submit width='40' height='40' title='Simpan' alt='Simpan'>
							<img src=gambar/batal.png style='cursor:pointer' width='40' height='40' title='Batal' alt='Batal' onclick=\"window.location.href='?module=siswa';\" ></td></tr>
          </table></form>";
     break;
    
  case "editsiswa":
    $edit=mysql_query("SELECT * FROM tb_siswa WHERE nis='$_GET[id]'");
    $r=mysql_fetch_array($edit);
	
    echo "<h2>Edit Data Siswa</h2>
          <form name=text_form method=POST action='$aksi?module=siswa&act=update' onsubmit='return Blank_TextField_Validator()' enctype='multipart/form-data'>
          <input type=hidden name=id value='$r[nis]'>
          <table>
		  <tr><td>NIS</td>   <td> : <input type=text name='nis' id='nis' size=30 value=\"$r[nis]\" onkeypress=\"return onlyNumbers();\"></td></tr>
		  <tr><td>Nama Siswa</td>   <td> : <input type=text name='nama_siswa' id='nama_siswa' size=30 value=\"$r[nama_siswa]\" onkeypress=\"ValidateAlpha();\"></td></tr>
		  <tr><td>Nama Panggilan</td>   <td> : <input type=text name='nama_panggilan' id='nama_panggilan' size=30 value=\"$r[nama_panggilan]\"></td></tr>
		  <tr><td>Kelas</td>   <td> : <select name='kelas' id='kelas'>";
				$hasil4 = mysql_query("SELECT * FROM tb_kelas order by id_kelas asc");
		while($r4=mysql_fetch_array($hasil4)){
			echo "<option value='$r4[kelas]'"; if($r[kelas]==$r4[kelas]) echo "selected";
			echo ">$r4[kelas]</option>";
		}
		echo	"</select></td></tr>
		  <tr><td>Jurusan</td>   <td> : <select name='jurusan' id='jurusan'>";
				$hasil4 = mysql_query("SELECT * FROM tb_jurusan order by id_jurusan");
		while($r4=mysql_fetch_array($hasil4)){
			echo "<option value='$r4[jurusan]'"; if($r[jurusan]==$r4[jurusan]) echo "selected";
			echo ">$r4[jurusan]</option>";
		}
		echo	"</select></td></tr>
		  <tr><td>Golongan Darah</td>   <td> : <select name=gol_darah id=gol_darah>";
			$arr=array( "A", 
						"B",
						"AB",
						"O");
			foreach ($arr as $arrdata) {
				echo "<option value='$arrdata'"; if($r[gol_darah]==$arrdata) echo "selected";
				echo ">$arrdata</option>";
            }
	echo "
			</select></td></tr>
		  <tr><td>Jenis Kelamin</td>   <td> : <select name=jns_kelamin id=jns_kelamin>";
			$arr=array( "Laki-Laki", 
						"Perempuan" );
			foreach ($arr as $arrdata) {
				echo "<option value='$arrdata'"; if($r[jns_kelamin]==$arrdata) echo "selected";
				echo ">$arrdata</option>";
            }
			$tgl = explode("-", $r[tgl_lahir]);
$tgl2 = $tgl[2]."-".$tgl[1]."-".$tgl[0];
	echo "
			</select></td></tr>
		  <tr><td>Tempat Lahir</td>   <td> : <input type=text name='tpt_lahir' id='tpt_lahir' size=30 value=\"$r[tpt_lahir]\"></td></tr>
		  <tr><td>Tanggal Lahir</td>   <td> : <input type=text name='tgl_lahir' id='tgl_lahir' size=30 value=\"$tgl2\"></td></tr>
		  <tr><td>Agama</td>   <td> :<select name=agama id=agama>";
			$arr=array( "Islam",
						"Kristen Khatolik",
						"Kristen Protestan",
						"Hindu",
						"Budha",
						"Khonghucu");
			foreach ($arr as $arrdata) {
				echo "<option value='$arrdata'"; if($r[agama]==$arrdata) echo "selected";
				echo ">$arrdata</option>";
            }
	echo "
			</select></tr>
		  <tr><td>Anak Ke</td>   <td> : <input type=text name='anak_ke' id='anak_ke' size=3 maxlength=2 value=\"$r[anak_ke]\" onkeypress=\"return onlyNumbers();\"></td></tr>
		  <tr><td>Jumlah Saudara</td>   <td> : <input type=text name='jml_saudara' id='jml_saudara' size=3 maxlength=2 value=\"$r[jml_saudara]\" onkeypress=\"return onlyNumbers();\"> orang</td></tr>
		  <tr><td>Asal Sekolah</td>   <td> :  <select name='asal_sekolah' id='asal_sekolah'>";
				$hasil4 = mysql_query("SELECT * FROM tb_asal_sekolah order by asal_sekolah asc");
		while($r4=mysql_fetch_array($hasil4)){
			echo "<option value='$r4[asal_sekolah]'"; if($r[asal_sekolah]==$r4[asal_sekolah]) echo "selected";
			echo "
			>$r4[asal_sekolah]</option>";
		}
		echo	"</select></td></tr>
		  <tr><td>Jumlah SKHU</td>   <td> : <input type=text name='jml_SKHU' id='jml_SKHU' size=3 maxlength=3 value=\"$r[jml_SKHU]\" onkeypress=\"return onlyNumbers();\"></td></tr>
		  <tr><td>Telepon</td>   <td> : <input type=text name='telp' id='telp' size=30 value=\"$r[telp]\" onkeypress=\"return onlyNumbers();\"></td></tr>
		  <tr><td>Alamat</td>   <td> : <input type=text name='alamat' id='alamat' size=30 value=\"$r[alamat]\"></td></tr>
		  <tr><td>Status Ayah</td>   <td> : <select name=status_ayah id=status_ayah>";
			$arr=array( "Ayah Kandung",
						"Ayah Angkat",
						"Ayah Tiri");
			foreach ($arr as $arrdata) {
				echo "<option value='$arrdata'"; if($r[status_ayah]==$arrdata) echo "selected";
				echo ">$arrdata</option>";
            }
	echo "
			</select></td></tr>
		  <tr><td>Nama Ayah</td>   <td> : <input type=text name='nama_ayah' id='nama_ayah' size=30 value=\"$r[nama_ayah]\"></td></tr>
		  <tr><td>Umur Ayah</td>   <td> : <input type=text name='umur_ayah' id='umur_ayah' size=3 maxlength=2 value=\"$r[umur_ayah]\" onkeypress=\"return onlyNumbers();\"> tahun</td></tr>
		  <tr><td>Pekerjaan Ayah</td>   <td> : <input type=text name='pekerjaan_ayah' id='pekerjaan_ayah' size=30 value=\"$r[pekerjaan_ayah]\"></td></tr>
		  <tr><td>Agama Ayah</td>   <td> : <select name=agama_ayah id=agama_ayah>";
			$arr=array( "Islam",
						"Kristen Khatolik",
						"Kristen Protestan",
						"Hindu",
						"Budha",
						"Khonghucu");
			foreach ($arr as $arrdata) {
				echo "<option value='$arrdata'"; if($r[agama_ayah]==$arrdata) echo "selected";
				echo ">$arrdata</option>";
            }
	echo "
			</select></td></tr>
		  <tr><td>Pendidikan Akhir Ayah</td>   <td> : <select name=pend_akhir_ayah id=pend_akhir_ayah>";
			$arr=array( "SD/MI",
						"SMP/MTs",
						"SMA Sederajat",
						"D I",
						"D II",
						"D III",
						"D IV",
						"S 1",
						"S 2",
						"S 3");
			foreach ($arr as $arrdata) {
				echo "<option value='$arrdata'"; if($r[pend_akhir_ayah]==$arrdata) echo "selected";
				echo ">$arrdata</option>";
            }
	echo "
			</select></td></tr>
		  <tr><td>Status Ibu</td>   <td> : <select name=status_ibu id=status_ibu>";
			$arr=array( "Ibu Kandung",
						"Ibu Angkat",
						"Ibu Tiri");
			foreach ($arr as $arrdata) {
				echo "<option value='$arrdata'"; if($r[status_ibu]==$arrdata) echo "selected";
				echo ">$arrdata</option>";
            }
	echo "
			</select></td></tr>
		  <tr><td>Nama Ibu</td>   <td> : <input type=text name='nama_ibu' id='nama_ibu' size=30 value=\"$r[nama_ibu]\"></td></tr>
		  <tr><td>Umur Ibu</td>   <td> : <input type=text name='umur_ibu' id='umur_ibu' size=3 maxlength=2 value=\"$r[umur_ibu]\" onkeypress=\"return onlyNumbers();\"> tahun</td></tr>
		  <tr><td>Pekerjaan Ibu</td>   <td> : <input type=text name='pekerjaan_ibu' id='pekerjaan_ibu' size=30 value=\"$r[pekerjaan_ibu]\"></td></tr>
		  <tr><td>Agama Ibu</td>   <td> : <select name=agama_ibu id=agama_ibu>";
			$arr=array( "Islam",
						"Kristen Khatolik",
						"Kristen Protestan",
						"Hindu",
						"Budha",
						"Khonghucu");
			foreach ($arr as $arrdata) {
				echo "<option value='$arrdata'"; if($r[agama_ibu]==$arrdata) echo "selected";
				echo ">$arrdata</option>";
            }
	echo "
			</select>
		  <tr><td>Pendidikan Akhir Ibu</td>   <td> : <select name=pend_akhir_ibu id=pend_akhir_ibu>";
			$arr=array( "SD/MI",
						"SMP/MTs",
						"SMA Sederajat",
						"D I",
						"D II",
						"D III",
						"D IV",
						"S 1",
						"S 2",
						"S 3");
			foreach ($arr as $arrdata) {
				echo "<option value='$arrdata'"; if($r[pend_akhir_ibu]==$arrdata) echo "selected";
				echo ">$arrdata</option>";
            }
	echo "
			</select></td></tr>
		  <tr><td>Riwayat Sakit</td>   <td> : <input type=text name='riwayat_sakit' id='riwayat_sakit' size=30 value=\"$r[riwayat_sakit]\"></td></tr>
		  <tr><td>Hobby</td>   <td> : <input type=text name='hobby' id='hobby' size=30 value=\"$r[hobby]\"></td></tr>
		  <tr><td>Prestasi</td>   <td> : <input type=text name='prestasi' id='prestasi' size=30 value=\"$r[prestasi]\"></td></tr>
		  <tr><td>Photo</td>   <td> : <img src='photo/$r[photo]' width='130' height='160'><input type='file' name='file' /> <br>* Ganti Photo
		  <input type=hidden name='photo' id='photo' value=\"$r[photo]\"></td></tr>
          <tr><td colspan=2><input type=image src=gambar/update.png name=submit width='40' height='40' title='Update' alt='Update'>
							<img src=gambar/batal.png style='cursor:pointer' width='40' height='40' title='Batal' alt='Batal' onclick=\"window.location.href='?module=siswa';\" ></td></tr>
          </table></form>";
    break;
	
case "carisiswa":   
    echo "<h2>Cari Data Siswa</h2>

<form method='post' action='?module=showsiswa' onsubmit='return Blank_TextField_Validator()' name=text_form>
<table>
   <tr><td><select name=pilih id=pilih>
			<option value='NIS'>NIS Siswa</option>
			<option value='Nama'>Nama Siswa</option>
			</select></td><td><input type='text' name='cari' id='cari'></td></tr>
   <tr><td></td><td><input type=image src=gambar/cari.png name=submit width='40' height='40' title='Cari' alt='Cari'><img src=gambar/hapus.png style='cursor:pointer' width='40' height='40' title='Batal' alt='Batal' onclick=\"window.location.href='?module=siswa';\" ></td></tr>   
</table>
";
break;	

}
?>