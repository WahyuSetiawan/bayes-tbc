<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "../config/koneksi.php";

if($_POST['tbhPenyakit']){

	$kode = $_POST['pKode'];
    $penyakit = $_POST['pPenyakit'];
    $populasi = $_POST['pPopulasi'];
    $ket = $_POST['pKet'];

    $sql="INSERT INTO penyakit SET kd_penyakit ='$kode', nm_penyakit ='$penyakit', hipotesis_penyakit ='$populasi', ket_penyakit ='$ket'";
    $query=mysql_query($sql) or die(mysql_error());
    echo "<meta http-equiv = 'refresh' content ='0;
		url = ../index.php?p=penyakit'/>";
    }
 	else{
 		//echo "Gagal";
 }

if($_POST['tbhGejala']){
	$kode = $_POST['gKode'];
    $gejala = $_POST['gGejala'];

    $sql="INSERT INTO gejala SET kd_gejala ='$kode', nm_gejala ='$gejala'";
    $query=mysql_query($sql) or die(mysql_error());
    echo "<meta http-equiv = 'refresh' content ='0;
		url = ../index.php?p=gejala'/>";
    }
 	else{
 		//echo "Gagal";
}

if($_POST['tbhAturan']){
	$pKode = $_POST['pKode'];
	$gKode = $_POST['gKode'];
    $hipotesis = $_POST['hip'];

    //echo "$pKode";
    //echo "$gKode";
    //echo "$hipotesis";
    //
    $sql="INSERT INTO aturan SET kd_penyakit ='$pKode', kd_gejala ='$gKode', hipotesis_aturan ='$hipotesis'";
    $query=mysql_query($sql) or die(mysql_error());
    echo "<meta http-equiv = 'refresh' content ='0;
		url = ../index.php?p=aturan'/>";
    }
 	else{
 		//echo "Gagal";
}
 ?>