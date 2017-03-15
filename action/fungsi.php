<?php 
function vgejalayangdipilih($key){
     $sql = mysql_query("SELECT * as num FROM gejala where kd_gejala='$key'");
     $sql = mysql_fetch_array($sql);
     return $sql['num'];     
}

function vpenyakit(){
	$sql = mysql_query("SELECT COUNT(*) as num2 FROM penyakit");
    $sql = mysql_fetch_array($sql);
    return $sql['num2'];
}
 ?>
