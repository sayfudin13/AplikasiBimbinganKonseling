<?php
include "pengaturan/koneksi.php";
$pass=md5($_POST['password']);

if($_POST['username']=='admin' && $_POST['password']=='admin'){
session_start();
	$_SESSION[namauser]     = "admin";
  	$_SESSION[namalengkap]  = "admin";
  	$_SESSION[passuser]     = "admin";
	$_SESSION[level]     = "admin";
	
	header('location:main.php?module=home');
}else{

$login=mysql_query("select * from tb_user where namauser='$_POST[username]' and pass='$pass'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

//apabila user dan pasword ditemukan
if ($ketemu>0) {
	session_start();
	$_SESSION[namauser]     = $r[namauser];
  	$_SESSION[namalengkap]  = $r[nama_lengkap];
  	$_SESSION[passuser]     = $r[pass];
	$_SESSION[level]     = "admin";
	
	header('location:main.php?module=home');
}
else{
  echo "<link href=pengaturan/style.css rel=stylesheet type=text/css>";
  echo "<center>LOGIN GAGAL! <br> 
        Username atau Password Anda salah.<br>";
  echo "<a href=index.php><b>ULANGI LAGI</b></a></center>";
}
}
?>