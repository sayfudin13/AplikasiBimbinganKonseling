<?php
session_start();
include "../../pengaturan/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus asal
if ($module=='asal' AND $act=='hapus'){
  mysql_query("DELETE FROM tb_asal_sekolah WHERE id_asal_sekolah='$_GET[id]'");
  header('location:../../main.php?module='.$module);
}

// Input asal
elseif ($module=='asal' AND $act=='input'){
$asal=mysql_real_escape_string($_POST[asal]);
mysql_query("INSERT INTO tb_asal_sekolah(
			      asal_sekolah) 
	                       VALUES(
				'$asal')");
  header('location:../../main.php?module='.$module);
}

// Update asal
elseif ($module=='asal' AND $act=='update'){
$asal=mysql_real_escape_string($_POST[asal]);
  mysql_query("UPDATE tb_asal_sekolah SET
					asal_sekolah   = '$asal'
                           WHERE id_asal_sekolah       = '$_POST[id]'");
  header('location:../../main.php?module='.$module);
 }
 
?>