<?php
class Pegawai extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
    $this->load->model('pegawai_model');
  }

//=======================================================================================Kelola Agenda========================================================================================//
  //Baca Agenda Kegiatan
  public function agenda_kegiatan(){
    $data['agenda'] = $this->pegawai_model->tampilAgenda();
    $this->load->view('Kesekretariatan/agenda_kegiatan', $data);
  }
  //Redirect ke form Tambah Agenda Kegiatan (plus bagian dari join tabel pegawai)
  public function idxAgenda(){
    $data['agenda'] = $this->pegawai_model->getBagian();
    $this->load->view('Kesekretariatan/form_tambah_agenda', $data);
  }
  //Tambah Agenda
  public function tambahAgenda(){
    $id_agenda = $this->input->post('id_agenda');
    $nama_kegiatan = $this->input->post('nama_kegiatan');
    $tanggal_pelaksanaan = $this->input->post('tanggal_pelaksanaan');
    $waktu_pelaksanaan = $this->input->post('waktu_pelaksanaan');
    $tempat = $this->input->post('tempat');
    $bagian = $this->input->post('bagian');
    $data = array(
      'id_agenda' => $id_agenda,
      'nama_kegiatan' => $nama_kegiatan,
      'tanggal_pelaksanaan' => $tanggal_pelaksanaan,
      'waktu_pelaksanaan' => $waktu_pelaksanaan,
      'tempat' => $tempat,
      'bagian' => $bagian
    );
    if($data == null) {
      $this->session->set_flashdata('msg',
        '<div class="alert alert-danger">
          <h4>Oppss</h4>
            <p>Tidak ada data dinput.</p>
        </div>');
      $this->agenda_kegiatan();
    }else{
      $this->session->set_flashdata('msg',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <p>Data <strong>Agenda </strong> Berhasil Ditambah </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>');
      $this->pegawai_model->tambahAgenda('agenda', $data);
      $this->agenda_kegiatan();
    };
  }
  //Redirect Ke halaman form edit pegawai (data yang diambil sesuai bagian yang dipilih)
  public function formEditAgenda(){
    $id_agenda = $this->input->post('id_agenda');
    $data['bagian'] = $this->pegawai_model->getBagianAgenda();
    $data['agenda'] = $this->pegawai_model->urutIdAgenda($id_agenda);
    $this->load->view('Kesekretariatan/form_edit_agenda', $data);
  }
  //Fungsi untuk Edit Agenda
  public function editAgenda(){
    $id_agenda = $this->input->post('id_agenda');
    $nama_kegiatan = $this->input->post('nama_kegiatan');
    $tanggal_pelaksanaan = $this->input->post('tanggal_pelaksanaan');
    $waktu_pelaksanaan = $this->input->post('waktu_pelaksanaan');
    $tempat = $this->input->post('tempat');
    $bagian = $this->input->post('bagian');
    $data = array(
      'id_agenda' => $id_agenda,
      'nama_kegiatan' => $nama_kegiatan,
      'tanggal_pelaksanaan' => $tanggal_pelaksanaan,
      'waktu_pelaksanaan' => $waktu_pelaksanaan,
      'tempat' => $tempat,
      'bagian' => $bagian
    );
    if($data == null) {
      $this->session->set_flashdata('edt',
        '<div class="alert alert-danger">
          <h4>Oppss</h4>
            <p>Tidak ada data dinput.</p>
        </div>');
      $this->agenda_kegiatan();
    }else{
      $this->session->set_flashdata('edt',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <p>Data <strong>Agenda </strong> Berhasil Diubah </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>');
      $this->pegawai_model->editAgenda('agenda', $data, $id_agenda);
      $this->agenda_kegiatan();
    };
  }
  //Fungsi Untuk Hapus Agenda
  public function hapusAgenda(){
    $id_agenda =$this->input->post('id_agenda');
    if($id_agenda == null) {
      $this->session->set_flashdata('hps',
        '<div class="alert alert-danger">
          <h4>Oppss</h4>
            <p>Tidak ada data dinput.</p>
        </div>');
      $this->agenda_kegiatan();
    }else{
      $this->session->set_flashdata('hps',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <p>Data <strong>Agenda </strong> Berhasil Dihapus </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>');
      $this->pegawai_model->hapusAgenda($id_agenda);
      $this->agenda_kegiatan();
    };
  }
  //Fungsi Untuk Pindah ke Cetak Agenda Kegiatan
  public function cetak_agenda_kegiatan(){
    $this->load->view('Kesekretariatan/cetak_agenda_kegiatan');
  }
  //Cetak Laporan Agenda Kegiatan
  public function printAK(){
    $data['agenda']= $this->pegawai_model->printAK();
    $this->load->view('Kesekretariatan/print_agenda_kegiatan', $data);
  }
//=============================================================================================Kelola Disposisi===============================================================================//
  //form disposisi
  public function idxDisposisi(){
    $data['suma'] = $this->pegawai_model->getIDSm();
    $data['bagian'] = $this->pegawai_model->getBagian();
    $this->load->view('Camat/form_tambah_disposisi', $data);
  }
  //Disposisi Surat Masuk
  public function disposisi_surat_masuk(){
    $data['disposisi'] = $this->pegawai_model->tampilDisposisi();
    $data['dsp'] = $this->pegawai_model->tampilPermintaanDisposisi();
    $this->load->view('Camat/disposisi_surat_masuk', $data);
  }
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
    if($data == null) {
      $this->session->set_flashdata('msg',
        '<div class="alert alert-danger">
          <h4>Oppss</h4>
            <p>Tidak ada data dinput.</p>
        </div>');
      $this->disposisi_surat_masuk();
    }else{
      $this->session->set_flashdata('msg',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <p>Data <strong>Disposisi </strong> Berhasil Diubah </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>');
      $this->pegawai_model->editDisposisi('disposisism', $data, $id_disposisi);
      $this->disposisi_surat_masuk();
    };
  }
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
    if($data == null) {
      $this->session->set_flashdata('msg',
        '<div class="alert alert-danger">
          <h4>Oppss</h4>
            <p>Tidak ada data dinput.</p>
        </div>');
      $this->disposisi_surat_masuk();
    }else{
      $this->session->set_flashdata('msg',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <p>Data <strong>Disposisi </strong> Berhasil Ditambah </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>');
      $this->pegawai_model->tambahDisposisi('disposisism', $data);
      $this->pegawai_model->hapusDisposisi($id_disposisi);
      $this->disposisi_surat_masuk();
      };
  }
  //Redirect Ke halaman form edit disposisi (data yang diambil sesuai bagian yang dipilih)
  public function formEditDisposisi(){
    $id_disposisi = $this->input->post('id_disposisi');
    $data['disposisi'] = $this->pegawai_model->tampilDisposisi();
    $data['dsp'] = $this->pegawai_model->tampilPermintaanDisposisi();
    $data['suma'] = $this->pegawai_model->getIDSm();
    $data['bagian'] = $this->pegawai_model->getBagian();
    $data['disposisi'] = $this->pegawai_model->getIdDisposisi($id_disposisi);
    $this->load->view('Camat/form_edit_disposisi', $data);
  }
  //Form Edit Permintaan Disposisi
  public function formEditPermintaanDisposisi(){
    $id_disposisi = $this->input->post('id_disposisi');
    $data['dsp'] = $this->pegawai_model->tampilPermintaanDisposisi();
    $data['bagian'] = $this->pegawai_model->getBagian();
    $data['disposisi'] = $this->pegawai_model->getIdPermintaanDisposisi($id_disposisi);
    $this->load->view('Camat/form_edit_permintaan_disposisi', $data);
  }
  //Fungsi Print Disposisi
  public function printDisposisi(){
    $id_disposisi = $this->input->post('id_disposisi');
    $data['disposisi'] = $this->pegawai_model->getIdDisposisi($id_disposisi);
    $this->load->view('Camat/print_disposisi', $data);
  }
//==============================================================================================Jadwal
  //Jadwal Hari Ini
  public function jadwal_hari_ini(){
    $data['disposisi'] = $this->pegawai_model->tampilDisposisi();
    $data['dsp'] = $this->pegawai_model->tampilPermintaanDisposisi();
    $data['agenda'] = $this->pegawai_model->tampilAgendaHariIni();
    $this->load->view('Camat/jadwal_hari_ini', $data);
  }
  //Jadwal Keseluruhan
  public function jadwal_keseluruhan(){
    $data['disposisi'] = $this->pegawai_model->tampilDisposisi();
    $data['dsp'] = $this->pegawai_model->tampilPermintaanDisposisi();
    $data['agenda'] = $this->pegawai_model->tampilAgendaKeseluruhan();
    $this->load->view('Camat/jadwal_keseluruhan', $data);
  }
  //Edit status Hari Ini Camat
  public function formEditStatus(){
    $id_agenda = $this->input->post('id_agenda');
    $data['bagian'] = $this->pegawai_model->getBagian();
    $data['agenda'] = $this->pegawai_model->urutIdAgenda($id_agenda);
    $this->load->view('Camat/form_edit_agenda_setuju', $data);
  }
  //Edit Status Keseluruhan Camat
  public function formEditStatusHI(){
    $id_agenda = $this->input->post('id_agenda');
    $data['bagian'] = $this->pegawai_model->getBagian();
    $data['agenda'] = $this->pegawai_model->urutIdAgenda($id_agenda);
    $this->load->view('Camat/form_edit_agenda_setuju_hi', $data);
  }
  //Edit Setuju Keseluruhan
  public function editAgendaSetuju(){
    $id_agenda = $this->input->post('id_agenda');
    $nama_kegiatan = $this->input->post('nama_kegiatan');
    $tanggal_pelaksanaan = $this->input->post('tanggal_pelaksanaan');
    $waktu_pelaksanaan = $this->input->post('waktu_pelaksanaan');
    $tempat = $this->input->post('tempat');
    $bagian = $this->input->post('bagian');
    $status = $this->input->post('Status');
    $data = array(
      'id_agenda' => $id_agenda,
      'nama_kegiatan' => $nama_kegiatan,
      'tanggal_pelaksanaan' => $tanggal_pelaksanaan,
      'waktu_pelaksanaan' => $waktu_pelaksanaan,
      'tempat' => $tempat,
      'bagian' => $bagian,
      'Status' => $status
    );
    $this->pegawai_model->editAgenda('agenda', $data, $id_agenda);
    $this->jadwal_keseluruhan();
  }
  //Edit Setuju Hari Ini
  public function editAgendaSetujuHI(){
    $id_agenda = $this->input->post('id_agenda');
    $nama_kegiatan = $this->input->post('nama_kegiatan');
    $tanggal_pelaksanaan = $this->input->post('tanggal_pelaksanaan');
    $waktu_pelaksanaan = $this->input->post('waktu_pelaksanaan');
    $tempat = $this->input->post('tempat');
    $bagian = $this->input->post('bagian');
    $status = $this->input->post('Status');
    $data = array(
      'id_agenda' => $id_agenda,
      'nama_kegiatan' => $nama_kegiatan,
      'tanggal_pelaksanaan' => $tanggal_pelaksanaan,
      'waktu_pelaksanaan' => $waktu_pelaksanaan,
      'tempat' => $tempat,
      'bagian' => $bagian,
      'Status' => $status
    );
    $this->pegawai_model->editAgenda('agenda', $data, $id_agenda);
    $this->jadwal_hari_ini();
  }
//==============================================================================================Laporan
  //Laporan Surat_masuk
  public function laporan_surat_masuk(){
    $data['disposisi'] = $this->pegawai_model->tampilDisposisi();
    $data['dsp'] = $this->pegawai_model->tampilPermintaanDisposisi();
    $this->load->view('Camat/laporan_surat_masuk', $data);
  }
  //Cetak Laporan Surat Masuk
  public function printSM(){
    $data['printSM']= $this->pegawai_model->printSM();
    $this->load->view('Camat/print_surat_masuk', $data);
  }
  //Laporan Surat Keluar
  function laporan_surat_keluar(){
    $data['disposisi'] = $this->pegawai_model->tampilDisposisi();
    $data['dsp'] = $this->pegawai_model->tampilPermintaanDisposisi();
    $this->load->view('Camat/laporan_surat_keluar', $data);
  }
  //Cetak Laporan Surat Keluar
  public function printSK(){
    $data['printSK']= $this->pegawai_model->printSK();
    $this->load->view('Camat/print_surat_keluar', $data);
  }
  //Tampil Laporan Kegiatan
  public function laporan_kegiatan(){
    $data['disposisi'] = $this->pegawai_model->tampilDisposisi();
    $data['dsp'] = $this->pegawai_model->tampilPermintaanDisposisi();
    $data['laporan'] = $this->pegawai_model->tampilLaporan();
    $this->load->view('Camat/laporan_kegiatan', $data);
  }
//==============================================================================================Jadwal Bagian Internal
  //Jadwal Hari Ini Bagian Internal
  function jadwal_hari_ini_internal(){
    $data['agenda'] = $this->pegawai_model->tampilAgendaHariIniInternal();
    $this->load->view('PenerimaSurat/jadwal_hari_ini', $data);
  }
  //Jadwal Keseluruhan Internal
  function jadwal_keseluruhan_internal(){
    $data['agenda'] = $this->pegawai_model->tampilAgendaKeseluruhanInternal();
    $this->load->view('PenerimaSurat/jadwal_keseluruhan', $data);
  }
  //Form Edit Status Agenda Penerima Surat Hari Ini
  public function formEditStatusPSHI(){
    $id_agenda = $this->input->post('id_agenda');
    $data['bagian'] = $this->pegawai_model->getBagian();
    $data['agenda'] = $this->pegawai_model->urutIdAgenda($id_agenda);
    $this->load->view('PenerimaSurat/form_edit_agenda_setuju_hi', $data);
  }
  //Edit Status Agenda Penerima Surat Hari Ini
  public function editAgendaSetujuPSHI(){
    $id_agenda = $this->input->post('id_agenda');
    $nama_kegiatan = $this->input->post('nama_kegiatan');
    $tanggal_pelaksanaan = $this->input->post('tanggal_pelaksanaan');
    $waktu_pelaksanaan = $this->input->post('waktu_pelaksanaan');
    $tempat = $this->input->post('tempat');
    $bagian = $this->input->post('bagian');
    $status = $this->input->post('Status');
    $data = array(
      'id_agenda' => $id_agenda,
      'nama_kegiatan' => $nama_kegiatan,
      'tanggal_pelaksanaan' => $tanggal_pelaksanaan,
      'waktu_pelaksanaan' => $waktu_pelaksanaan,
      'tempat' => $tempat,
      'bagian' => $bagian,
      'Status' => $status
    );
    $this->pegawai_model->editAgenda('agenda', $data, $id_agenda);
    $this->jadwal_hari_ini_internal();
  }
  //Form Edit Status Agenda Penerima Surat Keseluruhan
  public function formEditStatusPSS(){
    $id_agenda = $this->input->post('id_agenda');
    $data['bagian'] = $this->pegawai_model->getBagian();
    $data['agenda'] = $this->pegawai_model->urutIdAgenda($id_agenda);
    $this->load->view('PenerimaSurat/form_edit_agenda_setuju_keseluruhan', $data);
  }
  //Edit Status Agenda Penerima Surat Keseluruhan
  public function editAgendaSetujuPSS(){
    $id_agenda = $this->input->post('id_agenda');
    $nama_kegiatan = $this->input->post('nama_kegiatan');
    $tanggal_pelaksanaan = $this->input->post('tanggal_pelaksanaan');
    $waktu_pelaksanaan = $this->input->post('waktu_pelaksanaan');
    $tempat = $this->input->post('tempat');
    $bagian = $this->input->post('bagian');
    $status = $this->input->post('Status');
    $data = array(
      'id_agenda' => $id_agenda,
      'nama_kegiatan' => $nama_kegiatan,
      'tanggal_pelaksanaan' => $tanggal_pelaksanaan,
      'waktu_pelaksanaan' => $waktu_pelaksanaan,
      'tempat' => $tempat,
      'bagian' => $bagian,
      'Status' => $status
    );
    $this->pegawai_model->editAgenda('agenda', $data, $id_agenda);
    $this->jadwal_keseluruhan_internal();
  }
//==============================================================================================Laporan Kegiatan
  //Tampil Laporan Kegiatan
  function laporan_kegiatan_internal(){
    $data['laporan'] = $this->pegawai_model->tampilLaporan();
    $this->load->view('PenerimaSurat/laporan_kegiatan', $data);
  }
  //Redirect ke form Tambah Laporan Kegiatan
  public function idxLK(){
    $data['bagian'] = $this->pegawai_model->getBagian();
    $this->load->view('PenerimaSurat/form_tambah_laporan_kegiatan', $data);
  }
  //Tambah Laporan Kegiatan
  public function tambahLaporan(){
    $id_kegiatan = $this->input->post('id_kegiatan');
    $nama_kegiatan = $this->input->post('nama_kegiatan');
    $tgl_kegiatan = $this->input->post('tgl_kegiatan');
    $bagian = $this->input->post('bagian');
    $hasil = $this->input->post('hasil');
    $data = array(
      'id_kegiatan' => $id_kegiatan,
      'nama_kegiatan' => $nama_kegiatan,
      'tgl_kegiatan' => $tgl_kegiatan,
      'bagian' => $bagian,
      'hasil' => $hasil
    );
    if($data == null) {
      $this->session->set_flashdata('msg',
        '<div class="alert alert-danger">
          <h4>Oppss</h4>
            <p>Tidak ada data dinput.</p>
        </div>');
      $this->laporan_kegiatan_internal();
    }else{
      $this->session->set_flashdata('msg',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <p>Data <strong>Laporan Kegiatan </strong> Berhasil Ditambah </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>');
      $this->pegawai_model->tambahLaporan('laporan_kegiatan', $data);
      $this->laporan_kegiatan_internal();
    };
  }
  //Form Edit Laporan Kegiatan
  public function formEditLaporan(){
    $id_kegiatan = $this->input->post('id_kegiatan');
    $data['bagian'] = $this->pegawai_model->getBagian();
    $data['laporan'] = $this->pegawai_model->urutIdLK($id_kegiatan);
    $this->load->view('PenerimaSurat/form_edit_laporan', $data);
  }
  //Edit Laporan Kegiatan
  public function editLaporan(){
    $id_kegiatan = $this->input->post('id_kegiatan');
    $nama_kegiatan = $this->input->post('nama_kegiatan');
    $tgl_kegiatan = $this->input->post('tgl_kegiatan');
    $bagian = $this->input->post('bagian');
    $hasil = $this->input->post('hasil');
    $data = array(
      'id_kegiatan' => $id_kegiatan,
      'nama_kegiatan' => $nama_kegiatan,
      'tgl_kegiatan' => $tgl_kegiatan,
      'bagian' => $bagian,
      'hasil' => $hasil
    );
    if($data == null) {
      $this->session->set_flashdata('edt',
        '<div class="alert alert-danger">
          <h4>Oppss</h4>
            <p>Tidak ada data dinput.</p>
        </div>');
      $this->laporan_kegiatan_internal();
    }else{
      $this->session->set_flashdata('edt',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <p>Data <strong>Laporan Kegiatan </strong> Berhasil Diubah </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>');
      $this->pegawai_model->editLaporan('laporan_kegiatan', $data, $id_kegiatan);
      $this->laporan_kegiatan_internal();
    };
  }
  //Fungsi Untuk Menghapus Laporan
  public function hapusLaporan(){
    $id_kegiatan =$this->input->post('id_kegiatan');
    if($id_kegiatan == null) {
      $this->session->set_flashdata('hps',
        '<div class="alert alert-danger">
          <h4>Oppss</h4>
            <p>Tidak ada data dinput.</p>
        </div>');
      $this->laporan_kegiatan_internal();
    }else{
      $this->session->set_flashdata('hps',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <p>Data <strong>Laporan Kegiatan </strong> Berhasil Diubah </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>');
      $this->pegawai_model->hapusLaporan($id_kegiatan);
      $this->laporan_kegiatan_internal();
    };
  }
}
