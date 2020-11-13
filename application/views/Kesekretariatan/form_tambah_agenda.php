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
    <!--date picker -->
    <link rel="stylesheet" href="<?php echo base_url('assets/date-picker/jquery-ui.css');?>">
    <script src="<?php echo base_url('assets/date-picker/jquery-1.12.4.js');?>"></script>
    <script src="<?php echo base_url('assets/date-picker/jquery-ui.js');?>"></script>
    <!--date picker-->
    <!-- Validasi dengan JavaScript -->
<script language="javascript">
	function getkey(e)
	{
		if (window.event)
   		return window.event.keyCode;
		else if (e)
   		return e.which;
		else
   		return null;
	}
	function goodchars(e, goods, field)
	{
	var key, keychar;
	key = getkey(e);
		if (key == null) return true;
 
		keychar = String.fromCharCode(key);
		keychar = keychar.toLowerCase();
		goods = goods.toLowerCase();
 
	// check goodkeys
	if (goods.indexOf(keychar) != -1)
			return true;
	// control keys
	if ( key==null || key==0 || key==8 || key==9 || key==27 )
		return true;		
	if (key == 13) {
			var i;
			for (i = 0; i < field.form.elements.length; i++)
					if (field == field.form.elements[i])
							break;
			i = (i + 1) % field.form.elements.length;
			field.form.elements[i].focus();
			return false;
			};
	// else return false
	return false;
	}
    </script>
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
                        <h1>Tambah Agenda</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
            <form action="<?php echo base_url(); ?>index.php/pegawai/tambahAgenda" method="POST">
                <div class="card-header"><strong>Data</strong><small> Agenda Kegiatan</small></div>
                    <div class="card-body card-block">
                        <div class="form-group"><label for="company" class=" form-control-label">Id Agenda</label>
                        <input type="text" name="id_agenda" placeholder="ID Agenda" class="form-control" disabled></div>
                        <div class="form-group"><label for="vat" class=" form-control-label">Nama Kegiatan</label>
                        <input type="text" name="nama_kegiatan" placeholder="Masukkan Nama Kegiatan" class="form-control" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ 0123456789',this)" maxlength="25" required></div>
                        <div class="form-group"><label for="street" class=" form-control-label">Tanggal Pelaksanaan</label>
                        <input type="date" name="tanggal_pelaksanaan" placeholder="Masukkan Tanggal Pelaksanaan" class="form-control" required></div>
                        <div class="form-group"><label for="company" class=" form-control-label">Waktu Pelaksanaan</label>
                        <input type="time" name="waktu_pelaksanaan" placeholder="Masukan Waktu Pelaksanaan" class="form-control" required></div>
                        <div class="form-group"><label for="vat" class=" form-control-label">Tempat</label>
                        <input type="text" name="tempat" placeholder="Masukkan Tempat Kegiatan" class="form-control" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ 0123456789',this)" maxlength="50" required></div>
                        <div class="form-group"><label class=" form-control-label">Bagian</label>
                        <div class="form-group">
                            <select name="bagian" class="form-control" required>
        	                    <option value="">-- Pilih Bidang --</option>
                                    <?php
                                foreach ($agenda as $bag) {
                                echo "<option value='".$bag->bagian."'>".$bag->bagian."</option>";
                                }
                                echo"
                            </select>"
                                ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Submit</button>
                </div>
            </form>
            </div>
        </div>
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
