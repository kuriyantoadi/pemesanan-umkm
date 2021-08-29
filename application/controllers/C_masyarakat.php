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

  public function info_detail($id_info, $kode_pengambilan)
  {
    $id_masyarakat = $this->session->userdata('ses_id');
    $data['ses_id'] = $this->session->userdata('ses_id');
    $data['tampil'] = $this->M_masyarakat->info_detail($id_info);
    $data['kode_pengambilan'] = $this->M_masyarakat->kode_pengambilan($kode_pengambilan);
    $data['data_pengambilan'] = $this->M_masyarakat->data_pengambilan($id_masyarakat);

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

  public function password()
  {
    $ses_id_masyarakat = $this->session->userdata('ses_id');
    $data['tampil'] = $this->M_masyarakat->profil($ses_id_masyarakat);

    $this->load->view('template/header-masyarakat');
    $this->load->view('masyarakat/password', $data);
    $this->load->view('template/footer');
  }

  public function password_up()
  {
    $id_masyarakat = $this->input->post('id_masyarakat');
    $password_lama = $this->input->post('password_lama');
    $password_baru = $this->input->post('password_baru');
    $password_konfirmasi = $this->input->post('password_konfirmasi');

    $cek_pass = $this->M_masyarakat->cek_password($id_masyarakat);

    //tampil passowrd lama
    foreach ($cek_pass as $row)
    {
      $cek_password = $row->password;
    }

    if ($password_baru != $password_konfirmasi) {
      $this->session->set_flashdata('msg', '
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p>Password konfirmasi anda tidak sesuai</strong>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
      redirect('C_masyarakat/password');
    }


    //cek password lama
    if (md5($password_lama) != $cek_password ) {
      $this->session->set_flashdata('msg', '
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p>Password lama anda tidak sesuai dangan Data</strong>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
      redirect('C_masyarakat/password');
    }else{
      $password_baru = array(
        'password' => md5($password_konfirmasi),
      );

      $this->M_masyarakat->password_baru($password_baru, $id_masyarakat);

      $this->session->set_flashdata('msg', '
              <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <p>Passowrd berhasil diganti</strong>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
      redirect('C_masyarakat/profil');

    }

  }


  public function pengambilan_komoditi()
  {
    $id_masyarakat = $this->input->post('id_masyarakat');
    $id_info = $this->input->post('id_info');
    $kode_pengambilan = $this->input->post('kode_pengambilan');
    $kondisi = $this->input->post('kondisi');
    $tgl_pengambilan = $this->input->post('tgl_pengambilan');
    $ulasan_pengambilan = $this->input->post('ulasan_pengambilan');

    $tambah_pengambilan = array(
      'id_masyarakat' => $id_masyarakat,
      'id_info' => $id_info,
      'kode_pengambilan' => $kode_pengambilan,
      'kondisi' => $kondisi,
      'tgl_pengambilan' => $tgl_pengambilan,
      'ulasan_pengambilan' => $ulasan_pengambilan
    );

    $this->M_masyarakat->pengambilan_komoditi($tambah_pengambilan);
    $this->session->set_flashdata('msg', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Update Data Berhasil</strong>

              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>');
    redirect ('C_masyarakat/info');
  }


}
