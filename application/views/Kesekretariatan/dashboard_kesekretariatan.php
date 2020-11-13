<?php
    $this->load->model('login_model');
    $jml_sm= $this->login_model->hitungJumlahSM();
    $jml_sk= $this->login_model->hitungJumlahSK();
    $jml_dspsm= $this->login_model->hitungJumlahDisposisiSM();
    $jml_agenda= $this->login_model->hitungJumlahAgenda();
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
    <title>Kesekretariatan</title>
    <link rel="stylesheet" href="<?php echo base_url('vendors/bootstrap/dist/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/font-awesome/css/font-awesome.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/themify-icons/css/themify-icons.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/flag-icon-css/css/flag-icon.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/selectFX/css/cs-skin-elastic.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/jqvmap/dist/jqvmap.min.css');?>">
    <script src="<?php echo base_url('vendors/chart.js/dist/Chart.js');?>"></script>
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
                        <h1>Dashboard</h1>
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
            <div class="col-xl-3 col-lg-7">
                <div class="card"><center>
                    <div class="card-body">
                    <i class="fa fa-envelope-o fa-5x"></i>
                    <h3>Surat Masuk</h3>
                    <h3><?= $jml_sm; ?></h3>
                    </div>
                    <div class="card-footer ">
                    <a href="<?php echo base_url(); ?>index.php/surat/surat_masuk">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-7">
                <div class="card"><center>
                    <div class="card-body">
                    <i class="fa fa-envelope-o fa-5x"></i>
                    <h3>Surat Keluar</h3>
                    <h3><?= $jml_sk; ?></h3>
                    </div>
                    <div class="card-footer">
                    <a href="<?php echo base_url(); ?>index.php/surat/surat_keluar">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-7">
                <div class="card"><center>
                    <div class="card-body">
                    <i class="fa fa-file-text-o fa-5x"></i>
                    <h3>Disposisi Surat Masuk</h3>
                    <h3><?= $jml_dspsm; ?></h3>
                    </div>
                    <div class="card-footer">
                    <a href="<?php echo base_url(); ?>index.php/surat/disposisi_surat_masuk" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-7">
                <div class="card"><center>
                    <div class="card-body">
                    <i class="fa fa-calendar fa-5x"></i>
                    <h3>Agenda Kegiatan</h3>
                    <h3><?= $jml_agenda; ?></h3>
                    </div>
                    <div class="card-footer">
                    <a href="<?php echo base_url(); ?>index.php/pegawai/agenda_kegiatan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                </div>
            </div>
        <div class="container-fluid">
           <div class="row">
                <div class="col-md-6">
                    <h4><center>Statistik Surat Masuk</center></h4><br>
                    <div style="width:100%;height: 20%">
		                <canvas id="suratMasuk"></canvas>
    	             </div>
                </div>
                <div class="col-md-6">
                    <h4><center>Statistik Surat Keluar</center></h4><br>
                    <div style="width:100%;height: 20%">
		                <canvas id="suratKeluar"></canvas>
    	             </div>
                </div>
           </div>
        </div>
	<script>
		var ctx = document.getElementById("suratMasuk").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
				datasets: [{
					label: 'Surat Masuk',
					data: <?php echo json_encode($sm); ?>,
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(255, 99, 132, 0.2)',
          'rgba(255, 99, 132, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
                    'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)',
					'rgba(255,99,132,1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
    <script>
		var ctx = document.getElementById("suratKeluar").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
				datasets: [{
					label: 'Surat Keluar',
					data: <?php echo json_encode($sk); ?>,
					backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(54, 162, 235, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					],
					borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
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
