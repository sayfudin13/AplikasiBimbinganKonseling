//-------------------------- check form pegawai ------------------------
function checkPegawai(){
	nip = document.getElementById("nip").value;
	nama_lengkap = document.getElementById("nama_lengkap").value;
	tmpt_lahir = document.getElementById("tmpt_lahir").value;
	tgl_lahir = document.getElementById("tgl_lahir").value;
	status_kawin = document.getElementById("status_kawin").value;
	agama = document.getElementById("agama").value;
	pendidikan_terakhir = document.getElementById("pendidikan_terakhir").value;
	bekerja_sejak = document.getElementById("bekerja_sejak").value;
	lama_bekerja = document.getElementById("lama_bekerja").value;
	status_pegawai = document.getElementById("status_pegawai").value;
	
	if(nip == ""){
	  hideAllErrors_pgw();
		document.getElementById("nipkosong").style.display = "inline";
		document.getElementById("nip").select();
		document.getElementById("nip").focus();
		return false;
	}
	if(nama_lengkap == ""){
	  hideAllErrors_pgw();
		document.getElementById("nama_lengkapkosong").style.display = "inline";
		document.getElementById("nama_lengkap").select();
		document.getElementById("nama_lengkap").focus();
		return false;
	}
	if(tmpt_lahir == ""){
	  hideAllErrors_pgw();
		document.getElementById("tmpt_lahirkosong").style.display = "inline";
		document.getElementById("tmpt_lahir").select();
		document.getElementById("tmpt_lahir").focus();
		return false;
	}
	if(tgl_lahir == ""){
	  hideAllErrors_pgw();
		document.getElementById("tgl_lahirkosong").style.display = "inline";
		document.getElementById("tgl_lahir").select();
		document.getElementById("tgl_lahir").focus();
		return false;
	}
	if(status_kawin == ""){
	  hideAllErrors_pgw();
		document.getElementById("status_kawinkosong").style.display = "inline";
		document.getElementById("status_kawin").select();
		document.getElementById("status_kawin").focus();
		return false;
	}
	if(agama == ""){
	  hideAllErrors_pgw();
		document.getElementById("agamakosong").style.display = "inline";
		document.getElementById("agama").select();
		document.getElementById("agama").focus();
		return false;
	}
	if(pendidikan_terakhir == ""){
	  hideAllErrors_pgw();
		document.getElementById("pendidikan_terakhirkosong").style.display = "inline";
		document.getElementById("pendidikan_terakhir").select();
		document.getElementById("pendidikan_terakhir").focus();
		return false;
	}
	if(bekerja_sejak == ""){
	  hideAllErrors_pgw();
		document.getElementById("bekerja_sejakkosong").style.display = "inline";
		document.getElementById("bekerja_sejak").select();
		document.getElementById("bekerja_sejak").focus();
		return false;
	}
	if(lama_bekerja == ""){
	  hideAllErrors_pgw();
		document.getElementById("lama_bekerjakosong").style.display = "inline";
		document.getElementById("lama_bekerja").select();
		document.getElementById("lama_bekerja").focus();
		return false;
	}
	if(status_pegawai == ""){
	  hideAllErrors_pgw();
		document.getElementById("status_pegawaikosong").style.display = "inline";
		document.getElementById("status_pegawai").select();
		document.getElementById("status_pegawai").focus();
		return false;
	}
	return true;
}

function hideAllErrors_pgw(){
	document.getElementById("nipkosong").style.display = "none";
	document.getElementById("nama_lengkapkosong").style.display = "none";
	document.getElementById("tmpt_lahirkosong").style.display = "none";
	document.getElementById("tgl_lahirkosong").style.display = "none";
	document.getElementById("status_kawinkosong").style.display = "none";
	document.getElementById("agamakosong").style.display = "none";
	document.getElementById("pendidikan_terakhirkosong").style.display = "none";
	document.getElementById("bekerja_sejakkosong").style.display = "none";
	document.getElementById("lama_bekerjakosong").style.display = "none";
	document.getElementById("status_pegawaikosong").style.display = "none";
}
