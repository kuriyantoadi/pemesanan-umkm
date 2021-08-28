<?php

class M_masyarakat extends CI_Model{

  function info($ses_id_masyarakat){
    $this->db->select('*');
    $this->db->from('tb_masyarakat');
    $this->db->join('tb_umkm','tb_umkm.id_umkm = tb_masyarakat.id_umkm');
    $this->db->join('tb_info','tb_info.id_umkm = tb_masyarakat.id_umkm');
    $this->db->where('tb_masyarakat.id_masyarakat',$ses_id_masyarakat);
    $query = $this->db->get()->result();
    return $query;
  }

  public function kode_pengambilan($kode_pengambilan)
  {
    $this->db->where('kode_pesanan', $kode_pengambilan);
    $hasil = $this->db->get('tb_komoditi_umkm')->result();
    return $hasil;
  }

  public function pengambilan_komoditi($tambah_pengambilan)
  {
    $this->db->insert('tb_pengambilan',$tambah_pengambilan);
  }

  function data_pengambilan($id_info)
  {
    $this->db->where('id_info', $id_info);
    $hasil = $this->db->get('tb_pengambilan')->result();
    return $hasil;
  }

  function info_detail($id_info){
    $this->db->where('id_info', $id_info);
    $hasil = $this->db->get('tb_info')->result();
    return $hasil;
  }

  function profil($ses_id_masyarakat){
    $this->db->where('id_masyarakat', $ses_id_masyarakat);
    $hasil = $this->db->get('tb_masyarakat')->result();
    return $hasil;
  }

  function cek_password($id_masyarakat){
    $this->db->where('id_masyarakat', $id_masyarakat);
    $hasil = $this->db->get('tb_masyarakat')->result();
    return $hasil;
  }

  function password_baru($password_baru, $id_masyarakat){
    $this->db->where('id_masyarakat', $id_masyarakat);
    $this->db->update('tb_masyarakat',$password_baru);
  }


}

 ?>
