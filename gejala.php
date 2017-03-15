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
                <h4 class="modal-title" id="myModalLabel">Tambah Data Gejala</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="action/add.php">
                    <table hight="80px">
                        <tr>
                            <td width="45%">Kode </td>
                            <td><input type="texbox" name="gKode" class="form-control" required/></td>
                        </tr>
                        <tr>
                            <td>Nama Gejala </td>
                            <td><input type="texbox" name="gGejala" class="form-control" required/></td>
                        </tr>

                    </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" name="tbhGejala" value="Tambah">
            </div>
            </form>
        </div>
    </div>
</div>
<br/>
<br/>

<table class="table table-hover">
    <tr class="bg-primary">
        <td align="center"><b>#</b></td>
        <td width = ""><b>Kode</b></td>
        <td width = ""><b>Nama Gejala</b></td>
        <td width = "10%" colspan="2" align="center"><b>Action</b></td>
    </tr>
    <?php
    $sql2 = "SELECT * FROM gejala order by kd_gejala asc";
    $query2 = mysql_query($sql2);

    $i = 0;
    while ($data = mysql_fetch_array($query2)) {
        $out_kode = $data['kd_gejala'];
        $out_nama = $data['nm_gejala'];
        $i++;
        ?>
        <tr>
            <td align ="center"><?php echo "$i"; ?></td>
            <td><?php echo $out_kode; ?></td>
            <td><?php echo $out_nama; ?></td>
            <?php echo "
        <form action='?p=action/t_editgejala' method='POST'>
        <td align = center>
        <input type='hidden' name='kd_gejala' value= $data[kd_gejala] />
        <input type='submit' class='btn btn-info' name='submit' value= EDIT />
        </td>
        </form>
        
        <td align = center><a class='btn btn-danger' href =action/t_deletegejala.php?kd_gejala=$data[kd_gejala]>Delete</a></td>
        "
            ?>
        </tr>
        <?php
    }
    ?>
</table>