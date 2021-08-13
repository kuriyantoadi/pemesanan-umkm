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
