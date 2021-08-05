<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_user extends CI_Controller {

  public function __construct()
	{
			parent::__construct();
			$this->load->model('M_user');

			// session login
			if ($this->session->userdata('user') != true) {
				$url = base_url('C_login/user');
				redirect($url);
			}
	}


	public function index()
	{
    // $this->load->view('user/index');

  }


  public function dashboard()
  {
    // $this->load->view('user/dashboard');
  }

}
