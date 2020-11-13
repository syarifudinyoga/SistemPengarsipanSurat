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
    <title>Kesekretariatan</title>
    <link rel="stylesheet" href="<?php echo base_url('vendors/bootstrap/dist/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/font-awesome/css/font-awesome.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/themify-icons/css/themify-icons.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/flag-icon-css/css/flag-icon.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/selectFX/css/cs-skin-elastic.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/jqvmap/dist/jqvmap.min.css');?>">
    <!--date picker -->
    <link rel="stylesheet" href="<?php echo base_url('assets/date-picker/jquery-ui.css');?>">
    <script src="<?php echo base_url('assets/date-picker/jquery-1.12.4.js');?>"></script>
    <script src="<?php echo base_url('assets/date-picker/jquery-ui.js');?>"></script>
    <!--date picker -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
    <link href="<?php echo base_url('assets/css/font.css');?>" rel="stylesheet" type="text/css">
</head>
<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a href="<?php echo base_url(); ?>index.php/login/kesekretariatan"><br>
                    <img class="align-content" src="<?php echo base_url('assets/img/1.png');?>" alt="" style="width:150px";>
                </a>
            </div>
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <h3 class="menu-title"><center><img class="align-content" src="<?php echo base_url('assets/img/2.png');?>" alt="" style="width:150px";></center></h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-envelope-o"></i>Surat</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-envelope-open-o"></i><a href="<?php echo base_url(); ?>index.php/surat/surat_masuk">Surat Masuk</a></li>
                            <li><i class="fa fa-envelope-open-o"></i><a href="<?php echo base_url(); ?>index.php/surat/surat_keluar">Surat Keluar</a></li>
                            <li><i class="fa fa-envelope-open-o"></i><a href="<?php echo base_url(); ?>index.php/surat/klasifikasi_surat">Klasifikasi Surat</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Disposisi</a>
                        <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-calendar-minus-o"></i><a href="<?php echo base_url(); ?>index.php/surat/permintaan_disposisi_surat_masuk">Permohonan Disposisi</a></li>
                            <li><i class="fa fa-calendar-check-o"></i><a href="<?php echo base_url(); ?>index.php/surat/disposisi_surat_masuk">Disposisi Surat Masuk</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Pegawai</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-user-o"></i><a href="<?php echo base_url(); ?>index.php/kesekretariatan/data_pegawai">Data Pegawai</a></li>
                            <li><i class="menu-icon fa fa-user-secret"></i><a href="<?php echo base_url(); ?>index.php/kesekretariatan/data_user">Data User</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-sticky-note"></i>Buku Agenda</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-file-text"></i><a href="<?php echo base_url(); ?>index.php/pegawai/agenda_kegiatan">Agenda Kegiatan</a></li>
                            <li><i class="menu-icon fa fa-bookmark-o"></i><a href="<?php echo base_url(); ?>index.php/surat/cetak_laporan_surat_masuk">Laporan Surat Masuk</a></li>
                            <li><i class="menu-icon fa fa-bookmark-o"></i><a href="<?php echo base_url(); ?>index.php/surat/cetak_laporan_surat_keluar">Laporan Surat Keluar</a></li>
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
                        <h1>Laporan Surat Masuk</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <strong>Masukkan Tanggal Surat Masuk</strong>
                </div>
                <form action="<?php echo base_url(); ?>index.php/surat/printSM" method="POST" target="_BLANK">
                    <div class="card-body card-block">
                        <div class="form-group">
                            <label class=" form-control-label">Tanggal Awal</label>
                                <div class="input-group" >
                                    <div class="input-group-addon"><i class="fa fa-calendar" ></i></div>
                                        <input class="form-control" type="date" name="tgl_awal" required>
                                    </div>
                                    <small class="form-text text-muted">ex. 99/99/9999</small>
                                </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Tanggal Akhir</label>
                                            <div class="input-group" >
                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                    <input class="form-control" type="date" name="tgl_akhir" required>
                                                </div>
                                    <small class="form-text text-muted">ex. 99/99/9999</small>
                                </div>
                                <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-magic"></i>&nbsp; Cetak</button>
                            </div>
                        </div>
                    </form>
                    </div>
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
    <script>
        $( function() {
        $( "#datepicker" ).datepicker();
        } );
        $( function() {
        $( "#datepicker2" ).datepicker();
        } );
    </script>
</body>
</html>
