<?php 
include "../config/koneksi.php";

//Mengambil id_jadwal yg terpilih dari schedule.php
$kd_penyakit = $_GET['kd_penyakit'];
	
//Printah SQL untuk menghapus dari tabel tb_jadwal dimana id_jadwal = id yg terpilih
$hapus = mysql_query("DELETE FROM penyakit where kd_penyakit = '$kd_penyakit'");
if($hapus){
	echo "<meta http-equiv = 'refresh' content = '0;
	url=../index.php?p=penyakit'/>";
}
else{
	echo "Proses Hapus Gagal";
}

 ?>