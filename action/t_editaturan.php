<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_ALL));
include "../config/koneksi.php";

$edit = mysql_query("select * from aturan where kd_aturan = '$_POST[kd_aturan]'");
$r = mysql_fetch_array($edit);
 ?>

 <form action="action/p_editaturan.php" method="POST">
 	<table>
	<tr>
		<td>Kode Penyakit</td>
		<td>
		<select class="form-control" disabled>
               <option><?php echo "$r[kd_penyakit]"; ?></option>
        </select>
        </td>
	</tr>
	<tr>
		<td>Kode Gejala</td>
		<td>
		<select class="form-control" disabled>
               <option><?php echo "$r[kd_gejala]"; ?></option>
        </select>
        </td>
	</tr>
	<tr>
		<td>Nilai </td>
		<td><input type="texbox" name="hipotesis_aturan" value="<?php echo "$r[hipotesis_aturan]"; ?>" /></td>
	</tr>
	<tr>
		<td></td>
		<td>
		<input type="hidden" name="kd_aturan" value="<?php echo "$r[kd_aturan]"; ?>" />
		<input type="submit" value="Simpan" class="btn btn-primary"/>
		</td>
	</tr>
	</table>
 </form>
