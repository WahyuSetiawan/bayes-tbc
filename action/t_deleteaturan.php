<?php 
include "../config/koneksi.php";

//Mengambil id_jadwal yg terpilih dari schedule.php
$kd_aturan = $_GET['kd_aturan'];
	
//Printah SQL untuk menghapus dari tabel tb_jadwal dimana id_jadwal = id yg terpilih
$hapus = mysql_query("DELETE FROM aturan where kd_aturan = '$kd_aturan'");
if($hapus){
	echo "<meta http-equiv = 'refresh' content = '0;
	url=../index.php?p=aturan'/>";
}
else{
	echo "Proses Hapus Gagal";
}

 ?>