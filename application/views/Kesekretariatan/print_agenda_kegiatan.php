<!doctype html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo base_url('vendors/bootstrap/dist/css/bootstrap.min.css');?>">
    <title>Kesekretariatan</title>
</head>
<body>
<br>
    <div class="container">
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
      <!-- Bagian Judul-->
      <div class="row">
          <div class="col-md-11">
          <h3><center>Agenda Kegiatan</center></h3>
          </div>
      </div><br>
    <table border="1">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama Kegiatan</th>
                    <th>Tanggal Pelaksanaan</th>
                    <th>Waktu Pelaksanaan</th>
                    <th>Tempat</th>
                    <th>Bagian</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no=1;
                foreach($agenda as $hsl){ ?>
                <tr>
                    <td><?php echo $no; ?></td><?php $no++; ?>
                    <td><?php echo $hsl->nama_kegiatan; ?></td>
                    <td><?php echo $hsl->tanggal_pelaksanaan; ?></td>
                    <td><?php echo $hsl->waktu_pelaksanaan; ?></td>
                    <td><?php echo $hsl->tempat; ?></td>
                    <td><?php echo $hsl->bagian; ?></td>
                </tr>
                <?php } ?>
            </tbody>
    </table><br>
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
