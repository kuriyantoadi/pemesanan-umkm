<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_umkm extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('M_umkm');

			// session login
			if ($this->session->userdata('user') != true) {
				$url = base_url('C_login/user');
				redirect($url);
			}
	}


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
		$this->load->view('template/header-umkm');
		$this->load->view('umkm/dashboard');
		$this->load->view('template/footer');
	}

// Masyarakat
	public function masyarakat()
	{
		$data['tampil_masyarakat'] = $this->M_umkm->tampil_masyarakat();

		$this->load->view('template/header-umkm');
		$this->load->view('umkm/masyarakat', $data);
		$this->load->view('template/footer');
	}

	public function masyarakat_tambah()
	{
		$data['tampil_umkm'] = $this->M_umkm->tampil_umkm();

		$this->load->view('template/header-umkm');
		$this->load->view('umkm/masyarakat_tambah', $data);
		$this->load->view('template/footer');
	}

	public function masyarakat_tambah_up()
	{
		$nama_masyarakat = $this->input->post('nama_masyarakat');
		$nik = $this->input->post('nik');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$alamat = $this->input->post('alamat');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$id_umkm = $this->input->post('id_umkm');
		$status_masyarakat = $this->input->post('status_masyarakat');

		$tambah_masyarakat = array(
			'nama_masyarakat' => $nama_masyarakat,
			'nik' => $nik,
			'tgl_lahir' => $tgl_lahir,
			'alamat' => $alamat,
			'username' => $username,
			'password' => md5($password),
			'id_umkm' => $id_umkm,
			'status_masyarakat'=> $status_masyarakat
		);

	 		$this->M_umkm->tambah_masyarakat_up($tambah_masyarakat);
			$this->session->set_flashdata('msg', '
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<strong>Tambah Data Berhasil</strong>

								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>');
			redirect ('C_umkm/masyarakat');
		}


	public function masyarakat_hapus($id_masyarakat)
	{
		$id_masyarakat = array('id_masyarakat' => $id_masyarakat);

		$success = $this->M_umkm->masyarakat_hapus($id_masyarakat);
		$this->session->set_flashdata('msg', '
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>Hapus Data Berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
		redirect ('C_umkm/masyarakat');

	}

	public function masyarakat_edit($id_masyarakat)
	{
		// $kode_masyarakat = array('id_masyarakat' => $id_masyarakat);
		$data['masyarakat_edit'] = $this->M_umkm->masyarakat_edit($id_masyarakat);
		$data['tampil_umkm'] = $this->M_umkm->tampil_umkm($id_masyarakat);

		$this->load->view('template/header-umkm');
		$this->load->view('umkm/masyarakat_edit', $data);
		$this->load->view('template/footer');
	}

	public function masyarakat_edit_up()
	{
		$id_masyarakat = $this->input->post('id_masyarakat');
		$nama_masyarakat = $this->input->post('nama_masyarakat');
		$nik = $this->input->post('nik');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$alamat = $this->input->post('alamat');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$id_umkm = $this->input->post('id_umkm');
		$status_masyarakat = $this->input->post('status_masyarakat');

		$kode_masyarakat = array('id_masyarakat' => $id_masyarakat);

		$data_edit = array(
			'nama_masyarakat' => $nama_masyarakat,
			'nik' => $nik,
			'tgl_lahir' => $tgl_lahir,
			'alamat' => $alamat,
			'username' => $username,
			'password' => md5($password),
			'id_umkm' => $id_umkm,
			'status_masyarakat'=> $status_masyarakat
		);

		$this->M_umkm->masyarakat_edit_up($data_edit, $kode_masyarakat);

		$this->session->set_flashdata('msg', '
						<div class="alert alert-primary alert-dismissible fade show" role="alert">
							<strong>Edit data berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
		redirect ('C_umkm/masyarakat');
	}

	public function masyarakat_detail($id_masyarakat)
	{
		// $kode_masyarakat = array('id_masyarakat' => $id_masyarakat);
		$data['tampil_masyarakat'] = $this->M_umkm->masyarakat_detail($id_masyarakat);

		$this->load->view('template/header-umkm');
		$this->load->view('umkm/masyarakat_detail', $data);
		$this->load->view('template/footer');
	}

//menu info awal

	public function info()
	{
		$ses_id_umkm = $this->session->userdata('ses_id');
		$data['tampil'] = $this->M_umkm->info_masyarakat($ses_id_umkm);

		$this->load->view('template/header-umkm');
		$this->load->view('umkm/info-masyarakat', $data);
		$this->load->view('template/footer');
	}

	public function info_tambah()
	{
		$ses_id_umkm = $this->session->userdata('ses_id');
		$data['tampil_masyarakat'] = $ses_id_umkm;

		$this->load->view('template/header-umkm');
		$this->load->view('umkm/info-masyarakat-tambah', $data);
		$this->load->view('template/footer');
	}

	public function info_tambah_up()
	{
		$id_umkm = $this->input->post('id_umkm');
		$tgl_upload = $this->input->post('tgl_upload');
		$judul_info = $this->input->post('judul_info');
		$isi_info = $this->input->post('isi_info');
		$kondisi = $this->input->post('kondisi');

		$tambah_info = array(
			'id_umkm' => $id_umkm,
			'tgl_upload' => $tgl_upload,
			'judul_info' => $judul_info,
			'isi_info' => $isi_info,
			'kondisi' => $kondisi
		);

			$this->M_umkm->info_masyarakat_tambah_up($tambah_info);
			$this->session->set_flashdata('msg', '
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<strong>Tambah Informasi Berhasil</strong>

								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>');
			redirect ('C_umkm/info');
		}

		public function info_hapus($info_hapus)
		{
			$info_hapus = array('id_info' => $info_hapus);
			$success = $this->M_umkm->info_hapus($info_hapus);

			$this->session->set_flashdata('msg', '
							<div class="alert alert-warning alert-dismissible fade show" role="alert">
								<strong>Hapus Data Berhasil</strong>

								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>');
			redirect ('C_umkm/info');
		}

		public function info_edit($id_info)
		{
			$data['tampil'] = $this->M_umkm->info_edit($id_info);

			$this->load->view('template/header-umkm');
			$this->load->view('umkm/info-masyarakat-edit', $data);
			$this->load->view('template/footer');
		}

//menu info akhir


}
