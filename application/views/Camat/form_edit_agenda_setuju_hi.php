<?php 
    $this->load->model('pegawai_model');
    $jml_disposisi= $this->pegawai_model->hitungJumlahDisposisi();
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
    <title>Camat</title>
    <link rel="stylesheet" href="<?php echo base_url('vendors/bootstrap/dist/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/font-awesome/css/font-awesome.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/themify-icons/css/themify-icons.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/flag-icon-css/css/flag-icon.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/selectFX/css/cs-skin-elastic.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
    <link href="<?php echo base_url('assets/css/font.css');?>" rel="stylesheet" type="text/css">
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
                <a href="<?php echo base_url(); ?>index.php/login/camat"><br>
                    <img class="align-content" src="<?php echo base_url('assets/img/1.png');?>" alt="" style="width:150px";>
                </a>
            </div>
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                <h3 class="menu-title"><center><img class="align-content" src="<?php echo base_url('assets/img/2.png');?>" alt="" style="width:150px";></center></h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Disposisi</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-calendar-check-o"></i><a href="<?php echo base_url(); ?>index.php/pegawai/disposisi_surat_masuk">Disposisi Surat Masuk</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-calendar"></i>Jadwal</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-calendar-plus-o"></i><a href="<?php echo base_url(); ?>index.php/pegawai/jadwal_hari_ini">Jadwal Hari Ini</a></li>
                            <li><i class="menu-icon fa fa-calendar-plus-o"></i><a href="<?php echo base_url(); ?>index.php/pegawai/jadwal_keseluruhan">Jadwal Keseluruhan</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-sticky-note"></i>Buku Agenda</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-file-text"></i><a href="<?php echo base_url(); ?>index.php/pegawai/laporan_kegiatan">laporan Kegiatan</a></li>
                            <li><i class="fa fa-bookmark-o"></i><a href="<?php echo base_url(); ?>index.php/pegawai/laporan_surat_masuk">laporan surat masuk</a></li>
                            <li><i class="fa fa-bookmark-o"></i><a href="<?php echo base_url(); ?>index.php/pegawai/laporan_surat_keluar">laporan surat keluar</a></li>
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
                        <div class="dropdown for-notification">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger"><?=$jml_disposisi; ?></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">Kamu Memiliki <?=$jml_disposisi; ?> Pemberitahuan</p>
                                <?php foreach($dsp as $hsl){ ?>
                                <a class="dropdown-item media bg-flat-color-2" href="#">
                                <p><?php echo "<h6>Surat dari <b>".$hsl->asal_surat."</b> Belum Diteruskan </h6>"; ?></p>
                                <form method="POST" action="<?php echo base_url(); ?>index.php/pegawai/formEditPermintaanDisposisi">
                                    <input type="hidden" name="id_disposisi" value="<?php echo $hsl->id_disposisi; ?>">
                                    <input type="image" src="<?php echo base_url('assets/img/edit.png');?>" style="width:20px";>
                                </form>
                            </a>
                                <?php }?>
                            </div>
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
                        <h1>Agenda Kegiatan</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
            <form action="<?php echo base_url(); ?>index.php/pegawai/editAgendaSetujuHI" method="POST">
                <div class="card-header"><strong>Edit</strong><small> Agenda</small></div>
                    <div class="card-body card-block">
                        <div class="form-group"><label class=" form-control-label">ID Agenda</label>
                        <input type="hidden" name="id_agenda" class="form-control" value="<?php echo $agenda[0]->id_agenda; ?>">
                         <input type="text" name="id_agenda" class="form-control" value="<?php echo $agenda[0]->id_agenda; ?>" disabled></div>

                        <div class="form-group"><label class=" form-control-label">Nama kegiatan</label>
                        <input type="hidden" name="nama_kegiatan" class="form-control" value="<?php echo $agenda[0]->nama_kegiatan; ?>">
                        <input type="text" name="nama_kegiatan" class="form-control" value="<?php echo $agenda[0]->nama_kegiatan; ?>" disabled></div>

                        <div class="form-group"><label class=" form-control-label">Tanggal Pelaksanaan</label>
                        <input type="hidden" name="tanggal_pelaksanaan" class="form-control" value="<?php echo $agenda[0]->tanggal_pelaksanaan; ?>">
                        <input type="text" name="tanggal_pelaksanaan" class="form-control" value="<?php echo $agenda[0]->tanggal_pelaksanaan; ?>" disabled></div>

                        <div class="form-group"><label class=" form-control-label">Waktu Pelaksanaan</label>
                        <input type="hidden" name="waktu_pelaksanaan" class="form-control" value="<?php echo $agenda[0]->waktu_pelaksanaan; ?>">
                        <input type="text" name="waktu_pelaksanaan" class="form-control" value="<?php echo $agenda[0]->waktu_pelaksanaan; ?>" disabled></div>

                        <div class="form-group"><label class=" form-control-label">Tempat</label>
                        <input type="hidden" name="tempat" class="form-control" value="<?php echo $agenda[0]->tempat; ?>">
                        <input type="text" name="tempat" class="form-control" value="<?php echo $agenda[0]->tempat; ?>" disabled></div>

                        <div class="form-group"><label class=" form-control-label">Bagian</label>
                        <input type="hidden" name="bagian" class="form-control" value="<?php echo $agenda[0]->bagian; ?>">
                        <input type="text" name="bagian" class="form-control" value="<?php echo $agenda[0]->bagian; ?>" disabled></div>
                        
                        <div class="form-group"><label class=" form-control-label" required>Status</label>
                        <div class="form-group">
                            <select name="Status" class="form-control">
        	                    <option value="" diselected>-- Pilih Status --</option>
                                <option value="dihadiri" >Dihadiri</option>
                                <option value="diwakilkan" >Diwakilkan</option>
                                <option value="tidak dihadiri" >Tidak Dihadiri</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Submit</button>
                </div>
            </form>
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