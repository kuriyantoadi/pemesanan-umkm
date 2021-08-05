<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Controller {

	public function index()
	{
		$this->load->view('template');
	}

	public function asli()
	{
		$this->load->view('template/header');
		// $this->load->view('template/asli');
		$this->load->view('template/footer');
	}
}
