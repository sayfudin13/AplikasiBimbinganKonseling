<?php
session_start();
include "../../pengaturan/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus user
if ($module=='user' AND $act=='hapus'){
  mysql_query("DELETE FROM tb_user WHERE namauser='$_GET[id]'");
  header('location:../../main.php?module='.$module);
}

// Input user
elseif ($module=='user' AND $act=='input'){
$namauser=mysql_real_escape_string($_POST[namauser]);
$pass=mysql_real_escape_string($_POST[password]);
$password=md5($pass);
$nip=mysql_real_escape_string($_POST[nip]);
$nama_lengkap=mysql_real_escape_string($_POST[nama_lengkap]);
mysql_query("INSERT INTO tb_user(
			      namauser,pass,nip,nama_lengkap) 
	                       VALUES(
				'$namauser','$password','$nip','$nama_lengkap')");
  header('location:../../main.php?module='.$module);
}

// Update user
elseif ($module=='user' AND $act=='update'){
$namauser=mysql_real_escape_string($_POST[namauser]);
$nip=mysql_real_escape_string($_POST[nip]);
$nama_lengkap=mysql_real_escape_string($_POST[nama_lengkap]);
  mysql_query("UPDATE tb_user SET
					namauser   = '$namauser',nama_lengkap   = '$nama_lengkap',nip   = '$nip'
                           WHERE id_user       = '$_POST[id]'");
  header('location:../../main.php?module='.$module);
 }
 
?>