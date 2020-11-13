<?php 
    $this->load->model('login_model');
    $jml_kegiatan= $this->login_model->hitungJumlahKegiatanBagianHariIni();
    $jml_jadwal= $this->login_model->hitungJumlahAgendaBagian();
    $jml_laporan= $this->login_model->hitungJumlahLaporan();
    $c1= $this->login_model->c1();
    $c2= $this->login_model->c2();
    $c3= $this->login_model->c3();
    $c4= $this->login_model->c4();
    $c5= $this->login_model->c5();
    $c6= $this->login_model->c6();
    $c7= $this->login_model->c7();
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bagian Internal</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="<?php echo base_url('vendors/bootstrap/dist/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/font-awesome/css/font-awesome.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/themify-icons/css/themify-icons.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/flag-icon-css/css/flag-icon.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/selectFX/css/cs-skin-elastic.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/jqvmap/dist/jqvmap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
    <link href="<?php echo base_url('assets/css/font.css');?>" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url('vendors/chart.js/dist/Chart.js');?>"></script>
</head>
<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a href="<?php echo base_url(); ?>index.php/login/bagian"><br>
                    <img class="align-content" src="<?php echo base_url('assets/img/1.png');?>" alt="" style="width:150px";>
                </a>
            </div>
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                <h3 class="menu-title"><center><img class="align-content" src="<?php echo base_url('assets/img/2.png');?>" alt="" style="width:150px";></center></h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-calendar"></i>Jadwal</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-calendar-plus-o"></i><a href="<?php echo base_url(); ?>index.php/pegawai/jadwal_hari_ini_internal">Jadwal Hari Ini</a></li>
                            <li><i class="menu-icon fa fa-calendar-plus-o"></i><a href="<?php echo base_url(); ?>index.php/pegawai/jadwal_keseluruhan_internal">Jadwal Keseluruhan</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-sticky-note"></i>Buku Agenda</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-file-text"></i><a href="<?php echo base_url(); ?>index.php/pegawai/laporan_kegiatan_internal">Laporan Kegiatan</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->
    <!-- Left Panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="header-menu">
            <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                </div>
                <ul class="nav justify-content-end">
                <li class="nav-item">
                    <div class="header-left">
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Selamat Datang Kembali <b><?php echo $this->session->userdata('username');?></b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo site_url('login/logout');?>">Logout</a>
                </li>
                </ul>
            </div>
        </header><!-- /header -->
        <!-- Header-->
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard Bagian Internal</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
        <div class="row">
        <div class="col-xl-3 col-lg-7">
                <div class="card"><center>
                    <div class="card-body">
                    <i class="fa fa-calendar fa-5x"></i>
                    <h3>Jadwal Hari Ini</h3>
                    <h3><?= $jml_kegiatan; ?></h3>
                    </div>
                    <div class="card-footer ">
                    <a href="<?php echo base_url(); ?>index.php/pegawai/jadwal_hari_ini_internal">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-7">
                <div class="card"><center>
                    <div class="card-body">
                    <i class="fa fa-calendar fa-5x"></i>
                    <h3>Jadwal Keseluruhan</h3>
                    <h3><?= $jml_jadwal; ?></h3>
                    </div>
                    <div class="card-footer">
                    <a href="<?php echo base_url(); ?>index.php/pegawai/jadwal_keseluruhan_internal">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-7">
                <div class="card"><center>
                    <div class="card-body">
                    <i class="fa fa-book fa-5x"></i>
                    <h3>Laporan Kegiatan</h3>
                    <h3><?= $jml_laporan; ?></h3>
                    </div>
                    <div class="card-footer">
                    <a href="<?php echo base_url(); ?>index.php/pegawai/laporan_kegiatan_internal" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                </div>
            </div>
        </div>
        </div>
        <div class="container-fluid">
            <div class="col">
                <h4><center>Jumlah Surat Untuk Setiap Bagian</center></h4><br>
                <center><div style="width:60%;height: 20%">
		        <canvas id="SuratBagPen"></canvas>
    	        </div>
            </div>
        </div>
        <script>
        var oilCanvas = document.getElementById("BagianPenerima");
        Chart.defaults.global.defaultFontFamily = "Lato";
        Chart.defaults.global.defaultFontSize = 18;
        var oilData = {
            labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
            datasets: [
                {
                    data: <?php echo json_encode($bag); ?>,
                    backgroundColor: [
                        "#0000FF",
                        "#000080",
                        "#00FFFF",
                        "#00FF00",
                        "#FF00FF",
                        "#FF007F",
                        "#FF0000",
                        "#FF7F00",
                        "#FFC0CB",
                        "#6F00FF",
                        "#BF00FF",
                        "#8F00FF"
                    ]
                }]
        };
        var pieChart = new Chart(oilCanvas, {
        type: 'pie',
        data: oilData
        });
        </script>
        <script>
        var oilCanvas = document.getElementById("SuratBagPen");
        Chart.defaults.global.defaultFontFamily = "Lato";
        Chart.defaults.global.defaultFontSize = 18;
        var oilData = {
            labels: ["Kasi Pelayanan dan Pendapatan Daerah", "Kasi Pemberdayaan Masyarakat dan Desa", "Kasi Pemeliharaan Sarana Dan Prasarana Umum", "Kasi Pemerintahan", "Kasubag Kepegawaian Dan Umum", "Kasubag Penyusunan Program dan Keuangan", "Sekertaris Camat"],
            datasets: [
                {
                    data: [<?= $c1; ?>,<?= $c2; ?>,<?= $c3; ?>,<?= $c4; ?>,<?= $c5; ?>,<?= $c6; ?>,<?= $c7; ?>],
                    backgroundColor: [
                        "#0000FF",
                        "#000080",
                        "#00FFFF",
                        "#00FF00",
                        "#FF00FF",
                        "#FF007F",
                        "#FF0000",
                        "#FF7F00",
                        "#FFC0CB",
                        "#6F00FF",
                        "#BF00FF",
                        "#8F00FF"
                    ]
                }]
        };
        var pieChart = new Chart(oilCanvas, {
        type: 'pie',
        data: oilData
        });
        </script>   
        </div> <!-- .content -->
    </div><!-- /#right-panel -->
    <!-- Right Panel -->
    <script src="<?php echo base_url('vendors/jquery/dist/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('vendors/popper.js/dist/umd/popper.min.js');?>"></script>
    <script src="<?php echo base_url('vendors/bootstrap/dist/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/main.js');?>"></script>
    <script src="<?php echo base_url('vendors/chart.js/dist/Chart.bundle.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/dashboard.js');?>"></script>
    <script src="<?php echo base_url('assets/js/widgets.js');?>"></script>
    <script src="<?php echo base_url('vendors/jqvmap/dist/jquery.vmap.min.js');?>"></script>
    <script src="<?php echo base_url('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js');?>"></script>
    <script src="<?php echo base_url('vendors/jqvmap/dist/maps/jquery.vmap.world.js');?>"></script>
</body>
</html>