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
    <link rel="stylesheet" href="<?php echo base_url('vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css');?>">
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
                        <h1>Data Pegawai</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                        <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
                        <div id="notifications"><?php echo $this->session->flashdata('hps'); ?></div>
                        <div id="notifications"><?php echo $this->session->flashdata('edt'); ?></div>
                            <div class="card-header">
                                <strong class="card-title"><a class="btn btn-success" href="<?php echo base_url(); ?>index.php/kesekretariatan/idxPeg">Tambah Data</a></strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Bagian</th>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th >Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($pegawai as $hsl){ ?>
                                        <tr>
                                            <td><?php echo $hsl->bagian; ?></td>
                                            <td><?php echo $hsl->nip; ?></td>
                                            <td><?php echo $hsl->nama; ?></td>
                                            <td>
                                            <div class="row">
                                            <div class="col-sm-2">
                                            <form method="POST" action="<?php echo base_url(); ?>index.php/kesekretariatan/formEditPegawai">
                                                <input type="hidden" name="bagian" value="<?php echo $hsl->bagian; ?>">
                                                <input type="image" src="<?php echo base_url('assets/img/edit.png');?>" style="width:20px";>
                                            </form>
                                            </div>
                                            <div class="col">
                                            <form method="POST" action="<?php echo base_url(); ?>index.php/kesekretariatan/hapusPegawai" onclick="return confirm('Yakin Hapus ?')">
                                            <input type="hidden" name="bagian" value="<?php echo $hsl->bagian; ?>">
                                            <input type="image" src="<?php echo base_url('assets/img/hapus.png');?>" style="width:20px";>
                                            </form>
                                            </div>
                                            </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
        </div> <!-- .content -->
    </div><!-- /#right-panel -->
    <!-- Right Panel -->
    <script src="<?php echo base_url('vendors/jquery/dist/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('vendors/popper.js/dist/umd/popper.min.js');?>"></script>
    <script src="<?php echo base_url('vendors/bootstrap/dist/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/main.js');?>"></script>
    <script src="<?php echo base_url('vendors/datatables.net/js/jquery.dataTables.min.js');?>"></script>
    <script src="<?php echo base_url('vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js');?>"></script>
    <script src="<?php echo base_url('vendors/datatables.net-buttons/js/dataTables.buttons.min.js');?>"></script>
    <script src="<?php echo base_url('vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js');?>"></script>
    <script src="<?php echo base_url('vendors/jszip/dist/jszip.min.js');?>"></script>
    <script src="<?php echo base_url('vendors/pdfmake/build/pdfmake.min.js');?>"></script>
    <script src="<?php echo base_url('vendors/pdfmake/build/vfs_fonts.js');?>"></script>
    <script src="<?php echo base_url('vendors/datatables.net-buttons/js/buttons.html5.min.js');?>"></script>
    <script src="<?php echo base_url('vendors/datatables.net-buttons/js/buttons.print.min.js');?>"></script>
    <script src="<?php echo base_url('vendors/datatables.net-buttons/js/buttons.colVis.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/init-scripts/data-table/datatables-init.js');?>"></script>
</body>
</html>
