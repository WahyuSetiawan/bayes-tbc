<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Tambah
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data Penyakit</h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="action/add.php">
        <table hight="80px">
            <tr>
                <td width="45%">Kode </td>
                <td><input type="texbox" name="pKode" class="form-control" required/></td>
            </tr>
            <tr>
                <td>Nama Penyakit </td>
                <td><input type="texbox" name="pPenyakit" class="form-control" required/></td>
            </tr>
            <tr>
                <td>Populasi </td>
                <td><input type="texbox" name="pPopulasi" class="form-control" required/></td>
            </tr>
            <tr>
                <td>Keterangan </td>
                <td><textarea name="pKet" class="form-control" required></textarea>
            </tr>
            
        </table>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="tbhPenyakit" value="Tambah">
      </div>
      </form>
    </div>
  </div>
</div>
<br/>
<br/>

<table class="table table-hover">
    <tr class="bg-primary">
        <td width = "" align="center"><b>#</b></td>
        <td width = ""><b>Kode</b></td>
        <td width = ""><b>Nama Penyakit</b></td>
		<td width = ""><b>Populasi</b></td>
        <td width = "10%" colspan="2" align="center"><b>Action</b></td>
    </tr>
    <?php
    
    $sql2="SELECT * FROM penyakit order by kd_penyakit";
    $query2=mysql_query($sql2);

    $i = 0;
    while($data=mysql_fetch_array($query2)){
        $out_kode=$data['kd_penyakit'];
        $out_nama=$data['nm_penyakit'];
        $out_populasi=$data['hipotesis_penyakit'];
        $i++;
        ?>
    <tr>
        <td align ="center"><?php echo "$i"; ?></td>
        <td><?php echo $out_kode; ?></td>
        <td><?php echo $out_nama; ?></td>
        <td><?php echo $out_populasi; ?></td>
        <?php echo  "
        <form action='?p=action/t_editpenyakit' method='POST'>
        <td align = center>
        <input type='hidden' name='kd_penyakit' value= $data[kd_penyakit] />
        <input type='submit' class='btn btn-info' name='submit' value= EDIT />
        </td>
        </form>
        
        <td align = center><a class='btn btn-danger' href =action/t_deletepenyakit.php?kd_penyakit=$data[kd_penyakit]>Delete</a></td>
        "
        ?>
        
    </tr>
        <?php
        }
        ?>
</table>

</body>
</html>