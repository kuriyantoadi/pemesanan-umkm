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

  public function pemesanan()
  {
    $this->db->select('*');
    $this->db->from('tb_kode_pesanan');
    $this->db->join('tb_umkm','tb_umkm.id_umkm = tb_kode_pesanan.id_umkm');
    $query = $this->db->get()->result();
    return $query;
  }

  public function data_pemesanan_reset($kode_pesanan, $data_reset)
  {
    $this->db->where('kode_pesanan',$kode_pesanan);
    $this->db->update('tb_kode_pesanan',$data_reset);
  }

  public function data_pemesanan_hapus($kode_pesanan)
  {
    $this->db->where('kode_pesanan',$kode_pesanan);
    $this->db->delete('tb_kode_pesanan');

    $this->db->where('kode_pesanan',$kode_pesanan);
    $this->db->delete('tb_pemesanan');
  }

  public function data_pemesanan_detail($kode_pesanan)
  {
    $this->db->where('kode_pesanan', $kode_pesanan);
    $hasil = $this->db->get('tb_pemesanan')->result();
    return $hasil;
  }

  public function data_pemesanan_detail_status($kode_pesanan)
  {
    $this->db->where('kode_pesanan', $kode_pesanan);
    $hasil = $this->db->get('tb_kode_pesanan')->result();
    return $hasil;
  }

  public function pemesanan_komoditi_harga($kode_pesanan)
  {
    $this->db->select_sum('sub_total');
    $this->db->where('kode_pesanan', $kode_pesanan);
    $this->db->where('kondisi', 'Tersedia');
    $hasil = $this->db->get('tb_pemesanan')->result(); //
    return $hasil;
  }

  public function data_pemesanan_tersedia($id_pemesanan, $data_tersedia)
  {
    $this->db->where('id_pemesanan',$id_pemesanan);
    $this->db->update('tb_pemesanan',$data_tersedia);
  }

  public function data_pemesanan_tidak_tersedia($id_pemesanan, $data_tersedia)
  {
    $this->db->where('id_pemesanan',$id_pemesanan);
    $this->db->update('tb_pemesanan',$data_tersedia);
  }

  public function data_pemesanan_tolak($kode_pesanan, $data_tolak)
  {
    $this->db->where('kode_pesanan',$kode_pesanan);
    $this->db->update('tb_kode_pesanan',$data_tolak);
  }

  public function data_pemesanan_terima($kode_pesanan, $data_tolak)
  {
    $this->db->where('kode_pesanan',$kode_pesanan);
    $this->db->update('tb_kode_pesanan',$data_tolak);
  }

  public function konfirmasi_pesanan()
  {
    $tampil = $this->db->get('tb_kode_pesanan')->result();
    return $tampil;
  }

  public function konfirmasi_pesanan_riwayat($kode_pesanan)
  {
    $this->db->select('*');
    $this->db->from('tb_kode_pesanan');
    $this->db->join('tb_pemesanan','tb_pemesanan.kode_pesanan = tb_kode_pesanan.kode_pesanan');
    $this->db->where('tb_pemesanan.kode_pesanan',$kode_pesanan);
    $query = $this->db->get()->result();
    return $query;
  }

}

 ?>
