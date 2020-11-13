<?php
class Login extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('login_model');

  }
//Load View Login
  function index(){
    $this->load->view('login_view');
  }
//Fungsi Autentikasi
  function auth(){
    $email    = $this->input->post('email',TRUE);
    $password = $this->input->post('password',TRUE);
    $validate = $this->login_model->validate($email,$password);
    if($validate->num_rows() > 0){
        $data  = $validate->row_array();
        $nama  = $data['nama'];
        $email = $data['email'];
        $level = $data['level'];
        $sesdata = array(
            'username'  => $nama,
            'email'     => $email,
            'level'     => $level,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($sesdata);
        //Akses Login Kesekertariatan
        if($level === '1'){
            redirect('login/kesekretariatan');
        //Akses Login Camat
        }elseif($level === '2'){
            redirect('login/camat');
        //Akses Login Bagian Penerima
        }else{
            redirect('login/bagian');
        }
    }else{
        echo $this->session->set_flashdata('msg','Email Atau Password Tidak Sesuai');
        redirect('login');
    }
  }
//Mengalihkan ke hak akses Kesekretariatan
  function kesekretariatan(){
      if($this->session->userdata('level')==='1'){
        foreach($this->login_model->statistikSuratMasuk()->result_array() as $row)
        {
        $data['sm'][]=(float)$row['Januari'];
        $data['sm'][]=(float)$row['Februari'];
        $data['sm'][]=(float)$row['Maret'];
        $data['sm'][]=(float)$row['April'];
        $data['sm'][]=(float)$row['Mei'];
        $data['sm'][]=(float)$row['Juni'];
        $data['sm'][]=(float)$row['Juli'];
        $data['sm'][]=(float)$row['Agustus'];
        $data['sm'][]=(float)$row['September'];
        $data['sm'][]=(float)$row['Oktober'];
        $data['sm'][]=(float)$row['November'];
        $data['sm'][]=(float)$row['Desember'];
       }
       foreach($this->login_model->statistikSuratKeluar()->result_array() as $row)
        {
        $data['sk'][]=(float)$row['Januari'];
        $data['sk'][]=(float)$row['Februari'];
        $data['sk'][]=(float)$row['Maret'];
        $data['sk'][]=(float)$row['April'];
        $data['sk'][]=(float)$row['Mei'];
        $data['sk'][]=(float)$row['Juni'];
        $data['sk'][]=(float)$row['Juli'];
        $data['sk'][]=(float)$row['Agustus'];
        $data['sk'][]=(float)$row['September'];
        $data['sk'][]=(float)$row['Oktober'];
        $data['sk'][]=(float)$row['November'];
        $data['sk'][]=(float)$row['Desember'];
       }
          $this->load->view('kesekretariatan/dashboard_kesekretariatan', $data);
      }else{
          echo "Access Denied";
      }
  }
//Mengalihkan ke hak akses Camat
  function camat(){
    if($this->session->userdata('level')==='2'){
      foreach($this->login_model->statistikSuratMasukCamat()->result_array() as $row)
        {
        $data['sm'][]=(float)$row['Januari'];
        $data['sm'][]=(float)$row['Februari'];
        $data['sm'][]=(float)$row['Maret'];
        $data['sm'][]=(float)$row['April'];
        $data['sm'][]=(float)$row['Mei'];
        $data['sm'][]=(float)$row['Juni'];
        $data['sm'][]=(float)$row['Juli'];
        $data['sm'][]=(float)$row['Agustus'];
        $data['sm'][]=(float)$row['September'];
        $data['sm'][]=(float)$row['Oktober'];
        $data['sm'][]=(float)$row['November'];
        $data['sm'][]=(float)$row['Desember'];
       }
       foreach($this->login_model->statistikAgendaCamat()->result_array() as $row)
        {
        $data['a'][]=(float)$row['Januari'];
        $data['a'][]=(float)$row['Februari'];
        $data['a'][]=(float)$row['Maret'];
        $data['a'][]=(float)$row['April'];
        $data['a'][]=(float)$row['Mei'];
        $data['a'][]=(float)$row['Juni'];
        $data['a'][]=(float)$row['Juli'];
        $data['a'][]=(float)$row['Agustus'];
        $data['a'][]=(float)$row['September'];
        $data['a'][]=(float)$row['Oktober'];
        $data['a'][]=(float)$row['November'];
        $data['a'][]=(float)$row['Desember'];
       }
      $data['disposisi'] = $this->login_model->tampilDisposisi();
      $data['dsp'] = $this->login_model->tampilPermintaanDisposisi();
      $this->load->view('Camat/dashboard_camat', $data);
    }else{
        echo "Access Denied";
    }
  }
//Mengalihkan ke hak akses Bagian Penerima
  function bagian(){
    if($this->session->userdata('level')==='3'){
      foreach($this->login_model->statistikAgendaPenerimaSurat()->result_array() as $row)
        {
        $data['bag'][]=(float)$row['Januari'];
        $data['bag'][]=(float)$row['Februari'];
        $data['bag'][]=(float)$row['Maret'];
        $data['bag'][]=(float)$row['April'];
        $data['bag'][]=(float)$row['Mei'];
        $data['bag'][]=(float)$row['Juni'];
        $data['bag'][]=(float)$row['Juli'];
        $data['bag'][]=(float)$row['Agustus'];
        $data['bag'][]=(float)$row['September'];
        $data['bag'][]=(float)$row['Oktober'];
        $data['bag'][]=(float)$row['November'];
        $data['bag'][]=(float)$row['Desember'];
       }
      $data['stat'] = $this->login_model->statistikAgendaBagian();
      $this->load->view('PenerimaSurat/dashboard_penerima_surat',$data);
    }else{
        echo "Access Denied";
    }
  }
//Fungsi Logout
  function logout(){
      $this->session->sess_destroy();
      redirect('login');
  }
}
