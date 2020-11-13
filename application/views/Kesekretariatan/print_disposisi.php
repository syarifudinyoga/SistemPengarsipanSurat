<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo base_url('vendors/bootstrap/dist/css/bootstrap.min.css');?>">
    
    <title>Lembar Disposisi</title>
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
            <h3><center><b><u>LEMBAR DISPOSISI</u></b></center></h3>
          </div>
      </div><br>
      <!-- Bagian Tengah-->
      <div class="row">
          <div class="col-md-12">
            <table border="1">
              <tr>
                <td width="250px" height="40px"><b>Surat Dari </b></td>
                <td> : <?php echo $disposisi[0]->asal_surat; ?></td>
                <td><b>Diterima Tgl </b></td>
                <td width="250px">: <?php echo $disposisi[0]->tgl_terima; ?></td>
              </tr>
              <tr>
                <td width="250px" height="40px"><b>No Surat </b></td>
                <td>: <?php echo $disposisi[0]->no_surat; ?></td>
                <td><b>No Agenda </b></td>
                <td>: <?php echo $disposisi[0]->id_surat_masuk; ?></td>
              </tr>
              <tr>
                <td width="250px" height="40px"><b>Tgl. Surat </b></td>
                <td>: <?php echo $disposisi[0]->tgl_surat; ?></td>
                <td><b>Sifat </b></td>
                <td>: <?php echo $disposisi[0]->sifat_surat; ?></td>
              </tr>
              <tr>
                <td width="250px" height="40px"><b>Perihal </b></td>
                <td colspan="3"> : <?php echo $disposisi[0]->perihal; ?></td>
              </tr>
              <tr>
                <td width="250px" height="40px"><b>Diteruskan Kepada </b></td>
                <td>: <?php echo $disposisi[0]->bagian; ?></td>
                <td><b>Dengan Hormat Harap </b></td>
                <td>: <?php echo $disposisi[0]->catatan; ?></td>
              </tr>
            </table>
          </div>
      </div><br>
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
    <script>
        window.print();
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
