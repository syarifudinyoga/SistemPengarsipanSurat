<?php
class Kesekretariatan_model extends CI_Model{
//=====================================================================================Kelola Pegawai
  //Create Pegawai
  public function tambahPegawai($table,$data){
    $this->db->insert($table, $data);
  }
  //Read Pegawai
  public function tampilPegawai(){
    $this->db->select('*');
    $this->db->from('pegawai');
    $result = $this->db->get();
    return $result->result();
  }
  //Delete Pegawai
  public function hapusPegawai($where){
    $this->db->where('bagian', $where);
    $this->db->delete('pegawai');
  }
  //Update Pegawai
  public function editPegawai($table, $data, $where){
    $this->db->where('bagian', $where);
    $this->db->update($table,$data);
  }
  //Get Bagian
  public function urutPegawai($where){
    $this->db->from('pegawai');
    $this->db->where('bagian', $where);
    $result = $this->db->get();
    return $result->result();
  }
//======================================================================================Kelola user
  //Create User
  public function tambahUser($table,$data){
    $this->db->insert($table, $data);
  }
  //Read User
  public function tampilUser(){
    $level = 1;
    $this->db->select('*');
    $this->db->from('login');
    $this->db->where('level !=', $level);
    $result = $this->db->get();
    return $result->result();
  }
  //Delete User
  public function hapusUser($where){
    $this->db->where('id', $where);
    $this->db->delete('login');
  }
  //Update User
  public function editUser($table, $data, $where){
    $this->db->where('id', $where);
    $this->db->update($table,$data);
  }
  //Get Bagian
  public function urutUser($where){
    $this->db->from('login');
    $this->db->where('id', $where);
    $result = $this->db->get();
    return $result->result();
  }
//===============================================================================================Notifikasi
  //Hitung jumlah keseluruhan Disposisi
  public function hitungJumlahDisposisi($q=NULL){   
    $this->db->like('id_disposisi',$q);
    $this->db->like('asal_surat',$q);
    $this->db->like('no_surat',$q);
    $this->db->like('tgl_surat',$q);
    $this->db->like('tgl_terima',$q);
    $this->db->like('id_surat_masuk',$q);
    $this->db->like('sifat_surat',$q);
    $this->db->like('perihal',$q);
    $this->db->from('permintaan_disposisi');
    return $this->db->count_all_results();
  }
}
?>
