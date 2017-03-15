<?php 
include "../config/koneksi.php";

//Mengambil id_jadwal yg terpilih dari schedule.php
$kd_gejala = $_GET['kd_gejala'];
	
//Printah SQL untuk menghapus dari tabel tb_jadwal dimana id_jadwal = id yg terpilih
$hapus = mysql_query("DELETE FROM gejala where kd_gejala = '$kd_gejala'");
if($hapus){
	echo "<meta http-equiv = 'refresh' content = '0;
	url=../index.php?p=gejala'/>";
}
else{
	echo "Proses Hapus Gagal";
}

 ?>