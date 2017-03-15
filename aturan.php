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
                <h4 class="modal-title" id="myModalLabel">Tambah Aturan</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="action/add.php">
                    <table hight="80px">
                        <tr>
                            <td width="45%">Kode Penyakit</td>
                            <td>
                                <select name="pKode" class="form-control">
                                    <?php
                                    $sql2 = "SELECT * FROM penyakit order by kd_penyakit asc";
                                    $query2 = mysql_query($sql2);

                                    while ($data = mysql_fetch_array($query2)) {
                                        $out_penyakit = $data['kd_penyakit'];
                                        echo "<option>$out_penyakit</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="45%">Kode Gejala</td>
                            <td>
                                <select name="gKode" class="form-control">
                                    <?php
                                    $sql2 = "SELECT * FROM gejala order by kd_gejala asc";
                                    $query2 = mysql_query($sql2);

                                    while ($data = mysql_fetch_array($query2)) {
                                        $out_gejala = $data['kd_gejala'];
                                        echo "<option>$out_gejala</option>";
                                    }
                                    ?>   
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Nilai Hipotesis</td>
                            <td><input type="texbox" name="hip" class="form-control" required/></td>
                        </tr>

                    </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" name="tbhAturan" value="Tambah">
            </div>
            </form>
        </div>
    </div>
</div>
<br/>
<br/>

<table width = "" class="table table-hover">
    <tr class="bg-primary">
        <td width = "" align="center"><b>#</b></td>
        <td width = ""><b>Kode Penyakit</b></td>
        <td width = ""><b>Kode Gejala</b></td>
        <td width = ""><b>Nilai</b></td>
        <td width = "10%" colspan="2" align="center"><b>Action</b></td>
    </tr>
    <?php
    $sql2 = "SELECT * FROM aturan order by kd_aturan asc";
    $query2 = mysql_query($sql2);

    $i = 0;
    while ($data = mysql_fetch_array($query2)) {
        $out_penyakit = $data['kd_penyakit'];
        $out_gejala = $data['kd_gejala'];
        $out_populasi = $data['hipotesis_aturan'];
        $i++;
        ?>
        <tr>
            <td align ="center"><?php echo "$i"; ?></td>
            <td><?php echo $out_penyakit; ?></td>
            <td><?php echo $out_gejala; ?></td>
            <td><?php echo $out_populasi; ?></td>
            <?php echo "
        <form action='?p=action/t_editaturan' method='POST'>
        <td align = center>
        <input type='hidden' name='kd_aturan' value= $data[kd_aturan] />
        <input type='submit' class='btn btn-info' name='submit' value= EDIT />
        </td>
        </form>

        <td align = center><a class='btn btn-danger' href =action/t_deleteaturan.php?kd_aturan=$data[kd_aturan]>Delete</a></td>
        "
            ?>
        </tr>
        <?php
    }
    ?>
</table>