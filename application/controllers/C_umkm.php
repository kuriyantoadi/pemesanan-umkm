<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_umkm extends CI_Controller {

	public function index()
	{
    $this->load->view('umkm/index');

  }

	public function asli()
	{
		$this->load->view('template/header');
		$this->load->view('template/asli');
		$this->load->view('template/footer');
	}

	public function dashboard()
	{
		$this->load->view('template/header');
		$this->load->view('umkm/dashboard');
		$this->load->view('template/footer');
	}
}
