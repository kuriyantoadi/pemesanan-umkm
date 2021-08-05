<?php

class M_umkm extends CI_Model{

  //tampil buku
  function umkm_login($username, $password){
    $login = $this->db->query("SELECT * from tb_umkm where username='$username' AND password=md5('$password') ");
    return $login;
  }

}

 ?>
