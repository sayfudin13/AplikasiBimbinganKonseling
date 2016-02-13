<?php
error_reporting(0);
session_start();
if(isset($_SESSION['namauser']) and isset($_SESSION['passuser'])){
	header('location:main.php?module=home');
}
else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Aplikasi Bimbingan & Konseling SMA Negeri 1 Manonjaya</title>
<link rel="shortcut icon" href="images/icon.ico" type="image/x-icon" />
<link rel="stylesheet" href="pengaturan/stylelogin.css" type="text/css" media="screen" />
</head>

<BODY>

<div id="wrapper">

	<div id="header">
	</div>
	<div id="contentlogin">
    	<form method="post" action="login.php">
		<br><br><br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;
		<font size=4><b>L O G I N</b></font>
        <table>
        <tr><td>Username</td>
        <td><input type="text" name="username" size="25"></td>
		<td rowspan="3"><input type=image src=gambar/login.png name=submit width='40' height='40' title='Login' alt='Login'></td>
        <tr><td>Password</td>
        <td><input type="password" name="password" size="25"></td>
		</tr>
        </table>
        
      </form>
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