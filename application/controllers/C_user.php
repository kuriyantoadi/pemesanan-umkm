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
    $this->load->view('C_login/user');
  }

  public function dashboard()
  {
    $this->load->view('template/header-user');
    $this->load->view('user/dashboard');
    $this->load->view('template/footer');
  }


//komoditi awal
  public function komoditi()
  {
    $data['tampil'] = $this->M_user->komoditi();

    $this->load->view('template/header-user');
    $this->load->view('user/komoditi', $data);
    $this->load->view('template/footer');
  }

  public function komoditi_tambah()
  {
    $this->load->view('template/header-user');
    $this->load->view('user/komoditi_tambah');
    $this->load->view('template/footer');
  }

  public function komoditi_tambah_up()
  {
    $nama_komoditi = $this->input->post('nama_komoditi');
    $volume = $this->input->post('volume');
    $harga_satuan = $this->input->post('harga_satuan');
    $satuan_kg = $this->input->post('satuan_kg');

    $tambah_komoditi = array(
      'nama_komoditi' => $nama_komoditi,
      'volume' => $volume,
      'harga_satuan' => $harga_satuan,
      'satuan_kg' => $satuan_kg
    );

      $this->M_user->komoditi_tambah_up($tambah_komoditi);
      $this->session->set_flashdata('msg', '
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Berhasil</strong>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
      redirect ('C_user/komoditi');
    }

    public function komoditi_hapus($id_komoditi_agro)
    {
      $kode_komoditi = array('id_komoditi_agro' => $id_komoditi_agro);

      $success = $this->M_user->komoditi_hapus($kode_komoditi);
      $this->session->set_flashdata('msg', '
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Hapus Data Berhasil</strong>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
      redirect ('C_user/komoditi');
    }


    public function komoditi_edit($id_komoditi_agro)
    {
      $data['tampil'] = $this->M_user->komoditi_edit($id_komoditi_agro);

      $this->load->view('template/header-user');
      $this->load->view('user/komoditi_edit', $data);
      $this->load->view('template/footer');
    }

    public function komoditi_edit_up()
    {
      $id_komoditi_agro = $this->input->post('id_komoditi_agro');
      $nama_komoditi = $this->input->post('nama_komoditi');
      $volume = $this->input->post('volume');
      $harga_satuan = $this->input->post('harga_satuan');
      $satuan_kg = $this->input->post('satuan_kg');

      $data_edit = array(
        'nama_komoditi' => $nama_komoditi,
        'volume' => $volume,
        'harga_satuan' => $harga_satuan,
        'satuan_kg' => $satuan_kg
      );

      $this->M_user->komoditi_edit_up($data_edit, $id_komoditi_agro);

      $this->session->set_flashdata('msg', '
              <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Edit data berhasil</strong>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
      redirect ('C_user/komoditi');

    }

  //komoditi akhir


  // Data UMKM awal

  public function data_umkm()
  {
    $data['tampil'] = $this->M_user->umkm();

    $this->load->view('template/header-user');
    $this->load->view('user/data_umkm', $data);
    $this->load->view('template/footer');
  }

  public function data_umkm_tambah()
  {
    $this->load->view('template/header-user');
    $this->load->view('user/data_umkm_tambah');
    $this->load->view('template/footer');
  }

  public function data_umkm_tambah_up()
  {
    $nama_umkm = $this->input->post('nama_umkm');
    $kec_umkm = $this->input->post('kec_umkm');
    $alamat_umkm = $this->input->post('alamat_umkm');
    $status_umkm = $this->input->post('status_umkm');

    $tambah_umkm = array(
      'nama_umkm' => $nama_umkm,
      'kec_umkm' => $kec_umkm,
      'alamat_umkm' => $alamat_umkm,
      'status_umkm' => $status_umkm
    );

      $this->M_user->data_umkm_tambah_up($tambah_umkm);
      $this->session->set_flashdata('msg', '
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tambah Data Berhasil</strong>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
      redirect ('C_user/data_umkm');
    }

    public function data_umkm_hapus($id_umkm)
    {
      // $kode_umkm = array('id_komoditi_agro' => $id_umkm);

      $this->M_user->data_umkm_hapus($id_umkm);
      $this->session->set_flashdata('msg', '
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Hapus Data Berhasil</strong>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
      redirect ('C_user/data_umkm');
    }

    public function data_umkm_edit($id_umkm)
    {
      $data['tampil'] = $this->M_user->data_umkm_edit($id_umkm);

      $this->load->view('template/header-user');
      $this->load->view('user/data_umkm_edit', $data);
      $this->load->view('template/footer');
    }

    public function data_umkm_edit_up()
    {
      $id_umkm = $this->input->post('id_umkm');
      $nama_umkm = $this->input->post('nama_umkm');
      $kec_umkm = $this->input->post('kec_umkm');
      $alamat_umkm = $this->input->post('alamat_umkm');
      $status_umkm = $this->input->post('status_umkm');

      $data_edit = array(
        'nama_umkm' => $nama_umkm,
        'kec_umkm' => $kec_umkm,
        'alamat_umkm' => $alamat_umkm,
        'status_umkm' => $status_umkm
      );


      $this->M_user->data_umkm_edit_up($data_edit, $id_umkm);

      $this->session->set_flashdata('msg', '
              <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Edit data berhasil</strong>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
      redirect ('C_user/data_umkm');
    }

    public function data_umkm_detail($id_umkm)
    {
      $data['tampil'] = $this->M_user->data_umkm_detail($id_umkm);

      $this->load->view('template/header-user');
      $this->load->view('user/data_umkm_detail', $data);
      $this->load->view('template/footer');
    }

  // Data UMKM Akhir


}
