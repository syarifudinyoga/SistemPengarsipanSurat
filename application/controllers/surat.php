<?php
class Surat extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
    $this->load->model('surat_model');
    $this->load->library('pdf');
  }

//=================================================================================Kelola Surat (Surat Masuk dan Surat Keluar)===============================================================//
//-----------------------------------------------Klasifikasi Surat
  //Baca Data Klasifikasi
    function klasifikasi_surat(){
      $data['klas'] = $this->surat_model->tampilKlasifikasiSurat();
      $this->load->view('Kesekretariatan/kasifikasi_surat', $data);
    }
  //Form Tambah Klasifikasi
    public function idxKS(){
      $this->load->view('Kesekretariatan/form_tambah_klasifikasi_surat');
    }
  //Tambah Data Klasifikasi
    public function tambahKlasifikasiSurat(){
      $kode_surat = $this->input->post('kode_surat');
      $perihal_surat = $this->input->post('perihal_surat');
      $data = array(
        'kode_surat' => $kode_surat,
        'perihal_surat' => $perihal_surat
      );
      if($data == null) {
        $this->session->set_flashdata('msg',
        '<div class="alert alert-danger">
          <p>Data Klasifikasi Surat Gagal Ditambahkan.</p>
        </div>');
        $this->klasifikasi_surat();
      } else {
        $this->session->set_flashdata('msg',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <p>Data <strong>Klasifikasi Surat</strong> Berhasil Ditambahkan </p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');
      $this->surat_model->tambahKlasifikasiSurat('klasifikasi_surat', $data);
      $this->klasifikasi_surat();
      };
    }
  //Form Edit Klasifikasi
    public function formEditKlasifikasiSurat(){
      $kode_surat = $this->input->post('kode_surat');
      $data['klas'] = $this->surat_model->urutKS($kode_surat);
      $this->load->view('Kesekretariatan/form_edit_klasifikasi_surat', $data);
    }
  //Edit Klasifikasi
    public function editKlasifikasiSurat(){
      $kode_surat = $this->input->post('kode_surat');
      $perihal_surat = $this->input->post('perihal_surat');
      $data = array(
        'kode_surat' => $kode_surat,
        'perihal_surat' => $perihal_surat,
      );
      if($data == null) {
        $this->session->set_flashdata('edt',
          '<div class="alert alert-danger">
            <p>Data Klasifikasi Surat Gagal Diubah.</p>
          </div>');
        $this->klasifikasi_surat();
      }else{
        $this->session->set_flashdata('edt',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <p>Data <strong>Klasifikasi Surat</strong> Berhasil Diubah </p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');
      $this->surat_model->editKlasifikasiSurat('klasifikasi_surat', $data, $kode_surat);
      $this->klasifikasi_surat();
      };
    }
  //Hapus Klasifikasi
    public function hapusKlasifikasiSurat(){
      $kode_surat =$this->input->post('kode_surat');
      if($kode_surat == null) {
        $this->session->set_flashdata('hps',
                '<div class="alert alert-danger">
                    <p>Data Klasifikasi Surat Gagal Dihapus.</p>
                </div>');
        $this->load->view('surat/surat_masuk');
      }else {
        $this->session->set_flashdata('hps',
          '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>Data <strong>Klasifikasi Surat</strong> Berhasil Dihapus </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        $this->surat_model->hapusKlasifikasiSurat($kode_surat);
        $this->klasifikasi_surat();
      };
    }
//-----------------------------------------------Surat Masuk
  //Baca Data Surat Masuk
    public function surat_masuk(){
      $data['suratmasuk'] = $this->surat_model->tampilSuratMasuk();
      $this->load->view('Kesekretariatan/surat_masuk', $data);
    }
  //Redirect ke form Tambah Surat Masuk (plus bagian dari join tabel pegawai)
    public function idxSM(){
      $data['bagian'] = $this->surat_model->getBagian();
      $data['klas'] = $this->surat_model->getKlas();
      $this->load->view('Kesekretariatan/form_tambah_surat_masuk', $data);
    }
  //Fungsi untuk tambah Surat Masuk
    public function tambahSuratMasuk(){
      $id_surat_masuk = $this->input->post('id_surat_masuk');
      $no_naskah = $this->input->post('no_naskah');
      $kode_surat = $this->input->post('kode_surat');
      $tgl_penerimaan = $this->input->post('tgl_penerimaan');
      $uraian = $this->input->post('uraian');
      $tgl_penyampaian = $this->input->post('tgl_penyampaian');
      $bagian = $this->input->post('bagian');
      $ket = $this->input->post('ket');
      //get Pdf
        $config['upload_path'] = './suratmasuk';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = '2048';  //2MB max
        $config['file_name'] = $_FILES['fileSm']['name'];
        $this->upload->initialize($config);
        if (!empty($_FILES['fileSm']['name'])) {
          if ( $this->upload->do_upload('fileSm') ) {
            $file = $this->upload->data();
              $data = array(
                'id_surat_masuk' => $id_surat_masuk,
                'no_naskah' => $no_naskah,
                'kode_surat' => $kode_surat,
                'tgl_penerimaan' => $tgl_penerimaan,
                'uraian' => $uraian,
                'tgl_penyampaian' => $tgl_penyampaian,
                'bagian' => $bagian,
                'ket' => $ket,
                'fileSm' => $file['file_name'],
              );
              if($data == null) {
                $this->session->set_flashdata('msg',
                        '<div class="alert alert-danger">
                            <h4>Oppss</h4>
                            <p>Tidak ada data dinput.</p>
                        </div>');
                $this->load->view('surat/surat_masuk');
              }else{
                $this->session->set_flashdata('msg',
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p>Data <strong>Surat Masuk</strong> Berhasil Ditambahkan </p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>');
                        $this->surat_model->insertSm($data);
                        redirect('surat/surat_masuk');
            };
          }else {
              die("gagal upload");
          }
        }else {
          echo "tidak masuk";
        }
    }
    //Redirect Ke halaman form edit Surat Masuk (data yang diambil sesuai bagian yang dipilih)
    public function formEditSuratMasuk(){
      $id_surat_masuk = $this->input->post('id_surat_masuk');
      $data['bagian'] = $this->surat_model->getBagian();
      $data['suratmasuk'] = $this->surat_model->urutIdSM($id_surat_masuk);
      $data['klas'] = $this->surat_model->getKlas();
      $this->load->view('Kesekretariatan/form_edit_surat_masuk', $data);
    }
    //Fungsi untuk Edit Surat Masuk
    public function editSuratMasuk(){
      $id_surat_masuk = $this->input->post('id_surat_masuk');
      $no_naskah = $this->input->post('no_naskah');
      $kode_surat = $this->input->post('kode_surat');
      $tgl_penerimaan = $this->input->post('tgl_penerimaan');
      $uraian = $this->input->post('uraian');
      $tgl_penyampaian = $this->input->post('tgl_penyampaian');
      $bagian = $this->input->post('bagian');
      $ket = $this->input->post('ket');
      // get pdf
      $config['upload_path'] = './suratmasuk';
      $config['allowed_types'] = 'pdf';
      $config['max_size'] = '2048';  //2MB max
      $config['file_name'] = $_FILES['fileSm']['name'];
      $this->upload->initialize($config);
	    if (!empty($_FILES['fileSm']['name'])) {
	      if ( $this->upload->do_upload('fileSm') ) {
	        $file = $this->upload->data();
	          $data = array(
              'id_surat_masuk' => $id_surat_masuk,
              'no_naskah' => $no_naskah,
              'kode_surat' => $kode_surat,
              'tgl_penerimaan' => $tgl_penerimaan,
              'uraian' => $uraian,
              'tgl_penyampaian' => $tgl_penyampaian,
              'bagian' => $bagian,
              'ket' => $ket,
              'fileSm' => $file['file_name'],
            );
            if($data == null) {
              $this->session->set_flashdata('edt',
                      '<div class="alert alert-danger">
                          <h4>Oppss</h4>
                          <p>Tidak ada data dinput.</p>
                      </div>');
              $this->load->view('surat/surat_masuk');
          } else {
              $this->session->set_flashdata('edt',
                      '<div class="alert alert-success alert-dismissible fade show" role="alert">
                      <p>Data <strong>Surat Masuk</strong> Berhasil Diubah </p>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>');
                    $this->surat_model->editSuratMasuk('surat_masuk', $data, $id_surat_masuk);
                    redirect('surat/surat_masuk');
          };
	      }else {
            die("gagal upload");
	      }
	    }else {
	      echo "tidak masuk";
      }
    }
    //Fungsi Untuk Menghapus Surat Masuk
    public function hapusSuratMasuk(){
      $id_surat_masuk =$this->input->post('id_surat_masuk');
      if($id_surat_masuk == null) {
        $this->session->set_flashdata('hps',
                '<div class="alert alert-danger">
                    <h4>Oppss</h4>
                    <p>Tidak ada data dihapus.</p>
                </div>');
        $this->load->view('surat/surat_masuk');
      }else {
        $this->session->set_flashdata('hps',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <p>Data <strong>Surat Masuk</strong> Berhasil Dihapus </p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
              $this->surat_model->hapusSuratMasuk($id_surat_masuk);
              redirect('surat/surat_masuk');
      };
    }
    //print pdf
    public function printPdfSm(){
      //$fileSm = $this->input->post('fileSm');
      //$data['suratmasuk'] = $this->surat_model->urutFileSm($fileSm);
      $id_surat_masuk = $this->input->post('id_surat_masuk');
      //$data['bagian'] = $this->surat_model->getBagian();
      $data['suratmasuk'] = $this->surat_model->urutIdSM($id_surat_masuk);
      $this->load->view('Kesekretariatan/pdfSm', $data);
    }

    //------------------------------------------------Surat Keluar
    //Redirect Ke Halaan Surat Keluar
    function surat_keluar(){
      $data['suratkeluar'] = $this->surat_model->tampilSuratKeluar();
      $this->load->view('Kesekretariatan/surat_keluar', $data);
    }
    //Redirect ke form Tambah Surat Keluar (plus bagian dari join tabel pegawai)
    public function idxSK(){
      $data['bagian'] = $this->surat_model->getBagian();
      $data['klas'] = $this->surat_model->getKlas();
      $this->load->view('Kesekretariatan/form_tambah_surat_keluar', $data);
    }
    //Fungsi untuk tambah Surat Keluar
    public function tambahSuratKeluar(){
      $id_surat_keluar = $this->input->post('id_surat_keluar');
      $no_naskah_dinas = $this->input->post('no_naskah_dinas');
      $kode_surat = $this->input->post('kode_surat');
      $tgl_surat = $this->input->post('tgl_surat');
      $uraian = $this->input->post('uraian');
      $tgl_keluar = $this->input->post('tgl_keluar');
      $bagian = $this->input->post('bagian');
      $ket = $this->input->post('ket');
      // get pdf
      $config['upload_path'] = './suratkeluar';
      $config['allowed_types'] = 'pdf';
      $config['max_size'] = '2048';  //2MB max
      $config['file_name'] = $_FILES['fileSk']['name'];
      $this->upload->initialize($config);
	    if (!empty($_FILES['fileSk']['name'])) {
	      if ( $this->upload->do_upload('fileSk') ) {
	        $file = $this->upload->data();
	          $data = array(
              'id_surat_keluar' => $id_surat_keluar,
              'no_naskah_dinas' => $no_naskah_dinas,
              'kode_surat' => $kode_surat,
              'tgl_surat' => $tgl_surat,
              'uraian' => $uraian,
              'tgl_keluar' => $tgl_keluar,
              'bagian' => $bagian,
              'ket' => $ket,
              'fileSk' => $file['file_name'],
            );
            if($data == null) {
              $this->session->set_flashdata('msg',
                      '<div class="alert alert-danger">
                          <h4>Oppss</h4>
                          <p>Tidak ada data dinput.</p>
                      </div>');
              $this->load->view('surat/surat_keluar');
          } else {
              $this->session->set_flashdata('msg',
                      '<div class="alert alert-success alert-dismissible fade show" role="alert">
                      <p>Data <strong>Surat Keluar</strong> Berhasil Ditambahkan </p>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>');
                    $this->surat_model->tambahSuratKeluar('surat_keluar', $data);
                    redirect('surat/surat_keluar');
          };
	        }else {
            die("gagal upload");
	        }
	    }else {
	      echo "tidak masuk";
	    }
    }
    //Redirect Ke halaman form edit pegawai (data yang diambil sesuai bagian yang dipilih)
    public function formEditSuratKeluar(){
      $id_surat_keluar = $this->input->post('id_surat_keluar');
      $data['bagian'] = $this->surat_model->getBagianSK();
      $data['suratkeluar'] = $this->surat_model->urutIdSK($id_surat_keluar);
      $data['klas'] = $this->surat_model->getKlas();
      $this->load->view('Kesekretariatan/form_edit_surat_keluar', $data);
    }
    //Fungsi untuk Edit Surat Keluar
    public function editSuratKeluar(){
      $id_surat_keluar = $this->input->post('id_surat_keluar');
      $no_naskah_dinas = $this->input->post('no_naskah_dinas');
      $kode_surat = $this->input->post('kode_surat');
      $tgl_surat = $this->input->post('tgl_surat');
      $uraian = $this->input->post('uraian');
      $tgl_keluar = $this->input->post('tgl_keluar');
      $bagian = $this->input->post('bagian');
      $ket = $this->input->post('ket');
      // get pdf
      $config['upload_path'] = './suratkeluar';
      $config['allowed_types'] = 'pdf';
      $config['max_size'] = '2048';  //2MB max
      $config['file_name'] = $_FILES['fileSk']['name'];
      $this->upload->initialize($config);
	    if (!empty($_FILES['fileSk']['name'])) {
	      if ( $this->upload->do_upload('fileSk') ) {
	        $file = $this->upload->data();
	          $data = array(
              'id_surat_keluar' => $id_surat_keluar,
              'no_naskah_dinas' => $no_naskah_dinas,
              'kode_surat' => $kode_surat,
              'tgl_surat' => $tgl_surat,
              'uraian' => $uraian,
              'tgl_keluar' => $tgl_keluar,
              'bagian' => $bagian,
              'ket' => $ket,
              'fileSk' => $file['file_name'],
            );
            if($data == null) {
              $this->session->set_flashdata('edt',
                      '<div class="alert alert-danger">
                          <h4>Oppss</h4>
                          <p>Tidak ada data dinput.</p>
                      </div>');
              $this->load->view('surat/surat_keluar');
          } else {
              $this->session->set_flashdata('edt',
                      '<div class="alert alert-success alert-dismissible fade show" role="alert">
                      <p>Data <strong>Surat Keluar</strong> Berhasil Diubah </p>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>');
                    $this->surat_model->editSuratKeluar('surat_keluar', $data, $id_surat_keluar);
                    redirect('surat/surat_keluar');
          };

	        }else {
            die("gagal upload");
	        }
	    }else {
	      echo "tidak masuk";
      }
    }
    //Fungsi Untuk Menghapus Surat Keluar
    public function hapusSuratKeluar(){
      $id_surat_keluar =$this->input->post('id_surat_keluar');
      if($id_surat_keluar == null) {
        $this->session->set_flashdata('hps',
                '<div class="alert alert-danger">
                    <h4>Oppss</h4>
                    <p>Tidak ada data dihapus.</p>
                </div>');
        $this->load->view('surat/surat_keluar');
      }else{
        $this->session->set_flashdata('hps',
              '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <p>Data <strong>Surat Keluar</strong> Berhasil Dihapus </p>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>');
              $this->surat_model->hapusSuratKeluar($id_surat_keluar);
              redirect('surat/surat_keluar');
      };
    }
    //print pdf
    public function printPdfSk(){
      $id_surat_keluar = $this->input->post('id_surat_keluar');
      $data['suratkeluar'] = $this->surat_model->urutIdSK($id_surat_keluar);
      $this->load->view('Kesekretariatan/pdfSk', $data);
    }
    //=============================================================================================Kelola Disposisi===============================================================================//
    //===============================================================================Permintaan Disposisi
    //Disposisi Surat Masuk
    public function permintaan_disposisi_surat_masuk(){
      $data['disposisi'] = $this->surat_model->tampilPermintaanDisposisi();
      $this->load->view('Kesekretariatan/permohonan_disposisi_surat_masuk', $data);
    }
    //Lempar ke Form Permintaan Disposisi
    public function idxPermintaanDisposisi(){
      $data['suma'] = $this->surat_model->getIDSm();
      $this->load->view('Kesekretariatan/form_tambah_permohonan_disposisi', $data);
    }
    //Tambah Permintaan Disposisi
    public function tambahPermintaanDisposisi(){
      $id_disposisi = $this->input->post('id_disposisi');
        $asal_surat = $this->input->post('asal_surat');
        $no_surat = $this->input->post('no_surat');
        $tgl_surat = $this->input->post('tgl_surat');
        $tgl_terima = $this->input->post('tgl_terima');
        $id_surat_masuk = $this->input->post('id_surat_masuk');
        $sifat_surat = $this->input->post('sifat_surat');
        $perihal = $this->input->post('perihal');
        $data = array(
          'id_disposisi' => $id_disposisi,
          'asal_surat' => $asal_surat,
          'no_surat' => $no_surat,
          'tgl_surat' => $tgl_surat,
          'tgl_terima' => $tgl_terima,
          'id_surat_masuk' => $id_surat_masuk,
          'sifat_surat' => $sifat_surat,
          'perihal' => $perihal
        );
        if($data == null) {
          $this->session->set_flashdata('msg',
                  '<div class="alert alert-danger">
                      <h4>Oppss</h4>
                      <p>Tidak ada data dinput.</p>
                  </div>');
          $this->load->view('surat/surat_masuk');
      } else {
          $this->session->set_flashdata('msg',
                  '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <p>Data <strong>Permintaan Disposisi</strong> Berhasil Ditambahkan </p>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
                $this->surat_model->tambahPermintaanDisposisi('permintaan_disposisi', $data);
                  redirect('surat/permintaan_disposisi_surat_masuk');
      };
    }
    //Form Untuk Edit Permintaan Disposisi
    public function formEditPermintaanDisposisi(){
      $id_disposisi = $this->input->post('id_disposisi');
      $data['suma'] = $this->surat_model->getIDSm();
      $data['bagian'] = $this->surat_model->getBagian();
      $data['disposisi'] = $this->surat_model->getIdPermintaanDisposisi($id_disposisi);
      $this->load->view('Kesekretariatan/form_edit_permintaan_disposisi', $data);
    }
    //Fungsi untuk Edit Disposisi
    public function editPermintaanDisposisi(){
      $id_disposisi = $this->input->post('id_disposisi');
      $asal_surat = $this->input->post('asal_surat');
      $no_surat = $this->input->post('no_surat');
      $tgl_surat = $this->input->post('tgl_surat');
      $tgl_terima = $this->input->post('tgl_terima');
      $id_surat_masuk = $this->input->post('id_surat_masuk');
      $sifat_surat = $this->input->post('sifat_surat');
      $perihal = $this->input->post('perihal');
      $data = array(
        'id_disposisi' => $id_disposisi,
        'asal_surat' => $asal_surat,
        'no_surat' => $no_surat,
        'tgl_surat' => $tgl_surat,
        'tgl_terima' => $tgl_terima,
        'id_surat_masuk' => $id_surat_masuk,
        'sifat_surat' => $sifat_surat,
        'perihal' => $perihal
      );
      if($data == null) {
        $this->session->set_flashdata('edt',
                '<div class="alert alert-danger">
                    <p>Data Permintaan Disposisi Gagal Diubah</p>
                </div>');
        $this->permintaan_disposisi_surat_masuk();
      }else{
        $this->session->set_flashdata('edt',
          '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>Data <strong>Permintaan Disposisi</strong> Berhasil Diubah </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        $this->surat_model->editPermintaanDisposisi('permintaan_disposisi', $data, $id_disposisi);
        $this->permintaan_disposisi_surat_masuk();
      };
    }
    //Fungsi Untuk Menghapus Disposisi
    public function hapusPermintaanDisposisi(){
      $id_disposisi =$this->input->post('id_disposisi');
      if($id_disposisi == null) {
        $this->session->set_flashdata('hps',
                '<div class="alert alert-danger">
                    <p>Data Permintaan Disposisi Gagal Dihapus</p>
                </div>');
        $this->permintaan_disposisi_surat_masuk();
      }else{
        $this->session->set_flashdata('hps',
          '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>Data <strong>Permintaan Disposisi</strong> Berhasil Dihapus </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        $this->surat_model->hapusPermintaanDisposisi($id_disposisi);
        $this->permintaan_disposisi_surat_masuk();
      };
    }
    //===============================================================================Disposisi
    /*
    //form disposisi
    public function idxDisposisi(){
      $data['suma'] = $this->surat_model->getIDSm();
      $data['bagian'] = $this->surat_model->getBagian();
      $this->load->view('Kesekretariatan/form_tambah_disposisi', $data);
    }
    */
    //Disposisi Surat Masuk
    public function disposisi_surat_masuk(){
      $data['disposisi'] = $this->surat_model->tampilDisposisi();
      $this->load->view('Kesekretariatan/disposisi_surat_masuk', $data);
    }
    /*
    //tambah disposisi
    public function tambahDisposisi(){
      $id_disposisi = $this->input->post('id_disposisi');
      $asal_surat = $this->input->post('asal_surat');
      $no_surat = $this->input->post('no_surat');
      $tgl_surat = $this->input->post('tgl_surat');
      $tgl_terima = $this->input->post('tgl_terima');
      $id_surat_masuk = $this->input->post('id_surat_masuk');
      $sifat_surat = $this->input->post('sifat_surat');
      $perihal = $this->input->post('perihal');
      $bagian = $this->input->post('bagian');
      $catatan = $this->input->post('catatan');
      $data = array(
        'id_disposisi' => $id_disposisi,
        'asal_surat' => $asal_surat,
        'no_surat' => $no_surat,
        'tgl_surat' => $tgl_surat,
        'tgl_terima' => $tgl_terima,
        'id_surat_masuk' => $id_surat_masuk,
        'sifat_surat' => $sifat_surat,
        'perihal' => $perihal,
        'bagian' => $bagian,
        'catatan' => $catatan
      );
    }
    */
    //Fungsi untuk Edit Disposisi
    public function editDisposisi(){
      $id_disposisi = $this->input->post('id_disposisi');
      $asal_surat = $this->input->post('asal_surat');
      $no_surat = $this->input->post('no_surat');
      $tgl_surat = $this->input->post('tgl_surat');
      $tgl_terima = $this->input->post('tgl_terima');
      $id_surat_masuk = $this->input->post('id_surat_masuk');
      $sifat_surat = $this->input->post('sifat_surat');
      $perihal = $this->input->post('perihal');
      $bagian = $this->input->post('bagian');
      $catatan = $this->input->post('catatan');
      $data = array(
        'id_disposisi' => $id_disposisi,
        'asal_surat' => $asal_surat,
        'no_surat' => $no_surat,
        'tgl_surat' => $tgl_surat,
        'tgl_terima' => $tgl_terima,
        'id_surat_masuk' => $id_surat_masuk,
        'sifat_surat' => $sifat_surat,
        'perihal' => $perihal,
        'bagian' => $bagian,
        'catatan' => $catatan
      );
      $this->surat_model->editDisposisi('disposisism', $data, $id_disposisi);
      $this->disposisi_surat_masuk();
    }
    //Redirect Ke halaman form edit pegawai (data yang diambil sesuai bagian yang dipilih)
    public function formEditDisposisi(){
      $id_disposisi = $this->input->post('id_disposisi');
      $data['suma'] = $this->surat_model->getIDSm();
      $data['bagian'] = $this->surat_model->getBagian();
      $data['disposisi'] = $this->surat_model->getIdDisposisi($id_disposisi);
      $this->load->view('Kesekretariatan/form_edit_disposisi', $data);
    }
    //Fungsi Untuk Menghapus Disposisi
    public function hapusDisposisi(){
      $id_disposisi =$this->input->post('id_disposisi');
      $this->surat_model->hapusDisposisi($id_disposisi);
      $this->disposisi_surat_masuk();
    }
    //Fungsi Print Disposisi
    public function printDisposisi(){
      $id_disposisi = $this->input->post('id_disposisi');
      $data['disposisi'] = $this->surat_model->getIdDisposisi($id_disposisi);
      $this->load->view('Kesekretariatan/print_disposisi', $data);
    }
  //==============================================================================Kelola Laporan (Surat Masuk dan Surat Keluar)=================================================================//
    //Laporan Surat Masuk
    public function cetak_laporan_surat_masuk(){
      $this->load->view('Kesekretariatan/cetak_laporan_surat_masuk');
    }
    //Cetak Laporan Surat Masuk
    public function printSM(){
      $data['printSM']= $this->surat_model->printSM();
      $this->load->view('Kesekretariatan/print_surat_masuk', $data);
    }
    //Laporan Surat Keluar
    public function cetak_laporan_surat_keluar(){
      $this->load->view('Kesekretariatan/cetak_laporan_surat_keluar');
    }
    //Cetak Laporan Surat Keluar
    public function printSK(){
      $data['printSK']= $this->surat_model->printSK();
      $this->load->view('Kesekretariatan/print_surat_keluar', $data);
    }
}
