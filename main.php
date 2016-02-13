<?php
error_reporting(0);
session_start();

if (empty($_SESSION['username']) and empty($_SESSION['passuser'])) {
	echo "<link href='pengaturan/style.css' rel='stylesheet' type='text/css'>
 	<center>Untuk mengakses halaman Administrator, Anda harus login <br>";
  	echo "<a href=index.php><b>LOGIN</b></a></center>";
	}
else {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" src="pengaturan/validasi.js"></script>
<title>Aplikasi Bimbingan & Konseling SMA Negeri 1 Manonjaya</title>
<link rel="shortcut icon" href="images/icon.ico" type="image/x-icon" />
<link rel="stylesheet" href="pengaturan/stylemain.css" type="text/css" media="screen" />
<link rel="stylesheet" href="pengaturan/paging.css" type="text/css" />
</head>

<BODY>

<div id="wrapper">

	<div id="header">
		
	</div>


	<div id="sidebar">
		
    	<ul>
        <?php include "menu.php"; ?>		
		</ul>
    	<p>&nbsp;</p>
	
		<div id="sidebar-bottom">
			&nbsp;
			<br><br>
			
		</div>
	</div>

	<div id="content">
    	<?php include "content.php"; ?>
	</div>

	<div id="footer">
		<div id="footer-valid">
			Copyright 2013 @ Bimbingan & Konseling SMA Negeri 1 Manonjaya</a>
		</div>
	</div>

</div>

</body>
</html>
<?php
}
?>