<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_ALL));
include "config/koneksi.php";
require "action/fungsi.php";
?>


<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <?php if ($_POST['submit']) { ?>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Detail >>
            </button>
            <?php
        } else {
            echo "Untuk Melihat Result Pilih gejala terlebih dahulu! <a href='?p=diagnosa''  class='btn btn-primary'>pilih >></a>";
        }
        ?>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Detail Result</h4>
                    </div>
                    <div class="modal-body">

                        <?php
                        $jmlGejala = $_POST['jmlGejala'];

                        echo "<h2>STEP 1</h2>";
                        echo "<b>Gejala Yang Di pilih:</b> <br/>";

                        for ($i = 1; $i <= $jmlGejala; $i++) {
                            $G = $_POST['G' . $i];
                            if (!empty($G)) {
                                $query = "SELECT * FROM gejala where kd_gejala = 'G$i' order by kd_gejala asc";
                                $hasil = mysql_query($query);

                                while ($data = mysql_fetch_array($hasil)) {
                                    echo $data['kd_gejala'] . ': ';
                                    echo $data['nm_gejala'] . '<br/>';

                                    $ng[$i] = $data['nm_gejala'];
                                }
                            }
                        }


                        echo "<h2>STEP 2</h2>";
                        echo "<b>Menghitung jumlah kasus yang sama dengan class yang sama</b> <br/>";

                        $query2 = "SELECT * FROM penyakit order by kd_penyakit";
                        $hasil2 = mysql_query($query2);


                        $k = 1;
                        while ($data2 = mysql_fetch_array($hasil2)) {
                            echo "<b>" . $data2['kd_penyakit'] . ": " . $data2['nm_penyakit'] . "</b>" . '<br/>';

                            for ($i = 1; $i <= $jmlGejala; $i++) {
                                $G = $_POST['G' . $i];
                                if (!empty($G)) {
                                    $query = "SELECT * FROM gejala where kd_gejala = 'G$i' order by kd_gejala";
                                    $hasil = mysql_query($query);

                                    $query3 = "SELECT * FROM aturan where kd_penyakit = 'P$k' AND kd_gejala = 'G$i' order by kd_aturan";
                                    $hasil3 = mysql_query($query3);

                                    while ($data = mysql_fetch_array($hasil) AND $data3 = mysql_fetch_array($hasil3)) {
                                        echo $data['kd_gejala'];
                                        echo ' Probabilitas= ';
                                        //echo $data3['hipotesis_aturan'].'<br/>';

                                        $ha[$i] = $data3['hipotesis_aturan'];
                                        echo $ha[$i] . '<br/>';

                                        $ahsudahlah = 1 * $ha[$i];
                                    }
                                }
                            }

                            $hasilpE = 1;
                            foreach ($ha as $isi) {
                                $hasilpE = $hasilpE * $isi;
                            }


                            echo "Hasil p(G1,G2..Gm)= ";
                            echo $hasilpE . '<br/>';

                            $np[$k] = $data2['nm_penyakit'];
                            $kp[$k] = $data2['ket_penyakit'];

                            $hp[$k] = $data2['hipotesis_penyakit'];
                            echo "Pupulasi Penyakit P$k= " . $hp[$k] . '<br/>';

                            $hasildibagi[$k] = $hasilpE * $hp[$k];
                            echo "p(G1|Pi)x...p(Gm|Pi)= " . $hasildibagi[$k] . '<br/><br/>';

                            $k++;
                        }

                        $pembagi = 0;
                        foreach ($hasildibagi as $isi2) {
                            $pembagi = $pembagi + $isi2;
                        }

                        echo "<h2>STEP 3</h2>";
                        echo "Pembagi: $pembagi <br/>";
                        $n = 1;
                        for ($n = 1; $n <= vpenyakit(); $n++) {
                            if ($pembagi == 0) {
                                $kesimpulan[$n] = 0;
                            } else {
                                $kesimpulan[$n] = $hasildibagi[$n] / $pembagi;
                            }

                            echo "Hasil Hitung: p(Pi|G1 G2 Gn)= " . $kesimpulan[$n] . '<br/><br/>';
                        }

                        echo "<h2>STEP 4</h2>";
                        echo "<b>Menentukan Nilai Tertinggi </b><br/>";
                        $maxAkhir = max($kesimpulan);
                        echo "max( p(Pi|G1 G2 Gn))= " . max($kesimpulan) . "<br/>";

                        echo "<h2>STEP 5</h2>";
                        echo "<b>Hasil Diagnosa <br/></b>";
                        if (max($kesimpulan) == 0) {
                            echo "Tidak dapat mendiagnosa penyakit";
                        } else {
                            $m = 1;
                            for ($m = 0; $m <= vpenyakit(); $m++) {
                                if ($kesimpulan[$m] == max($kesimpulan)) {
                                    if ($kesimpulan[$m] != 0) {
                                        echo "Anda <b>Kemungkinan Besar</b> menderita penyakit <b> $np[$m] </b> dengan nilai Probabilitas $maxAkhir <br/>";
                                        echo "Keterangan: <br/>";
                                        echo "$kp[$m]";
                                    }
                                }
                            }
                        }
                        ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        <br/>
        <br/>
    </body>
</html>

<?php
if ($_POST['submit']) {
    if (max($kesimpulan) == 0) {
        echo "Tidak dapat mendiagnosa penyakit";
    } else {
        echo "<b>Hasil Diagnosa <br/></b>";
        $m = 1;
        for ($m = 0; $m <= vpenyakit(); $m++) {
            if ($kesimpulan[$m] == max($kesimpulan)) {
                echo "
		<blockquote>
		<p class='bg-info'>Anda <b>Kemungkinan Besar</b> menderita penyakit <b> $np[$m] </b> dengan nilai Probabilitas $maxAkhir </p>
		</blockquote>
		<br/>";
                echo "<b>Keterangan: </b><br/>";
                echo "
		<blockquote>
		<p class='bg-info'>$kp[$m]</p>
		</blockquote>";
            } else {
                
            }
        }
    }
}
?>
