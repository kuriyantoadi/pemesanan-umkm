<?php

class M_user extends CI_Model{

  //tampil buku
  function user_login($username, $password){
    $login = $this->db->query("SELECT * from tb_user where username='$username' AND password=md5('$password') ");
    return $login;
  }

}

 ?>
