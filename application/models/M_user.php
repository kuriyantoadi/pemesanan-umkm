<?php

class M_user extends CI_Model{

  function komoditi(){
    $tampil = $this->db->get('tb_komoditi_agro')->result();
    return $tampil;
  }

  function komoditi_tambah_up($tambah_komoditi)
  {
    $this->db->insert('tb_komoditi_agro',$tambah_komoditi);
  }

  public function komoditi_hapus($kode_komoditi)
  {
    $this->db->where($kode_komoditi);
    $this->db->delete('tb_komoditi_agro');
  }

  public function komoditi_edit($id_komoditi_agro)
  {
    $this->db->where('id_komoditi_agro', $id_komoditi_agro);
    $hasil = $this->db->get('tb_komoditi_agro')->result();
    return $hasil;
  }

  public function komoditi_edit_up($data_edit, $kode_komoditi)
  {
    $this->db->where('id_komoditi_agro',$kode_komoditi);
    $this->db->update('tb_komoditi_agro',$data_edit);
  }

  public function umkm()
  {
      $tampil = $this->db->get('tb_umkm')->result();
      return $tampil;
  }

  public function data_umkm_tambah_up($tambah_umkm)
  {
    $this->db->insert('tb_umkm',$tambah_umkm);
  }

  public function data_umkm_hapus($kode_umkm)
  {
    $this->db->where('id_umkm',$kode_umkm);
    $this->db->delete('tb_umkm');
  }

  public function data_umkm_edit($id_umkm)
  {
    $this->db->where('id_umkm', $id_umkm);
    $hasil = $this->db->get('tb_umkm')->result();
    return $hasil;
  }

  public function data_umkm_edit_up($data_edit, $id_umkm)
  {
    $this->db->where('id_umkm',$id_umkm);
    $this->db->update('tb_umkm',$data_edit);
  }

  public function data_umkm_detail($id_umkm)
  {
    $this->db->where('id_umkm', $id_umkm);
    $hasil = $this->db->get('tb_umkm')->result();
    return $hasil;
  }

  function profil($ses_id_user){
    $this->db->where('id_user', $ses_id_user);
    $hasil = $this->db->get('tb_user')->result();
    return $hasil;
  }

}

 ?>
