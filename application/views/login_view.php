 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Arsip Surat Kecamatan Batujajar</title>
    <link rel="stylesheet" href="<?php echo base_url('vendors/bootstrap/dist/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/font-awesome/css/font-awesome.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/themify-icons/css/themify-icons.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/flag-icon-css/css/flag-icon.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('vendors/selectFX/css/cs-skin-elastic.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
    <link href="<?php echo base_url('assets/css/font.css');?>" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
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
<body class="bg-dark">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                <a href="#"><br>
                    <img class="align-content" src="<?php echo base_url('assets/img/1.png');?>" alt="" style="width:150px";>
                </a>
                </div>
                <div class="login-form">
                <center><?php echo $this->session->flashdata('msg');?></center>
                    <form action="<?php echo site_url('login/auth');?>" method="post">
                        <div class="form-group"><br>
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Masukkan Email" required>
                        </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                        </div><br>
                                <div class="checkbox">
                                    <label>
                                <input type="checkbox"> Remember Me
                            </label>
                                    <label class="pull-right">
                                <!--<a href="#">Lupa Password?</a>-->
                            </label>
                                </div>
                      <br><button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('vendors/jquery/dist/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('vendors/popper.js/dist/umd/popper.min.js');?>"></script>
    <script src="<?php echo base_url('vendors/bootstrap/dist/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/main.js');?>"></script>
</body>
</html>