<?php
class Surat_model extends CI_Model{

//=======================================================================================Kelola Surat
//-------------------------------------------------------Klasifikasi Surat
  //Read Surat Masuk
  public function tampilKlasifikasiSurat(){
    $this->db->select('*');
    $this->db->from('klasifikasi_surat');
    $result = $this->db->get();
    return $result->result();
  }
  //Tambah Klasifikasi Surat
  public function tambahKlasifikasiSurat($table,$data){
    $this->db->insert($table,$data);
  }
  //Urut Klasifikasi Surat
  public function urutKS($where){
    $this->db->from('klasifikasi_surat');
    $this->db->where('kode_surat', $where);
    $result = $this->db->get();
    return $result->result();
  }
  //Edit Klasifikasi Surat
  public function editKlasifikasiSurat($table, $data, $where){
    $this->db->where('kode_surat', $where);
    $this->db->update($table,$data);
  }
  //Hapus Klasifikasi Surat
  public function hapusKlasifikasiSurat($where){
    $this->db->where('kode_surat', $where);
    $this->db->delete('klasifikasi_surat');
  }
//-------------------------------------------------------Surat Masuk
  //Create Surat Masuk
  public function tambahSuratMasuk($table,$data){
    $this->db->insert($table, $data);
  }
  //tambah file surat masuk
  public function insertSm($data){
    return $this->db->insert('surat_masuk',$data);
  }
  //Read Surat Masuk
  public function tampilSuratMasuk(){
    $this->db->select('*');
    $this->db->from('surat_masuk');
    $this->db->join('klasifikasi_surat','klasifikasi_surat.kode_surat=surat_masuk.kode_surat');
    $result = $this->db->get();
    return $result->result();
  }
  //Delete Surat Masuk
  public function hapusSuratMasuk($where){
    $this->db->where('id_surat_masuk', $where);
    $this->db->delete('surat_masuk');
  }
  //Edit Surat Masuk
  public function editSuratMasuk($table, $data, $where){
    $this->db->where('id_surat_masuk', $where);
    $this->db->update($table,$data);
  }
  //Get Data u/ Dropdown
  public function getBagian(){
  	$query = $this->db->query('SELECT * FROM pegawai');
    return $query->result();
  }
  //Get Data u/ Dropdown
  public function getKlas(){
  	$query = $this->db->query('SELECT * FROM klasifikasi_surat');
    return $query->result();
  }
  //Urut ID Surat Masuk Untuk Edit
  public function urutIdSM($where){
    $this->db->from('surat_masuk');
    $this->db->where('id_surat_masuk', $where);
    $result = $this->db->get();
    return $result->result();
  }
  /*
  //Get Bagian
  public function urutFileSm($where){
    $this->db->from('surat_masuk');
    $this->db->where('fileSm', $where);
    $result = $this->db->get();
    return $result->result();
  }
  */
  //------------------------------------------------------Surat Keluar
  //Create Suurat Keluar
  public function tambahSuratKeluar($table,$data){
    $this->db->insert($table, $data);
  }
  //Read Surat Keluar
  public function tampilSuratKeluar(){
    $this->db->select('*');
    $this->db->from('surat_keluar');
    $this->db->join('klasifikasi_surat','klasifikasi_surat.kode_surat=surat_keluar.kode_surat');
    $result = $this->db->get();
    return $result->result();
  }
  //Delete Surat Keluar
  public function hapusSuratKeluar($where){
    $this->db->where('id_surat_keluar', $where);
    $this->db->delete('surat_keluar');
  }
  //Edit Surat Keluar
  public function editSuratKeluar($table, $data, $where){
    $this->db->where('id_surat_keluar', $where);
    $this->db->update($table,$data);
  }
  //Get Data u/ Dropdown
  public function getBagianSK(){
  	$query = $this->db->query('SELECT * FROM pegawai');
    return $query->result();
  }
  //Urut ID Surat Keluar Untuk Edit
  public function urutIdSK($where){
    $this->db->from('surat_keluar');
    $this->db->where('id_surat_keluar', $where);
    $result = $this->db->get();
    return $result->result();
  }
//===========================================================================================Disposisi
  //====================================================================Permohonan Disposisi
  //Read Perm Disposisi
  public function tampilPermintaanDisposisi(){
    $this->db->select('*');
    $this->db->from('permintaan_disposisi');
    $result=$this->db->get();
    return $result->result();
  }
  //Create Disposisi
  public function tambahPermintaanDisposisi($table,$data){
    $this->db->insert($table, $data);
  }
  //Get Id Disposisi Untuk Edit
  public function getIdPermintaanDisposisi($where){
    $this->db->from('permintaan_disposisi');
    $this->db->where('id_disposisi', $where);
    $result = $this->db->get();
    return $result->result();
  }
  //Edit Disposisi
  public function editPermintaanDisposisi($table, $data, $where){
    $this->db->where('id_disposisi', $where);
    $this->db->update($table,$data);   
  }
  //Delete Disposisi
  public function hapusPermintaanDisposisi($where){
    $this->db->where('id_disposisi', $where);
    $this->db->delete('permintaan_disposisi');
  }
  //====================================================================Disposisi
  /*
  //Create Disposisi
  public function tambahDisposisi($table,$data){
    $this->db->insert($table, $data);
  }
  */
  //Read Disposisi
  public function tampilDisposisi(){
    $this->db->select('*');
    $this->db->from('disposisism');
    $result= $this->db->get();
    return $result->result();
  }
  //Delete Disposisi
  public function hapusDisposisi($where){
    $this->db->where('id_disposisi', $where);
    $this->db->delete('disposisism');
  }
  //Edit Disposisi
  public function editDisposisi($table, $data, $where){
    $this->db->where('id_disposisi', $where);
    $this->db->update($table,$data);
  }
  //Get Id Disposisi Untuk Edit
  public function getIdDisposisi($where){
    $this->db->from('disposisism');
    $this->db->where('id_disposisi', $where);
    $result = $this->db->get();
    return $result->result();
  }
  //Get Data u/ Dropdown
  public function getIDSm(){
    $query = $this->db->query('SELECT * FROM surat_masuk');
    return $query->result();
  }
//===========================================================================================Laporan
  //Print Laporan Surat Masuk
  public function printSM(){
    $this->db->select('*');
    $this->db->from('surat_masuk');
    $this->db->where('tgl_penerimaan >=',$this->input->post('tgl_awal'));
    $this->db->where('tgl_penerimaan <=',$this->input->post('tgl_akhir'));
    $result=$this->db->get();
    return $result->result();
  }
  //Print Laporan Surat Keluar
  public function printSK(){
    $this->db->select('*');
    $this->db->from('surat_keluar');
    $this->db->where('tgl_surat >=',$this->input->post('tgl_awal'));
    $this->db->where('tgl_surat <=',$this->input->post('tgl_akhir'));
    $result=$this->db->get();
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
