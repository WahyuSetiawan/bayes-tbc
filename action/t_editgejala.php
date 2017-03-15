<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_ALL));
include "../config/koneksi.php";

$edit = mysql_query("select * from gejala where kd_gejala = '$_POST[kd_gejala]'");
$r = mysql_fetch_array($edit);
 ?>

 <form action="action/p_editgejala.php" method="POST">
 	<table>
	<tr>
		<td>Kode</td>
		<td><input type="text" placeholder="<?php echo "$r[kd_gejala]"; ?>" id="disabledInput" disabled/></td>
	</tr>
	<tr>
		<td>Nama Penyakit</td>
		<td><input type="texbox" name="nm_gejala" value="<?php echo "$r[nm_gejala]"; ?>" /></td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="hidden" name="kd_gejala" value="<?php echo "$r[kd_gejala]"; ?>" />
			<input type="submit" value="Simpan" class="btn btn-primary"/>
		</td>
	</tr>
	</table>
 </form>
