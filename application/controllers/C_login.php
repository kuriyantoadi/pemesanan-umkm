<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

  public function __construct()
	{
			parent::__construct();
			$this->load->model('M_login');
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

    $cek_login = $this->M_login->user_login($username, $password);

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

      if ($data['status_umkm']=='aktif') {
        $this->session->set_userdata('umkm', true);
        $this->session->set_userdata('ses_id', $data['id_umkm']);
        $this->session->set_userdata('ses_username', $data['username']);
        redirect('C_umkm/dashboard');

      }else {
        $url = base_url('C_umkm');
        echo $this->session->set_flashdata('msg', 'Username atau password salah');
        redirect($url);
      }

    }

    $this->session->set_flashdata('msg', 'Username atau password salah');
    $url = base_url('C_umkm/index');
    redirect($url);
  }


// login masyarakat
  public function masyarakat()
  {
    $this->load->view('masyarakat/index');
  }


  public function masyarakat_login()
  {
    $username = htmlspecialchars($this->input->post('username', true), ENT_QUOTES);
    $password = htmlspecialchars($this->input->post('password', true), ENT_QUOTES);

    $cek_login = $this->M_login->masyarakat_login($username, $password);

    if ($cek_login->num_rows() > 0) {
      $data = $cek_login->row_array();

      if ($data['status_masyarakat']=='aktif') {
        $this->session->set_userdata('masyarakat', true);
        $this->session->set_userdata('ses_id', $data['id_masyarakat']);
        $this->session->set_userdata('ses_username', $data['username']);
        redirect('C_masyarakat/dashboard');
        // echo "berhasil login";
      }else {
        // $url = base_url('C_login/masyarakat');
        echo $this->session->set_flashdata('msg', 'Username atau password salah');
        echo 'error1';
        // redirect($url);
      }

    }

    $this->session->set_flashdata('msg', 'Username atau password salah');
    echo 'error2';

    // $url = base_url('C_login/masyarakat');
    // redirect($url);
  }


  public function logout_umkm()
  {
    $this->session->sess_destroy();
    $url = base_url();
    redirect('C_login/umkm');
  }

  public function logout_masyarakat()
  {
    $this->session->sess_destroy();
    $url = base_url();
    redirect('C_login/masyarakat');
  }

  public function logout_user()
  {
    $this->session->sess_destroy();
    $url = base_url();
    redirect('C_login/user');
  }

}
