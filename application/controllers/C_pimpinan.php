<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pimpinan extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
      $this->load->model('M_pimpinan');
      $this->load->model('M_umkm');

      // session login
      if ($this->session->userdata('pimpinan') != true) {
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
    $this->load->view('template/header-pimpinan');
    $this->load->view('pimpinan/dashboard');
    $this->load->view('template/footer');
  }

  public function komoditi()
  {
    $data['tampil'] = $this->M_pimpinan->komoditi();

    $this->load->view('template/header-pimpinan');
    $this->load->view('pimpinan/komoditi', $data);
    $this->load->view('template/footer');
  }

  public function data_umkm()
  {
    $data['tampil'] = $this->M_pimpinan->umkm();

    $this->load->view('template/header-pimpinan');
    $this->load->view('pimpinan/data_umkm', $data);
    $this->load->view('template/footer');
  }

  public function data_umkm_detail($id_umkm)
  {
    $data['tampil'] = $this->M_pimpinan->data_umkm_detail($id_umkm);

    $this->load->view('template/header-pimpinan');
    $this->load->view('pimpinan/data_umkm_detail', $data);
    $this->load->view('template/footer');
  }

  public function data_konfirmasi()
  {
    $data['tampil'] = $this->M_pimpinan->konfirmasi_pesanan();

    $this->load->view('template/header-pimpinan');
    $this->load->view('pimpinan/data_konfirmasi', $data);
    $this->load->view('template/footer');
  }

  public function konfirmasi_pesanan_riwayat($kode_pesanan)
  {
    $data['tampil'] = $this->M_pimpinan->konfirmasi_pesanan_riwayat($kode_pesanan);
    $data['kode_pesanan'] = $kode_pesanan;

    $this->load->view('template/header-pimpinan');
    $this->load->view('pimpinan/data_konfirmasi_riwayat', $data);
    $this->load->view('template/footer');
  }


  public function data_pemesanan()
  {
    $data['tampil'] = $this->M_pimpinan->pemesanan();

    $this->load->view('template/header-pimpinan');
    $this->load->view('pimpinan/data_pemesanan', $data);
    $this->load->view('template/footer');
  }

  public function data_pemesanan_detail($kode_pesanan)
  {
    $data['tampil'] = $this->M_pimpinan->data_pemesanan_detail($kode_pesanan);
    $data['total_sum'] = $this->M_pimpinan->pemesanan_komoditi_harga($kode_pesanan);
    $data['status_kode'] = $this->M_pimpinan->data_pemesanan_detail_status($kode_pesanan);
    $data['kode_pesanan'] = $kode_pesanan;

    $this->load->view('template/header-pimpinan');
    $this->load->view('pimpinan/data_pemesanan_detail', $data);
    $this->load->view('template/footer');
  }


  public function data_user()
  {
    $data['tampil'] = $this->M_pimpinan->data_user();

    $this->load->view('template/header-pimpinan');
    $this->load->view('pimpinan/data_user', $data);
    $this->load->view('template/footer');
  }

  public function profil()
  {
    $ses_id_user = $this->session->userdata('ses_id');
    $data['tampil'] = $this->M_pimpinan->profil($ses_id_user);

    $this->load->view('template/header-pimpinan');
    $this->load->view('pimpinan/profil', $data);
    $this->load->view('template/footer');
  }

  public function password()
  {
    $ses_id_user = $this->session->userdata('ses_id');
    $data['tampil'] = $this->M_pimpinan->profil($ses_id_user);

    $this->load->view('template/header-pimpinan');
    $this->load->view('pimpinan/password', $data);
    $this->load->view('template/footer');
  }

  public function password_up()
  {
    $id_pimpinan = $this->input->post('id_user');
    $password_lama = $this->input->post('password_lama');
    $password_baru = $this->input->post('password_baru');
    $password_konfirmasi = $this->input->post('password_konfirmasi');

    $cek_pass = $this->M_pimpinan->cek_password($id_pimpinan);

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
      redirect('C_pimpinan/password');
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
      redirect('C_pimpinan/password');
    }else{
      $password_baru = array(
        'password' => md5($password_konfirmasi),
      );

      $this->M_pimpinan->password_baru($password_baru, $id_pimpinan);

      $this->session->set_flashdata('msg', '
              <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <p>Passowrd berhasil diganti</strong>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
      redirect('C_pimpinan/profil');

    }

  }

  public function bukti_pesanan($kode_pesanan)
  {
    $tampil_kode_pesanan = $this->M_umkm->bukti_pesanan_kode($kode_pesanan);

    foreach ($tampil_kode_pesanan as $row) {
      $id_umkm = $row->id_umkm;
    }

    $data['tampil_umkm'] = $this->M_umkm->bukti_pesanan_umkm($id_umkm);
    $data['tampil_pemesanan'] = $this->M_umkm->bukti_pesanan_pemesanan($kode_pesanan);
    $data['tampil_kode_pesanan'] = $this->M_umkm->bukti_pesanan_kode($kode_pesanan);

    $this->load->view('umkm/bukti_pesanan', $data);
  }

}
