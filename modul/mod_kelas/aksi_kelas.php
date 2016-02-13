<?php
session_start();
include "../../pengaturan/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus kelas
if ($module=='kelas' AND $act=='hapus'){
  mysql_query("DELETE FROM tb_kelas WHERE id_kelas='$_GET[id]'");
  header('location:../../main.php?module='.$module);
}

// Input kelas
elseif ($module=='kelas' AND $act=='input'){
$kelas=mysql_real_escape_string($_POST[kelas]);
mysql_query("INSERT INTO tb_kelas(
			      kelas) 
	                       VALUES(
				'$kelas')");
  header('location:../../main.php?module='.$module);
}

// Update kelas
elseif ($module=='kelas' AND $act=='update'){
$kelas=mysql_real_escape_string($_POST[kelas]);
  mysql_query("UPDATE tb_kelas SET
					kelas   = '$kelas'
                           WHERE id_kelas       = '$_POST[id]'");
  header('location:../../main.php?module='.$module);
 }
 
?>