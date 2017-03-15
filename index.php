<?php
include "config/koneksi.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Expert System</title>

        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <!-- ==================Deklarasi CSS ================== -->
        <link rel="stylesheet" href="base/jquery.ui.all.css">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/style-responsive.css" rel="stylesheet">
    </head>
    <body>
        <div id="container">
            <!-- Awal #header -->
            <div id="header" class="header navbar navbar-default navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a href="#" class="navbar-brand" >
                            <img class="img-thumbnail" src="img/icon.png"> .: Sistem Pakar Untuk Mendeteksi Penyakit Tuberculosis.</a>
                        <button type="button" class="navbar-toggle" btn-action="sidebar-toggled">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- bagian #content -->
            <div id="content" class="content">

                <!-- begin row -->
                <div class="row">
                    <!-- begin col-12 -->
                    <div class="col-md-12 ui-sortable">

                        <!-- begin isi -->
                        <div class="panel panel-inverse">
                            <div class="panel-heading">
                                <h4 class="panel-title">WELCOME..</h4>
                            </div>
                            <div class="panel-body">
                                <?php
                                if (isset($_GET['p'])) {
                                    $p = $_GET['p'];
                                    # code...
                                }
                                if (empty($p) || $p == "") {
                                    $p = "dashboard";
                                    # code...
                                }
                                if (file_exists($p . ".php")) {
                                    include $p . ".php";
                                    # code...
                                } else {
                                    include "main.php";
                                    # code...
                                }

                                //Memeriksa mana $p yg sedang aktip kemudian mengisi var $priksa,1,2-6 dgn string "active"
                                //untuk mengisi class masing-masing li nav
                                if ($p == "diagnosa") {
                                    $priksa1 = "active";
                                } else if ($p == "result") {
                                    $priksa2 = "active";
                                } else if ($p == "penyakit" or $p == "action/t_editpenyakit") {
                                    $priksa3 = "active";
                                } else if ($p == "gejala" or $p == "action/t_editgejala") {
                                    $priksa4 = "active";
                                } else if ($p == "aturan" or $p == "action/t_editaturan") {
                                    $priksa5 = "active";
                                } else if ($p == "logout") {
                                    $priksa6 = "active";
                                } else {
                                    $priksa = "active";
                                }
                                ?>
                            </div>
                        </div>
                        <!-- begin isi -->
                    </div>
                    <!-- end col-12 -->

                </div>
                <!-- end row-->
            </div>

            <!-- Bagian #sidebar (menu kiri) -->
            <div id="sidebar" class="sidebar">

                <!-- profil di atas menu -->
                <ul class="nav">

                </ul>

                <!-- .nav Menu-->
                <ul class="nav">
                    <li class="<?php echo "$priksa"; ?>">
                        <a href="index.php">
                            <i class="fa fa-desktop"></i>
                            <span>Dashboard</span></a>
                    </li>

                    <li class = "<?php echo "$priksa1"; ?>">
                        <a href="?p=diagnosa">
                            <i class="fa fa-stethoscope"></i>
                            <span>Diagnosa</span></a>
                    </li>

                    <li class = "<?php echo "$priksa2"; ?>">
                        <a href="?p=result">
                            <i class="fa fa-hospital-o"></i>
                            <span>Result</span></a>
                    </li>

                    <li class = "<?php echo "$priksa3"; ?>">
                        <a href="?p=penyakit">
                            <i class="fa fa-file"></i>
                            <span>Data Penyakit</span></a>
                    </li>

                    <li class = "<?php echo "$priksa4"; ?>">
                        <a href="?p=gejala">
                            <i class="fa fa-list-alt"></i>
                            <span>Data Gejala</span></a>
                    </li>

                    <li class = "<?php echo "$priksa5"; ?>">
                        <a href="?p=aturan">
                            <i class="fa fa-chain-broken"></i>
                            <span>Aturan</span></a>
                    </li>

                </ul>
            </div>	
        </div>

        <!-- btn ke atas -->
        <a href="javascript:;" class="btn btn-icon btn-success btn-to-top fade" btn-action="scroll-to-top">
            <i class="fa fa-angle-up"></i>
        </a>


        <!-- ===============Deklarasi js=============== -->
        <!-- 
                JS sengaja di deklarasikan di dalam body karena dari refrensi-refrensi yg saya baca,
                katanya dapat membuat meload web sedikit lebih cepat di banding di taro di head.
        -->
        <script src="js/jquery.1.8.2.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/jquery.sparkline.js"></script>

        <!--Aksi js untuk membuat datepiecker-->
        <script>
            $(function () {
                $("#datepicker").datepicker({dateFormat: 'yy-mm-dd'});
            });
        </script>

        <!--Aksi js untuk menghapus season dgn cara memanggil log_out.php-->
        <script language="javascript">
            function logout()
            {
                tanya = confirm("Are you sure want to exit ?")
                if (tanya != "0")
                {
                    top.location = "login_out.php"
                }
            }
        </script>

        <!--Aksi js untuk membuat aksi tbl scroll ke atas dan aksi tbl menu toggle -->
        <script>
            $(document).ready(function () {
                App.init();
            });
        </script>
    </body>
</html>
