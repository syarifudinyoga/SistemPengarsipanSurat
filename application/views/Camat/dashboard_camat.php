<?php 
    $this->load->model('login_model');
    $jml_disposisi= $this->login_model->hitungJumlahDisposisi();
    $jml_disposisism= $this->login_model->hitungJumlahDisposisiSM();
    $jml_jdwhariini= $this->login_model->hitungJumlahKegiatanCamatHariIni();
    $jml_agenda= $this->login_model->hitungJumlahAgendaCamat();
    $jml_laporan= $this->login_model->hitungJumlahLaporan();
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
                        <h1>Dashboard Camat</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-7">
                <div class="card"><center>
                    <div class="card-body">
                    <i class="fa fa-calendar fa-5x"></i>
                    <h3>Jadwal Hari Ini</h3>
                    <h3><?= $jml_jdwhariini; ?></h3>
                    </div>
                    <div class="card-footer ">
                    <a href="<?php echo base_url(); ?>index.php/pegawai/jadwal_hari_ini">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-7">
                <div class="card"><center>
                    <div class="card-body">
                    <i class="fa fa-calendar fa-5x"></i>
                    <h3>Jadwal Keseluruhan</h3>
                    <h3><?= $jml_agenda; ?></h3>
                    </div>
                    <div class="card-footer">
                    <a href="<?php echo base_url(); ?>index.php/pegawai/jadwal_keseluruhan">More info <i class="fa fa-arrow-circle-right"></i></a>
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
                    <a href="<?php echo base_url(); ?>index.php/pegawai/laporan_kegiatan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-7">
                <div class="card"><center>
                    <div class="card-body">
                    <i class="fa fa-file-text-o fa-5x"></i>
                    <h3>Disposisi Surat Masuk</h3>
                    <h3><?= $jml_disposisism; ?></h3>
                    </div>
                    <div class="card-footer">
                    <a href="<?php echo base_url(); ?>index.php/pegawai/disposisi_surat_masuk" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                </div>
            </div>
            <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <h4><center>Statistik Surat Untuk Camat</center></h4><br>
                    <div style="width:100%;height: 20%">
		                <canvas id="suratCamat"></canvas>
    	             </div>
                </div>
                <div class="col-md-6">
                    <h4><center>Statistik Kegiatan Untuk Camat</center></h4><br>
                    <div style="width:100%;height: 20%">
		                <canvas id="Agenda"></canvas>
    	             </div>
                </div>
            </div>
        </div>
        <script>
		var ctx = document.getElementById("suratCamat").getContext('2d');
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
        var oilCanvas = document.getElementById("Agenda");
        Chart.defaults.global.defaultFontFamily = "Lato";
        Chart.defaults.global.defaultFontSize = 18;
        var oilData = {
            labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
                datasets: [
                    {
                        data: <?php echo json_encode($a); ?>,
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
