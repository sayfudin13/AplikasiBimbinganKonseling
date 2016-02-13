<?php
  session_start();
  session_destroy();
//  echo "<center>Anda telah sukses keluar sistem <b>[LOGOUT]<b>";
//  echo "<center><a href='index.php'><b>Login Kembali</a></b>";

// Apabila setelah logout langsung menuju halaman utama website, aktifkan baris di bawah ini:

 header('location:index.php');
?>
