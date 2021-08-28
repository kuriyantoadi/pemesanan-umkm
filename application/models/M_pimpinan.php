<?php

class M_pimpinan extends CI_Model{

  function komoditi(){
    $tampil = $this->db->get('tb_komoditi_agro')->result();
    return $tampil;
  }

  public function umkm()
  {
      $tampil = $this->db->get('tb_umkm')->result();
      return $tampil;
  }

  public function data_umkm_detail($id_umkm)
  {
    $this->db->where('id_umkm', $id_umkm);
    $hasil = $this->db->get('tb_umkm')->result();
    return $hasil;
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

  public function pemesanan()
  {
    $this->db->select('*');
    $this->db->from('tb_kode_pesanan');
    $this->db->join('tb_umkm','tb_umkm.id_umkm = tb_kode_pesanan.id_umkm');
    $query = $this->db->get()->result();
    return $query;
  }

  public function data_pemesanan_detail($kode_pesanan)
  {
    $this->db->where('kode_pesanan', $kode_pesanan);
    $hasil = $this->db->get('tb_pemesanan')->result();
    return $hasil;
  }


    public function pemesanan_komoditi_harga($kode_pesanan)
    {
      $this->db->select_sum('sub_total');
      $this->db->where('kode_pesanan', $kode_pesanan);
      $hasil = $this->db->get('tb_pemesanan')->result(); //
      return $hasil;
    }

    public function data_pemesanan_detail_status($kode_pesanan)
    {
      $this->db->where('kode_pesanan', $kode_pesanan);
      $hasil = $this->db->get('tb_kode_pesanan')->result();
      return $hasil;
    }

    public function data_user()
    {
      $tampil = $this->db->get('tb_user')->result();
      return $tampil;
    }

    function profil($ses_id_user){
      $this->db->where('id_user', $ses_id_user);
      $hasil = $this->db->get('tb_user')->result();
      return $hasil;
    }

    function cek_password($id_pimpinan){
      $this->db->where('id_user', $id_pimpinan);
      $hasil = $this->db->get('tb_user')->result();
      return $hasil;
    }

    function password_baru($password_baru, $id_pimpinan){
      $this->db->where('id_user', $id_pimpinan);
      $this->db->update('tb_user',$password_baru);
    }

}

 ?>
