<?php
require_once "../pengaturan/koneksi.php";
$q = strtolower($_GET["q"]);
if (!$q) return;

$sql = "select nis,nama_siswa from tb_siswa where nama_siswa LIKE '%$q%' or nis LIKE '%$q%'";
$rsd = mysql_query($sql);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['nis'];
	echo "$cname\n";
}
?>