<html>
<head>
    <title>Laporan Surat Masuk</title>
    <link rel="stylesheet" href="<?php echo base_url('vendors/bootstrap/dist/css/bootstrap.min.css');?>">
</head>
<body>
    <!-- Bagian Header-->
    <div class="row">
          <div class="col"><center>
            <table>
                <tr>
                    <td><img src="<?php echo base_url('assets/img/btjjr.png');?>" width="180px" height="150px"></td>
                    <td> <center>
                    <h3>PEMERINTAH KABUPATEN BANDUNG BARAT</h3>
            <h3><b>KECAMATAN BATUJAJAR</b></h3>
            <h6>Jl. Raya Batujajar No.145 Telp 022-6866505 Kode Pos 40561</h6>
            <h6>e-mail : kec.batujajar@bandungbaratkab.go.id</h6>
                    </center>
                    </td>
                </tr>
            <table>

          </center>
          </div>
          <hr align="center" size="100px" width="100%" color="black">
      </div>
    <center><h4>DAFTAR PENGENDALI NASKAH DINAS MASUK</h4></center>
    <table border="1">
    <thead>
        <tr><center>
            <th>No</th>
            <th>Nomor Naskah Dinas</th>
            <th>Tanggal Penerimaan</th>
            <th>Uraian/Perihal</th>
            <th>Tanggal Penyampaian</th>
            <th>Unit Pengolahan</th>
            <th>Ket.</th>
        </center></tr>
    </thead>
    <tbody><center>
    <?php
        $no=1;
        foreach($printSM as $hsl){ ?>
        <tr>
            <td><?php echo $no; ?></td><?php $no++; ?>
            <td><?php echo $hsl->no_naskah; ?></td>
            <td><?php echo $hsl->tgl_penerimaan; ?></td>
            <td><?php echo $hsl->uraian; ?></td>
            <td><?php echo $hsl->tgl_penyampaian; ?></td>
            <td><?php echo $hsl->bagian; ?></td>
            <td><?php echo $hsl->ket; ?></td>
        </tr>
        <?php } ?>
    </tbody>
    </center></table><br>
    <div class="row">
        <div class="col-md-8">
        </div>
        <div class="col-md-4">
            <center><b>CAMAT BATUJAJAR</b></center>
            <br>
            <br>
            <br>
            <center><b><u>Drs.DEDY KUSNIADI, M.Si</u></b></center>
            <center><b>NIP.196203161986031009</b></center>
        </div>
      <div>
    </div>
</body>
<script>
    window.print();
</script>
</html>
