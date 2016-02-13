<?php
session_start();
include "../../pengaturan/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus jurusan
if ($module=='jurusan' AND $act=='hapus'){
  mysql_query("DELETE FROM tb_jurusan WHERE id_jurusan='$_GET[id]'");
  header('location:../../main.php?module='.$module);
}

// Input jurusan
elseif ($module=='jurusan' AND $act=='input'){
$jurusan=mysql_real_escape_string($_POST[jurusan]);
mysql_query("INSERT INTO tb_jurusan(
			      jurusan) 
	                       VALUES(
				'$jurusan')");
  header('location:../../main.php?module='.$module);
}

// Update jurusan
elseif ($module=='jurusan' AND $act=='update'){
$jurusan=mysql_real_escape_string($_POST[jurusan]);
  mysql_query("UPDATE tb_jurusan SET
					jurusan   = '$jurusan'
                           WHERE id_jurusan       = '$_POST[id]'");
  header('location:../../main.php?module='.$module);
 }
 
?>