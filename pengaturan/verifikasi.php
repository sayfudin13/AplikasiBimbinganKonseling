<script language="JavaScript">
	function pesan() {
	var username = document.forms[0].elements[0].value;
	var password = document.forms[0].elements[1].value;
	var nama_lengkap = document.forms[0].elements[2].value;
	if (username.length == 0) {
    window.alert("Anda belum memasukkan nama Anda");
	} else {
	if ((password < 0) || (isNaN(password)) || (password.length == 0)) {
    window.alert("Input umur Anda salah");
	} else {
	if ((nama_lengkap.length == 0) || (password.indexOf("@",1) == -1)) {
    window.alert("Periksa kembali alamat email Anda");
	} else {
    document.forms[0].submit();
	}}}}
</script>