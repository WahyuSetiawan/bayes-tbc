<?php 
	include "config/koneksi.php";
 ?>

 <h1>Form Daftar Pilihan Gejala</h1>
 <form method="POST" action="?p=result">
 	Pilih Gejala <br/>
 	<?php 
 		$query = "SELECT * FROM gejala order by kd_gejala asc";
 		$hasil = mysql_query($query);
		$no = 1;
		while ($data = mysql_fetch_array($hasil))
		{
		  echo "<input type='checkbox' value='".$data['kd_gejala']."' name='G".$no."' /> ".$data['nm_gejala']."<br />";
		  $no++;
		}
 	 ?>
 	 <br/>
 	<input type="hidden" name="jmlGejala" value="<?php echo $no-1; ?>" />
	<input type="submit" name="submit" value="Submit"  class="btn btn-primary"/>
 </form>