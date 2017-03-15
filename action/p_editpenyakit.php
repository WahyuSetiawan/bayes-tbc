<?php 
include "../config/koneksi.php";

$ubah = mysql_query("UPDATE penyakit SET nm_penyakit = '$_POST[nm_penyakit]', hipotesis_penyakit = '$_POST[hipotesis_penyakit]', ket_penyakit = '$_POST[ket_penyakit]'
					WHERE kd_penyakit = '$_POST[kd_penyakit]'");

if ($ubah) {
	echo "<meta http-equiv='refresh' content = '0;
	url=../?p=penyakit'>";
	# code...
} else {
	echo "Data Gagal di ubah";
	echo "Ada yang error: ".mysql_error();
	# code...
}

?>