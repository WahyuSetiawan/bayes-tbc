<?php 
	$host ="localhost";
	$user ="root";
	$pass ="";
	$database ="ai";

	$koneksi = mysql_connect($host,$user,$pass) or die ("Gagal koneksi".mysql_error());
	mysql_select_db($database) or die ("Data base tidak di temukan");

	/*
	if ($koneksi == true) {
		# code...
		echo "jalan";
	} else {
		echo "gagal";
		# code...
	}
	*/
 ?>