<?php
class Login_model extends CI_Model{
//===================================================================Login
  //Fungsi Validasi Login
  function validate($email,$password){
    $this->db->where('email',$email);
    $this->db->where('password',$password);
    $result = $this->db->get('login',1);
    return $result;
  }
//===================================================================Hitung Jumlah Untuk Dashboard
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
  //Hitung jumlah keseluruhan Surat Masuk
  public function hitungJumlahSM(){
    $this->db->select('*');
    $this->db->from('surat_masuk');
    return $this->db->count_all_results();
  }
  //Hitung jumlah keseluruhan Surat Keluar
  public function hitungJumlahSK(){
    $this->db->select('*');
    $this->db->from('surat_keluar');
    return $this->db->count_all_results();
  }
  //Hitung jumlah keseluruhan Disposisi SM
  public function hitungJumlahDisposisiSM(){
    $this->db->select('*');
    $this->db->from('disposisism');
    return $this->db->count_all_results();
  }
  //Hitung jumlah keseluruhan Agenda
  public function hitungJumlahAgenda(){
    $this->db->select('*');
    $this->db->from('agenda');
    return $this->db->count_all_results();
  }
  //Hitung jumlah keseluruhan Kegiatan Camat Hari Ini
  public function hitungJumlahKegiatanCamatHariIni(){
    $tgl = date("Y-m-d");
    $this->db->select('*');
    $this->db->from('agenda');
    $this->db->where('tanggal_pelaksanaan=', $tgl);
    return $this->db->count_all_results();
  }
  //Hitung jumlah keseluruhan Agenda Camat Keseluruhan
  public function hitungJumlahAgendaCamat(){
    $bag = "Camat";
    $this->db->select('*');
    $this->db->from('agenda');
    $this->db->where('bagian =', $bag);
    return $this->db->count_all_results();
  }
  //Hitung jumlah keseluruhan Laporan
  public function hitungJumlahLaporan(){
    $this->db->select('*');
    $this->db->from('laporan_kegiatan');
    return $this->db->count_all_results();
  }
  //Hitung jumlah keseluruhan Kegiatan Bagian Penerima Hari Ini
  public function hitungJumlahKegiatanBagianHariIni(){
    $tgl = date("Y-m-d");
    $bag = "Camat";
    $this->db->select('*');
    $this->db->from('agenda');
    $this->db->where('tanggal_pelaksanaan=', $tgl);
    $this->db->where('bagian !=', $bag);
    return $this->db->count_all_results();
  }
  //Hitung jumlah keseluruhan Kegiatan Bagian
  public function hitungJumlahAgendaBagian(){
    $bag = "Camat";
    $this->db->select('*');
    $this->db->from('agenda');
    $this->db->where('bagian !=', $bag);
    return $this->db->count_all_results();
  }
  //Read Permintaan Disposisi
  public function tampilPermintaanDisposisi(){
    $this->db->select('*');
    $this->db->from('permintaan_disposisi');
    $result= $this->db->get();
    return $result->result();
  }
  //Read Disposisi
  public function tampilDisposisi(){
    $this->db->select('*');
    $this->db->from('disposisism');
    $result= $this->db->get();
    return $result->result();
  }
//============================================================================Statistik Surat Masuk
  //---------------------------------------------------Statistik Surat Masuk
  function statistikSuratMasuk(){
    $sql= $this->db->query("
    select
    ifnull((SELECT count(id_surat_masuk) FROM (surat_masuk)WHERE((Month(tgl_penerimaan)=1)AND (YEAR(tgl_penerimaan)=2019))),0) AS `Januari`,
    ifnull((SELECT count(id_surat_masuk) FROM (surat_masuk)WHERE((Month(tgl_penerimaan)=2)AND (YEAR(tgl_penerimaan)=2019))),0) AS `Februari`,
    ifnull((SELECT count(id_surat_masuk) FROM (surat_masuk)WHERE((Month(tgl_penerimaan)=3)AND (YEAR(tgl_penerimaan)=2019))),0) AS `Maret`,
    ifnull((SELECT count(id_surat_masuk) FROM (surat_masuk)WHERE((Month(tgl_penerimaan)=4)AND (YEAR(tgl_penerimaan)=2019))),0) AS `April`,
    ifnull((SELECT count(id_surat_masuk) FROM (surat_masuk)WHERE((Month(tgl_penerimaan)=5)AND (YEAR(tgl_penerimaan)=2019))),0) AS `Mei`,
    ifnull((SELECT count(id_surat_masuk) FROM (surat_masuk)WHERE((Month(tgl_penerimaan)=6)AND (YEAR(tgl_penerimaan)=2019))),0) AS `Juni`,
    ifnull((SELECT count(id_surat_masuk) FROM (surat_masuk)WHERE((Month(tgl_penerimaan)=7)AND (YEAR(tgl_penerimaan)=2019))),0) AS `Juli`,
    ifnull((SELECT count(id_surat_masuk) FROM (surat_masuk)WHERE((Month(tgl_penerimaan)=8)AND (YEAR(tgl_penerimaan)=2019))),0) AS `Agustus`,
    ifnull((SELECT count(id_surat_masuk) FROM (surat_masuk)WHERE((Month(tgl_penerimaan)=9)AND (YEAR(tgl_penerimaan)=2019))),0) AS `September`,
    ifnull((SELECT count(id_surat_masuk) FROM (surat_masuk)WHERE((Month(tgl_penerimaan)=10)AND (YEAR(tgl_penerimaan)=2019))),0) AS `Oktober`,
    ifnull((SELECT count(id_surat_masuk) FROM (surat_masuk)WHERE((Month(tgl_penerimaan)=11)AND (YEAR(tgl_penerimaan)=2019))),0) AS `November`,
    ifnull((SELECT count(id_surat_masuk) FROM (surat_masuk)WHERE((Month(tgl_penerimaan)=12)AND (YEAR(tgl_penerimaan)=2019))),0) AS `Desember`
    from surat_masuk GROUP BY YEAR(tgl_penerimaan)
    ");
    return $sql;
  }
 //----------------------------------------------------Statistik Surat Keluar
  function statistikSuratKeluar(){
    $sql= $this->db->query("
    select
    ifnull((SELECT count(id_surat_keluar) FROM (surat_keluar)WHERE((Month(tgl_surat)=1)AND (YEAR(tgl_surat)=2019))),0) AS `Januari`,
    ifnull((SELECT count(id_surat_keluar) FROM (surat_keluar)WHERE((Month(tgl_surat)=2)AND (YEAR(tgl_surat)=2019))),0) AS `Februari`,
    ifnull((SELECT count(id_surat_keluar) FROM (surat_keluar)WHERE((Month(tgl_surat)=3)AND (YEAR(tgl_surat)=2019))),0) AS `Maret`,
    ifnull((SELECT count(id_surat_keluar) FROM (surat_keluar)WHERE((Month(tgl_surat)=4)AND (YEAR(tgl_surat)=2019))),0) AS `April`,
    ifnull((SELECT count(id_surat_keluar) FROM (surat_keluar)WHERE((Month(tgl_surat)=5)AND (YEAR(tgl_surat)=2019))),0) AS `Mei`,
    ifnull((SELECT count(id_surat_keluar) FROM (surat_keluar)WHERE((Month(tgl_surat)=6)AND (YEAR(tgl_surat)=2019))),0) AS `Juni`,
    ifnull((SELECT count(id_surat_keluar) FROM (surat_keluar)WHERE((Month(tgl_surat)=7)AND (YEAR(tgl_surat)=2019))),0) AS `Juli`,
    ifnull((SELECT count(id_surat_keluar) FROM (surat_keluar)WHERE((Month(tgl_surat)=8)AND (YEAR(tgl_surat)=2019))),0) AS `Agustus`,
    ifnull((SELECT count(id_surat_keluar) FROM (surat_keluar)WHERE((Month(tgl_surat)=9)AND (YEAR(tgl_surat)=2019))),0) AS `September`,
    ifnull((SELECT count(id_surat_keluar) FROM (surat_keluar)WHERE((Month(tgl_surat)=10)AND (YEAR(tgl_surat)=2019))),0) AS `Oktober`,
    ifnull((SELECT count(id_surat_keluar) FROM (surat_keluar)WHERE((Month(tgl_surat)=11)AND (YEAR(tgl_surat)=2019))),0) AS `November`,
    ifnull((SELECT count(id_surat_keluar) FROM (surat_keluar)WHERE((Month(tgl_surat)=12)AND (YEAR(tgl_surat)=2019))),0) AS `Desember`
    from surat_keluar GROUP BY YEAR(tgl_surat)
    ");
    return $sql;
  }
 //---------------------------------------------------Statistik Surat Masuk Camat
 function statistikSuratMasukCamat(){
  $sql= $this->db->query("
  select
  ifnull((SELECT count(id_surat_masuk) FROM (surat_masuk)WHERE((Month(tgl_penerimaan)=1)AND (YEAR(tgl_penerimaan)=2019))),0) AS `Januari`,
  ifnull((SELECT count(id_surat_masuk) FROM (surat_masuk)WHERE((Month(tgl_penerimaan)=2)AND (YEAR(tgl_penerimaan)=2019))),0) AS `Februari`,
  ifnull((SELECT count(id_surat_masuk) FROM (surat_masuk)WHERE((Month(tgl_penerimaan)=3)AND (YEAR(tgl_penerimaan)=2019))),0) AS `Maret`,
  ifnull((SELECT count(id_surat_masuk) FROM (surat_masuk)WHERE((Month(tgl_penerimaan)=4)AND (YEAR(tgl_penerimaan)=2019))),0) AS `April`,
  ifnull((SELECT count(id_surat_masuk) FROM (surat_masuk)WHERE((Month(tgl_penerimaan)=5)AND (YEAR(tgl_penerimaan)=2019))),0) AS `Mei`,
  ifnull((SELECT count(id_surat_masuk) FROM (surat_masuk)WHERE((Month(tgl_penerimaan)=6)AND (YEAR(tgl_penerimaan)=2019))),0) AS `Juni`,
  ifnull((SELECT count(id_surat_masuk) FROM (surat_masuk)WHERE((Month(tgl_penerimaan)=7)AND (YEAR(tgl_penerimaan)=2019))),0) AS `Juli`,
  ifnull((SELECT count(id_surat_masuk) FROM (surat_masuk)WHERE((Month(tgl_penerimaan)=8)AND (YEAR(tgl_penerimaan)=2019))),0) AS `Agustus`,
  ifnull((SELECT count(id_surat_masuk) FROM (surat_masuk)WHERE((Month(tgl_penerimaan)=9)AND (YEAR(tgl_penerimaan)=2019))),0) AS `September`,
  ifnull((SELECT count(id_surat_masuk) FROM (surat_masuk)WHERE((Month(tgl_penerimaan)=10)AND (YEAR(tgl_penerimaan)=2019))),0) AS `Oktober`,
  ifnull((SELECT count(id_surat_masuk) FROM (surat_masuk)WHERE((Month(tgl_penerimaan)=11)AND (YEAR(tgl_penerimaan)=2019))),0) AS `November`,
  ifnull((SELECT count(id_surat_masuk) FROM (surat_masuk)WHERE((Month(tgl_penerimaan)=12)AND (YEAR(tgl_penerimaan)=2019))),0) AS `Desember`
  from surat_masuk where bagian='camat' GROUP BY YEAR(tgl_penerimaan)
  ");
  return $sql;
 }
 //---------------------------------------------------Statistik Agenda Camat
  function statistikAgendaCamat(){
    $sql= $this->db->query("
    select
    ifnull((SELECT count(id_agenda) FROM (agenda)WHERE((Month(tanggal_pelaksanaan)=1)AND (YEAR(tanggal_pelaksanaan)=2019))),0) AS `Januari`,
    ifnull((SELECT count(id_agenda) FROM (agenda)WHERE((Month(tanggal_pelaksanaan)=2)AND (YEAR(tanggal_pelaksanaan)=2019))),0) AS `Februari`,
    ifnull((SELECT count(id_agenda) FROM (agenda)WHERE((Month(tanggal_pelaksanaan)=3)AND (YEAR(tanggal_pelaksanaan)=2019))),0) AS `Maret`,
    ifnull((SELECT count(id_agenda) FROM (agenda)WHERE((Month(tanggal_pelaksanaan)=4)AND (YEAR(tanggal_pelaksanaan)=2019))),0) AS `April`,
    ifnull((SELECT count(id_agenda) FROM (agenda)WHERE((Month(tanggal_pelaksanaan)=5)AND (YEAR(tanggal_pelaksanaan)=2019))),0) AS `Mei`,
    ifnull((SELECT count(id_agenda) FROM (agenda)WHERE((Month(tanggal_pelaksanaan)=6)AND (YEAR(tanggal_pelaksanaan)=2019))),0) AS `Juni`,
    ifnull((SELECT count(id_agenda) FROM (agenda)WHERE((Month(tanggal_pelaksanaan)=7)AND (YEAR(tanggal_pelaksanaan)=2019))),0) AS `Juli`,
    ifnull((SELECT count(id_agenda) FROM (agenda)WHERE((Month(tanggal_pelaksanaan)=8)AND (YEAR(tanggal_pelaksanaan)=2019))),0) AS `Agustus`,
    ifnull((SELECT count(id_agenda) FROM (agenda)WHERE((Month(tanggal_pelaksanaan)=9)AND (YEAR(tanggal_pelaksanaan)=2019))),0) AS `September`,
    ifnull((SELECT count(id_agenda) FROM (agenda)WHERE((Month(tanggal_pelaksanaan)=10)AND (YEAR(tanggal_pelaksanaan)=2019))),0) AS `Oktober`,
    ifnull((SELECT count(id_agenda) FROM (agenda)WHERE((Month(tanggal_pelaksanaan)=11)AND (YEAR(tanggal_pelaksanaan)=2019))),0) AS `November`,
    ifnull((SELECT count(id_agenda) FROM (agenda)WHERE((Month(tanggal_pelaksanaan)=12)AND (YEAR(tanggal_pelaksanaan)=2019))),0) AS `Desember`
    from agenda where bagian='camat' GROUP BY YEAR(tanggal_pelaksanaan)
    ");
    return $sql;
  }
 //----------------------------------------------------Statistik Bagian
  function statistikAgendaBagian(){
    $query = $this->db->query("SELECT bagian AS bag FROM agenda GROUP BY bagian");

    if($query->num_rows() > 0){
        foreach($query->result() as $data){
            $hasil[] = $data;
        }
        return $hasil;
    }
  }
  //---------------------------------------------------Statistik Agenda Camat
  function statistikAgendaPenerimaSurat(){
    $sql= $this->db->query("
    select
    ifnull((SELECT count(id_agenda) FROM (agenda)WHERE((Month(tanggal_pelaksanaan)=1)AND (YEAR(tanggal_pelaksanaan)=2019))),0) AS `Januari`,
    ifnull((SELECT count(id_agenda) FROM (agenda)WHERE((Month(tanggal_pelaksanaan)=2)AND (YEAR(tanggal_pelaksanaan)=2019))),0) AS `Februari`,
    ifnull((SELECT count(id_agenda) FROM (agenda)WHERE((Month(tanggal_pelaksanaan)=3)AND (YEAR(tanggal_pelaksanaan)=2019))),0) AS `Maret`,
    ifnull((SELECT count(id_agenda) FROM (agenda)WHERE((Month(tanggal_pelaksanaan)=4)AND (YEAR(tanggal_pelaksanaan)=2019))),0) AS `April`,
    ifnull((SELECT count(id_agenda) FROM (agenda)WHERE((Month(tanggal_pelaksanaan)=5)AND (YEAR(tanggal_pelaksanaan)=2019))),0) AS `Mei`,
    ifnull((SELECT count(id_agenda) FROM (agenda)WHERE((Month(tanggal_pelaksanaan)=6)AND (YEAR(tanggal_pelaksanaan)=2019))),0) AS `Juni`,
    ifnull((SELECT count(id_agenda) FROM (agenda)WHERE((Month(tanggal_pelaksanaan)=7)AND (YEAR(tanggal_pelaksanaan)=2019))),0) AS `Juli`,
    ifnull((SELECT count(id_agenda) FROM (agenda)WHERE((Month(tanggal_pelaksanaan)=8)AND (YEAR(tanggal_pelaksanaan)=2019))),0) AS `Agustus`,
    ifnull((SELECT count(id_agenda) FROM (agenda)WHERE((Month(tanggal_pelaksanaan)=9)AND (YEAR(tanggal_pelaksanaan)=2019))),0) AS `September`,
    ifnull((SELECT count(id_agenda) FROM (agenda)WHERE((Month(tanggal_pelaksanaan)=10)AND (YEAR(tanggal_pelaksanaan)=2019))),0) AS `Oktober`,
    ifnull((SELECT count(id_agenda) FROM (agenda)WHERE((Month(tanggal_pelaksanaan)=11)AND (YEAR(tanggal_pelaksanaan)=2019))),0) AS `November`,
    ifnull((SELECT count(id_agenda) FROM (agenda)WHERE((Month(tanggal_pelaksanaan)=12)AND (YEAR(tanggal_pelaksanaan)=2019))),0) AS `Desember`
    from agenda where bagian!='camat' GROUP BY YEAR(tanggal_pelaksanaan)
    ");
    return $sql;
  }
 //Hitung jumlah keseluruhan Agenda KPPD
  public function c1(){
    $bag = "Kasi Pelayanan dan Pendapatan Daerah";
    $this->db->select('*');
    $this->db->from('agenda');
    $this->db->where('bagian =', $bag);
    return $this->db->count_all_results();
  }
 //Hitung jumlah keseluruhan Agenda Kasi Pemberdayaan Masyarakat dan Desa
  public function c2(){
    $bag = "Kasi Pemberdayaan Masyarakat dan Desa";
    $this->db->select('*');
    $this->db->from('agenda');
    $this->db->where('bagian =', $bag);
    return $this->db->count_all_results();
  }
//Hitung jumlah keseluruhan Agenda Kasi Pemeliharaan Sarana Dan Prasarana Umum
  public function c3(){
    $bag = "Kasi Pemeliharaan Sarana Dan Prasarana Umum";
    $this->db->select('*');
    $this->db->from('agenda');
    $this->db->where('bagian =', $bag);
    return $this->db->count_all_results();
  }
//Hitung jumlah keseluruhan Agenda Kasi Pemerintahan
  public function c4(){
    $bag = "Kasi Pemerintahan";
    $this->db->select('*');
    $this->db->from('agenda');
    $this->db->where('bagian =', $bag);
    return $this->db->count_all_results();
  }
//Hitung jumlah keseluruhan Agenda Kasubag Kepegawaian Dan Umum
  public function c5(){
    $bag = "Kasubag Kepegawaian Dan Umum";
    $this->db->select('*');
    $this->db->from('agenda');
    $this->db->where('bagian =', $bag);
    return $this->db->count_all_results();
  }
//Hitung jumlah keseluruhan Agenda Kasubag Penyusunan Program dan Keuangan
  public function c6(){
    $bag = "Kasubag Penyusunan Program dan Keuangan";
    $this->db->select('*');
    $this->db->from('agenda');
    $this->db->where('bagian =', $bag);
    return $this->db->count_all_results();
  }
//Hitung jumlah keseluruhan Agenda Sekertaris Camat
  public function c7(){
    $bag = "Sekertaris Camat";
    $this->db->select('*');
    $this->db->from('agenda');
    $this->db->where('bagian =', $bag);
    return $this->db->count_all_results();
  }
}
