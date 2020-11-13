<?php
class Kesekretariatan extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
    $this->load->model('kesekretariatan_model');
  }

//=============================================================================================Kelola Pegawai================================================================================//
  //Baca Data Pegawai
  public function data_pegawai(){
    $data['pegawai'] = $this->kesekretariatan_model->tampilPegawai();
    $this->load->view('Kesekretariatan/data_pegawai', $data);
  }
  //Redirect ke form Tambah Pegawai
  public function idxPeg(){
    $this->load->view('Kesekretariatan/form_tambah_pegawai');
  }
  //Fungsi untuk tambah pegawai
  public function tambahPegawai(){
    $bagian = $this->input->post('bagian');
    $nip = $this->input->post('nip');
    $nama = $this->input->post('nama');
    $data = array(
      'bagian' => $bagian,
      'nip' => $nip,
      'nama' => $nama
    );
    if($data == null) {
      $this->session->set_flashdata('msg',
        '<div class="alert alert-danger">
            <h4>Oppss</h4>
            <p>Tidak ada data dinput.</p>
        </div>');
        $this->data_pegawai();
    }else{
      $this->session->set_flashdata('msg',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <p>Data <strong>Pegawai </strong> Berhasil Ditambahkan </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        $this->kesekretariatan_model->tambahPegawai('pegawai', $data);
        $this->data_Pegawai();
    };
  }
  //Fungsi untuk Edit Pegawai
  public function editPegawai(){
    $bagian = $this->input->post('bagian');
    $nip = $this->input->post('nip');
    $nama = $this->input->post('nama');
    $data = array(
      'bagian' => $bagian,
      'nip' => $nip,
      'nama' => $nama
    );
    if($data == null) {
      $this->session->set_flashdata('edt',
        '<div class="alert alert-danger">
          <h4>Oppss</h4>
            <p>Tidak ada data dinput.</p>
        </div>');
      $this->data_pegawai();
    }else{
      $this->session->set_flashdata('edt',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <p>Data <strong>Pegawai </strong> Berhasil Diubah </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        $this->kesekretariatan_model->editPegawai('pegawai', $data, $bagian);
        $this->data_pegawai();
    };
  }
  //Redirect Ke halaman form edit pegawai (data yang diambil sesuai bagian yang dipilih)
  public function formEditPegawai(){
    $bagian = $this->input->post('bagian');
    $data['pegawai'] = $this->kesekretariatan_model->urutPegawai($bagian);
    $this->load->view('Kesekretariatan/form_edit_pegawai', $data);
  }
  //Fungsi Untuk Menghapus Pegawai
  public function hapusPegawai(){
    $bagian =$this->input->post('bagian');
    if($bagian == null) {
      $this->session->set_flashdata('hps',
        '<div class="alert alert-danger">
          <h4>Oppss</h4>
            <p>Tidak ada data dinput.</p>
        </div>');
      $this->data_pegawai();
    }else{
      $this->session->set_flashdata('hps',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>Data <strong>Pegawai </strong> Berhasil Dihapus </p>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>');
        $this->kesekretariatan_model->hapusPegawai($bagian);
        $this->data_pegawai();
    };
  }
//=====================================================================================================Kelola User=========================================================================
  //Baca Data User
  public function data_user(){
    $data['user'] = $this->kesekretariatan_model->tampilUser();
    $this->load->view('Kesekretariatan/data_user', $data);
  }
  //Redirect ke form Tambah Pegawai
  public function idxUsr(){
    $this->load->view('Kesekretariatan/form_tambah_user');
  }
  //Fungsi untuk tambah pegawai
  public function tambahUser(){
    $id = $this->input->post('id');
    $nama = $this->input->post('nama');
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $level = $this->input->post('level');
    $data = array(
      'id' => $id,
      'nama' => $nama,
      'email' => $email,
      'password' => $password,
      'level' => $level
    );
    if($data == null) {
      $this->session->set_flashdata('msg',
        '<div class="alert alert-danger">
          <h4>Oppss</h4>
            <p>Tidak ada data dinput.</p>
        </div>');
      $this->data_user();
    }else{
      $this->session->set_flashdata('msg',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <p>Data <strong>User </strong> Berhasil Ditambah </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        $this->kesekretariatan_model->tambahUser('login', $data);
        $this->data_user();
    };
  }
  //Fungsi untuk Edit Pegawai
  public function editUser(){
    $id = $this->input->post('id');
    $nama = $this->input->post('nama');
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $level = $this->input->post('level');
    $data = array(
      'id' => $id,
      'nama' => $nama,
      'email' => $email,
      'password' => $password,
      'level' => $level
    );
    if($data == null){
      $this->session->set_flashdata('edt',
        '<div class="alert alert-danger">
        <h4>Oppss</h4>
          <p>Tidak ada data dinput.</p>
        </div>');
      $this->data_user();
    }else{
      $this->session->set_flashdata('edt',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <p>Data <strong>User </strong> Berhasil Diubah </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>');
      $this->kesekretariatan_model->editUser('login', $data, $id);
      $this->data_user();
    };
  }
  //Redirect Ke halaman form edit pegawai (data yang diambil sesuai bagian yang dipilih)
  public function formEditUser(){
    $id = $this->input->post('id');
    $data['user'] = $this->kesekretariatan_model->urutUser($id);
    $this->load->view('Kesekretariatan/form_edit_user', $data);
  }
  //Fungsi Untuk Menghapus Pegawai
  public function hapusUser(){
    $id =$this->input->post('id');
    if($id == null) {
      $this->session->set_flashdata('hps',
        '<div class="alert alert-danger">
          <h4>Oppss</h4>
            <p>Tidak ada data dinput.</p>
        </div>');
      $this->data_user();
    }else{
      $this->session->set_flashdata('hps',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <p>Data <strong>User </strong> Berhasil Dihapus </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>');
      $this->kesekretariatan_model->hapusUser($id);
      $this->data_user();
    };
  }
}
