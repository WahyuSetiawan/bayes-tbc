<?php 
include "../config/koneksi.php";

$ubah = mysql_query("UPDATE aturan SET hipotesis_aturan = '$_POST[hipotesis_aturan]'
					WHERE kd_aturan = '$_POST[kd_aturan]'");

if ($ubah) {
	echo "<meta http-equiv='refresh' content = '0;
	url=../?p=aturan'>";
	# code...
} else {
	echo "Data Gagal di ubah";
	echo "Ada yang error: ".mysql_error();
	# code...
}

?>