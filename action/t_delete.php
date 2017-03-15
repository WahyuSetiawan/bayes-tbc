<?php 
include "../config/koneksi.php";
if($_POST['tbKirim']){
	include "../config/koneksi.php";

	//Mengambil id_jadwal yg terpilih dari schedule.php
	$id_jadwal = $_GET['id_jadwal'];
	
	//Printah SQL untuk menghapus dari tabel tb_jadwal dimana id_jadwal = id yg terpilih
	$hapus = mysql_query("DELETE FROM tb_jadwal where id_jadwal = '$id_jadwal'");
	if($hapus){
		echo "<meta http-equiv = 'refresh' content = '0;
		url=../index.php?p=schedule'/>";
	}
	else{
		echo "Proses Hapus Gagal";
	}
	
}

 ?>