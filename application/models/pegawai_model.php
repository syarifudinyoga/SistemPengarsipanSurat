<?php
class Pegawai_model extends CI_Model{

//============================================================================================Agenda
  //Create Agenda
  public function tambahAgenda($table,$data){
    $this->db->insert($table, $data);
  }
  //Read Agenda
  public function tampilAgenda(){
    $this->db->select('*');
    $this->db->from('agenda');
    $result = $this->db->get();
    return $result->result();
  }
  //Delete Agenda
  public function hapusAgenda($where){
    $this->db->where('id_agenda', $where);
    $this->db->delete('agenda');
  }
  //Edit Agenda
  public function editAgenda($table, $data, $where){
    $this->db->where('id_agenda', $where);
    $this->db->update($table,$data);
  }
  //Get Bagian
  public function urutIdAgenda($where){
    $this->db->from('agenda');
    $this->db->where('id_agenda', $where);
    $result = $this->db->get();
    return $result->result();
  }
  //Get Data u/ Dropdown
  public function getBagianAgenda(){
    $query = $this->db->query('SELECT * FROM pegawai');
    return $query->result();
  }
  //Print Laporan Agenda Kegiatan
  public function printAK(){
    $this->db->select('*');
    $this->db->from('agenda');
    $this->db->where('tanggal_pelaksanaan >=',$this->input->post('tgl_awal'));
    $this->db->where('tanggal_pelaksanaan <=',$this->input->post('tgl_akhir'));
    $result=$this->db->get();
    return $result->result();
  }
//===========================================================================================Disposisi
  //Read Disposisi
  public function tampilDisposisi(){
    $this->db->select('*');
    $this->db->from('disposisism');
    $result= $this->db->get();
    return $result->result();
  }
  //Read Permintaan Disposisi
  public function tampilPermintaanDisposisi(){
    $this->db->select('*');
    $this->db->from('permintaan_disposisi');
    $result= $this->db->get();
    return $result->result();
  }
  //Create Disposisi
  public function tambahDisposisi($table,$data){
    $this->db->insert($table, $data);
  }
  //Edit Disposisi
  public function editDisposisi($table, $data, $where){
    $this->db->where('id_disposisi', $where);
    $this->db->update($table,$data);
  }
  //Get Id Disposisi
  public function getIdDisposisi($where){
    $this->db->from('disposisism');
    $this->db->where('id_disposisi', $where);
    $result = $this->db->get();
    return $result->result();
  }
  //Get Id Permintaan Disposisi
  public function getIdPermintaanDisposisi($where){
    $this->db->from('permintaan_disposisi');
    $this->db->where('id_disposisi', $where);
    $result = $this->db->get();
    return $result->result();
  }
  //Get Data u/ Dropdown
  public function getIDSm(){
    $query = $this->db->query('SELECT * FROM surat_masuk');
    return $query->result();
  }
  //Get Data u/ Dropdown
  public function getBagian(){
    $query = $this->db->query('SELECT * FROM pegawai');
    return $query->result();
  }
  //Delete Disposisi
  public function hapusDisposisi($where){
    $this->db->where('id_disposisi', $where);
    $this->db->delete('permintaan_disposisi');
  }
//===========================================================================================Agenda
  //Tampil Agenda Hari Ini
  public function tampilAgendaHariIni(){
    $camat = "camat";
    $tgl = date("Y-m-d");
    $this->db->select('*');
    $this->db->from('agenda');
    $this->db->where('tanggal_pelaksanaan=', $tgl);
    $this->db->where('bagian=', $camat);
    $result = $this->db->get();
    return $result->result();
  }
  //Tampil Agenda Hari Ini
  public function tampilAgendaKeseluruhan(){
    $camat = "camat";
    $this->db->select('*');
    $this->db->from('agenda');
    $this->db->where('bagian=', $camat);
    $result = $this->db->get();
    return $result->result();
  }
//===========================================================================================Laporan
  //Read Laporan
  public function tampilLaporan(){
    $this->db->select('*');
    $this->db->from('laporan_kegiatan');
    $result= $this->db->get();
    return $result->result();
  }
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
//===========================================================================================Agenda
  //Tampil Agenda Hari Ini
  public function tampilAgendaHariIniInternal(){
    $camat = "camat";
    $tgl = date("Y-m-d");;
    $this->db->select('*');
    $this->db->from('agenda');
    $this->db->where('tanggal_pelaksanaan=', $tgl);
    $this->db->where('bagian !=', $camat);
    $result = $this->db->get();
    return $result->result();
  }
  //Tampil Agenda Hari Ini
  public function tampilAgendaKeseluruhanInternal(){
    $camat = "camat";
    $this->db->select('*');
    $this->db->from('agenda');
    $this->db->where('bagian !=', $camat);
    $result = $this->db->get();
    return $result->result();
  }
//===========================================================================================Laporan kegiatan
  //Tampil Laporan Keiatan
  public function tampilLaporanInternal(){
    $this->db->select('*');
    $this->db->from('laporan_kegiatan');
    $result = $this->db->get();
    return $result->result();
  }
  //Tambah Laporan Kegiatan
  public function tambahLaporan($table,$data){
    $this->db->insert($table, $data);
  }
  //get bagian
  public function urutIdLK($where){
    $this->db->from('laporan_kegiatan');
    $this->db->where('id_kegiatan', $where);
    $result = $this->db->get();
    return $result->result();
  }
  //Edit Laporan
  public function editLaporan($table, $data, $where){
    $this->db->where('id_kegiatan', $where);
    $this->db->update($table,$data);
  }
  //Delete Laporan
  public function hapusLaporan($where){
    $this->db->where('id_kegiatan', $where);
    $this->db->delete('laporan_kegiatan');
  }
//=============================================================================================Notifikasi
  //Hitung jumlah keseluruhan
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
