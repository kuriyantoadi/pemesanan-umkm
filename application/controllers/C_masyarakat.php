<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_masyarakat extends CI_Controller {

  public function __construct()
	{
			parent::__construct();
			$this->load->model('M_masyarakat');

			// session login
			if ($this->session->userdata('masyarakat') != true) {
				$url = base_url('C_login/masyarakat');
				redirect($url);
			}
	}


	public function index()
	{
    $this->load->view('masyarakat/index');
  }


  public function dashboard()
  {
    $this->load->view('template/header-masyarakat');
    $this->load->view('masyarakat/dashboard');
    $this->load->view('template/footer');
  }

  public function info()
  {
    $ses_id_masyarakat = $this->session->userdata('ses_id');
    $data['tampil'] = $this->M_masyarakat->info($ses_id_masyarakat);

    $this->load->view('template/header-masyarakat');
    $this->load->view('masyarakat/info', $data);
    $this->load->view('template/footer');
  }

  public function info_detail($id_info)
  {
    $data['tampil'] = $this->M_masyarakat->info_detail($id_info);

    $this->load->view('template/header-masyarakat');
    $this->load->view('masyarakat/info_detail', $data);
    $this->load->view('template/footer');
  }

  public function profil()
  {
    $ses_id_masyarakat = $this->session->userdata('ses_id');
    $data['tampil'] = $this->M_masyarakat->profil($ses_id_masyarakat);

    $this->load->view('template/header-masyarakat');
    $this->load->view('masyarakat/profil', $data);
    $this->load->view('template/footer');
  }

}
