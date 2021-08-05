<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

  public function __construct()
	{
			parent::__construct();
			$this->load->model('M_user');
      $this->load->model('M_umkm');
	}

//Login User
  public function user()
  {
    $this->load->view('user/index');
  }

  public function user_login()
  {
    $username = htmlspecialchars($this->input->post('username', true), ENT_QUOTES);
    $password = htmlspecialchars($this->input->post('password', true), ENT_QUOTES);

    $cek_login = $this->M_user->user_login($username, $password);

    if ($cek_login->num_rows() > 0) {
      $data = $cek_login->row_array();

      if ($data['status']=='user') {
        $this->session->set_userdata('user', true);
        $this->session->set_userdata('ses_id', $data['id_user']);
        $this->session->set_userdata('ses_username', $data['username']);
        redirect('C_user/dashboard');

      }elseif ($data['status']=='kasubag') {
        $this->session->set_userdata('kasubag', true);
        $this->session->set_userdata('ses_id', $data['id']);
        $this->session->set_userdata('ses_username', $data['username']);

        redirect('C_kasubag');
      }else {
        $url = base_url('C_user');
        echo $this->session->set_flashdata('msg', 'Username atau password salah');
        redirect($url);
      }

    }

    $this->session->set_flashdata('msg', 'Username atau password salah');
    $url = base_url('C_user/index');
    redirect($url);
  }


//Login UMKM
  public function umkm()
  {
    $this->load->view('umkm/index');
  }

  public function umkm_login()
  {
    $username = htmlspecialchars($this->input->post('username', true), ENT_QUOTES);
    $password = htmlspecialchars($this->input->post('password', true), ENT_QUOTES);

    $cek_login = $this->M_umkm->umkm_login($username, $password);

    if ($cek_login->num_rows() > 0) {
      $data = $cek_login->row_array();

      if ($data['status']=='aktif') {
        $this->session->set_userdata('user', true);
        $this->session->set_userdata('ses_id', $data['id_umkm']);
        $this->session->set_userdata('ses_username', $data['username']);
        redirect('C_umkm/dashboard');

      // }elseif ($data['status']=='kasubag') {
      //   $this->session->set_userdata('kasubag', true);
      //   $this->session->set_userdata('ses_id', $data['id']);
      //   $this->session->set_userdata('ses_username', $data['username']);

        // redirect('C_kasubag');
      }else {
        $url = base_url('C_user');
        echo $this->session->set_flashdata('msg', 'Username atau password salah');
        redirect($url);
      }

    }

    $this->session->set_flashdata('msg', 'Username atau password salah');
    $url = base_url('C_user/index');
    redirect($url);
  }



  public function logout()
  {
    $this->session->sess_destroy();
    $url = base_url();
    redirect('C_user/index');
  }
}
