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



}

 ?>
