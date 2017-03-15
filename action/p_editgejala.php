<?php 
include "../config/koneksi.php";

$ubah = mysql_query("UPDATE gejala SET nm_gejala = '$_POST[nm_gejala]'
					WHERE kd_gejala = '$_POST[kd_gejala]'");

if ($ubah) {
	echo "<meta http-equiv='refresh' content = '0;
	url=../?p=gejala'>";
	# code...
} else {
	echo "Data Gagal di ubah";
	echo "Ada yang error: ".mysql_error();
	# code...
}

?>