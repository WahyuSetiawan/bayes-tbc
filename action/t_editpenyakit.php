<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_ALL));
include "../config/koneksi.php";

//echo "$_POST['kd_penyakit']";
 
$edit = mysql_query("select * from penyakit where kd_penyakit = '$_POST[kd_penyakit]'");
$r = mysql_fetch_array($edit);
 ?>

 <form action="action/p_editpenyakit.php" method="POST">
 	<table>
	<tr>
		<td>Kode</td>
		<td>
			<input id="disabledInput" type="text" placeholder="<?php echo "$r[kd_penyakit]"; ?>" disabled>
			<!--
			<input class="form-control" id="disabledInput" name="kd_penyakit" type="text" placeholder="<?php //echo "$r[kd_penyakit]"; ?>" />
			-->
		</td>
	</tr>
	<tr>
		<td>Nama Penyakit</td>
		<td><input type="texbox" name="nm_penyakit" value="<?php echo "$r[nm_penyakit]"; ?>" /></td>
	</tr>
	<tr>
		<td>Populasi</td>
		<td><input type="texbox" name="hipotesis_penyakit" value="<?php echo "$r[hipotesis_penyakit]"; ?>" /></td>
	</tr>
	<tr>
		<td>Keterangan</td>
		<td><textarea type="texbox" name="ket_penyakit"><?php echo "$r[ket_penyakit]";?></textarea></td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="hidden" name="kd_penyakit" value="<?php echo "$r[kd_penyakit]"; ?>" />
			<input type="submit" value="Simpan" class="btn btn-primary"/>
		</td>
	</tr>
	</table>
 </form>