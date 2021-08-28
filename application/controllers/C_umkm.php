<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_umkm extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('M_umkm');
			$this->load->model('M_masyarakat');

			// session login
			if ($this->session->userdata('umkm') != true) {
				$url = base_url('C_login/umkm');
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
		$ses_id_umkm = $this->session->userdata('ses_id');
		$data['tampil_masyarakat'] = $this->M_umkm->tampil_masyarakat($ses_id_umkm);

		$this->load->view('template/header-umkm');
		$this->load->view('umkm/masyarakat', $data);
		$this->load->view('template/footer');
	}

	public function masyarakat_password($id_masyarakat)
	{
		$data['tampil'] = $this->M_umkm->masyarakat_detail($id_masyarakat);

		$this->load->view('template/header-umkm');
		$this->load->view('umkm/masyarakat_password', $data);
		$this->load->view('template/footer');
	}

	public function masyarakat_password_up()
	{
		$id_masyarakat = $this->input->post('id_masyarakat');
		$password_baru = $this->input->post('password_baru');
		$password_konfirmasi = $this->input->post('password_konfirmasi');

		if ($password_baru != $password_konfirmasi) {
			$this->session->set_flashdata('msg', '
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<p>Password konfirmasi anda tidak sesuai</strong>

								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>');
			redirect('C_umkm/masyarakat');
		}

			$password_baru = array(
				'password' => md5($password_konfirmasi),
			);

			$this->M_umkm->masyarakat_password_up($password_baru, $id_masyarakat);

			$this->session->set_flashdata('msg', '
							<div class="alert alert-primary alert-dismissible fade show" role="alert">
								<p>Passowrd berhasil diganti</strong>

								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>');
			redirect('C_umkm/masyarakat');
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
		$data['kode_pesanan'] = $this->M_umkm->info_kode_pemesanan($ses_id_umkm);

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
		$kode_pengambilan = $this->input->post('kode_pengambilan');

		$tambah_info = array(
			'id_umkm' => $id_umkm,
			'tgl_upload' => $tgl_upload,
			'judul_info' => $judul_info,
			'isi_info' => $isi_info,
			'kondisi' => $kondisi,
			'kode_pengambilan' => $kode_pengambilan
		);

			$this->M_umkm->info_tambah_up($tambah_info);
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

		public function info_edit_up()
		{
			$id_info = $this->input->post('id_info');
			$id_umkm = $this->input->post('id_umkm');
			$tgl_upload = $this->input->post('tgl_upload');
			$judul_info = $this->input->post('judul_info');
			$isi_info = $this->input->post('isi_info');
			$kondisi = $this->input->post('kondisi');

			$kode_info = array('id_info' => $id_info);

			$data_edit = array(
				'id_umkm' => $id_umkm,
				'tgl_upload' => $tgl_upload,
				'judul_info' => $judul_info,
				'isi_info' => $isi_info,
				'kondisi' => $kondisi
			);

	 		$this->M_umkm->info_edit_up($data_edit, $kode_info);

			$this->session->set_flashdata('msg', '
								<div class="alert alert-primary alert-dismissible fade show" role="alert">
									<strong>Edit Informasi berhasil</strong>

									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>');
				redirect ('C_umkm/info');

			}

			public function info_detail($id_info)
			{
				$data['tampil'] = $this->M_umkm->info_detail($id_info);

				$this->load->view('template/header-umkm');
				$this->load->view('umkm/info_detail', $data);
				$this->load->view('template/footer');
			}

//menu info akhir


//menu profil awal

			public function profil()
			{
				$ses_id_umkm = $this->session->userdata('ses_id');
				$data['tampil'] = $this->M_umkm->profil($ses_id_umkm);

				$this->load->view('template/header-umkm');
				$this->load->view('umkm/profil', $data);
				$this->load->view('template/footer');
			}


			public function password()
			{
				$ses_id_umkm = $this->session->userdata('ses_id');
				$data['tampil'] = $this->M_umkm->profil($ses_id_umkm);

				$this->load->view('template/header-umkm');
				$this->load->view('umkm/password', $data);
				$this->load->view('template/footer');
			}

			public function password_up()
			{
				$id_umkm = $this->input->post('id_umkm');
				$password_lama = $this->input->post('password_lama');
				$password_baru = $this->input->post('password_baru');
				$password_konfirmasi = $this->input->post('password_konfirmasi');

				$cek_pass = $this->M_umkm->cek_password($id_umkm);

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
					redirect('C_umkm/password');
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
					redirect('C_umkm/password');
				}else{
					$password_baru = array(
						'password' => md5($password_konfirmasi),
					);

					$this->M_umkm->passowrd_baru($password_baru, $id_umkm);

					$this->session->set_flashdata('msg', '
									<div class="alert alert-primary alert-dismissible fade show" role="alert">
										<p>Passowrd berhasil diganti</strong>

										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>');
					redirect('C_umkm/profil');

				}

			}
// menu profil akhir


// awal pemesanan komoditi

			public function kode_pesanan()
			{
				$ses_id_umkm = $this->session->userdata('ses_id');
				$data['tampil'] = $this->M_umkm->kode_pesanan($ses_id_umkm);

				$this->load->view('template/header-umkm');
				$this->load->view('umkm/kode_pesanan', $data);
				$this->load->view('template/footer');
			}

			public function kode_pesanan_tambah()
			{
				$table 	= 'tb_kode_pesanan';
				$field	= 'kode_pesanan';

				$lastKode = $this->M_umkm->getMax($table, $field);

				//mengambil 4 karakter dari belakang
				$noUrut = (int) substr($lastKode, -4, 4);
				$noUrut++;

				$str= 'K';
				$kode_pesanan = $str . sprintf('%04s', $noUrut);

				//id UMKM
				$ses_id_umkm = $this->session->userdata('ses_id');


				$tambah_kode_pesanan = array(
					'id_umkm' => $ses_id_umkm,
					'kode_pesanan' => $kode_pesanan,
					'status_kode'=> 'belum selesai'
				);

				$this->M_umkm->kode_pesanan_tambah($tambah_kode_pesanan);

				redirect ('C_umkm/kode_pesanan');

			}

			public function pemesanan_komoditi($kode_pesanan)
			{
				$cek_kode_pesanan = $this->M_umkm->kode_pesanan_cek($kode_pesanan);

				foreach ($cek_kode_pesanan as $row)
				{
					$status_kode = $row->status_kode;
				}

				if ($status_kode != 'belum selesai' && (!empty($status_kode))) {
					$this->session->set_flashdata('msg', '
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<p>Akses lihat tidak di ijinkan, hubungi operator PT Agro untuk Edit Pemesanan</strong>

										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>');
					redirect('C_umkm/kode_pesanan/');
				}

				$data['tampil'] = $this->M_umkm->komoditi_agro($kode_pesanan);
				$data['tampil_pemesanan'] = $this->M_umkm->pemesanan_komoditi($kode_pesanan);
				$data['total_sum'] = $this->M_umkm->pemesanan_komoditi_harga($kode_pesanan);

				$data['kode_pesanan'] = $kode_pesanan;

				$this->load->view('template/header-umkm');
				$this->load->view('umkm/pemesanan_komoditi', $data);
				$this->load->view('template/footer');
			}

			public function pemesanan_komoditi_tambah($id_komoditi_agro, $kode_pesanan)
			{
				$ses_id_umkm = $this->session->userdata('ses_id');
				$pesanan = $this->M_umkm->pemesanan_komoditi_tambah($id_komoditi_agro);
				$cek_pesanan = $this->M_umkm->pemesanan_komoditi_cek($id_komoditi_agro);

				foreach ($pesanan as $row)
				{
								$id_komoditi_agro = $row->id_komoditi_agro;
				        $nama_komoditi = $row->nama_komoditi;
				        $harga_satuan = $row->harga_satuan;
				        $volume = $row->volume;
								$satuan_kg = $row->satuan_kg;
				}

				foreach ($cek_pesanan as $rows) {
					$id_komoditi = $rows->id_komoditi;
					$kode_pesanan_cek = $rows->kode_pesanan;
				}

				if ($id_komoditi_agro == $id_komoditi && $kode_pesanan_cek == $kode_pesanan) {
					$this->session->set_flashdata('msg', '
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<p>Komoditi sudah dipesan</strong>

										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>');
					redirect('C_umkm/pemesanan_komoditi/'.$kode_pesanan);
				}


				$tambah_pesanan = array(
					'kode_pesanan' => $kode_pesanan,
					'id_komoditi' => $id_komoditi_agro,
					'id_umkm' => $ses_id_umkm,
					'nama_komoditi' => $nama_komoditi,
					'harga_satuan' => $harga_satuan,
					'volume' => $volume,
					'satuan_kg' => $satuan_kg
				);

				$this->M_umkm->pemesanan_komoditi_tambah_up($tambah_pesanan);
				$this->session->set_flashdata('msg', '
								<div class="alert alert-success alert-dismissible fade show" role="alert">
									<p>Pemsanan Komoditi ditambah</strong>

									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>');
				redirect('C_umkm/pemesanan_komoditi/'.$kode_pesanan);

			}

			public function pemesanan_komoditi_jumlah($id_pemesanan, $kode_pesanan)
			{
				$data['tampil'] = $this->M_umkm->pemesanan_komoditi_jumlah($id_pemesanan);
				$data['kode_pesanan'] = $kode_pesanan;

				$this->load->view('template/header-umkm');
				$this->load->view('umkm/pemesanan_komoditi_jumlah', $data);
				$this->load->view('template/footer');
			}

			public function pemesanan_komoditi_jumlah_up()
			{
				$kode_pesanan = $this->input->post('kode_pesanan');
				$id_pemesanan = $this->input->post('id_pemesanan');
				$jumlah_komoditi = $this->input->post('jumlah_komoditi');
				$harga_satuan = $this->input->post('harga_satuan');

				$subtotal = $harga_satuan * $jumlah_komoditi;

				$tambah_jumlah = array(
					'jumlah_komoditi'=> $jumlah_komoditi,
					'sub_total' => $subtotal
				);

				$this->M_umkm->pemesanan_komoditi_jumlah_up($tambah_jumlah, $id_pemesanan);
				redirect('C_umkm/pemesanan_komoditi/'.$kode_pesanan);

			}

			public function pemesanan_komoditi_jumlah_hapus($id_pemesanan, $kode_pesanan)
			{
				$this->M_umkm->pemesanan_komoditi_jumlah_hapus($id_pemesanan);
				redirect('C_umkm/pemesanan_komoditi/'.$kode_pesanan);
			}

			public function pemesanan_selesai($kode_pesanan, $total)
			{
				if ($total == 0) {
					$this->session->set_flashdata('msg', '
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<p>Anda belum memesan komoditi</strong>

										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>');
					redirect('C_umkm/pemesanan_komoditi/'.$kode_pesanan);
				}

				$tgl = date('d-m-Y');

				$tambah_pemesanan = array(
					'status_kode' => 'Menunggu Konfirmasi',
					'tgl_pesan' => $tgl
				);

				$this->M_umkm->pemesanan_selesai($tambah_pemesanan, $kode_pesanan);
				$this->session->set_flashdata('msg', '
								<div class="alert alert-success alert-dismissible fade show" role="alert">
									<p>Pesanan anda menunggu proses dari PT. Agro</strong>

									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>');
				redirect('C_umkm/kode_pesanan/');
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

// akhir pemesanan komoditi

// awal komoditi konfirmasi

			public function konfirmasi_pesanan()
			{
				$ses_id_umkm = $this->session->userdata('ses_id');
				$data['tampil'] = $this->M_umkm->konfirmasi_pesanan($ses_id_umkm);

				$this->load->view('template/header-umkm');
				$this->load->view('umkm/konfirmasi_pesanan', $data);
				$this->load->view('template/footer');
			}

			public function konfirmasi_pesanan_diterima($kode_pesanan)
			{
				$data['tampil'] = $this->M_umkm->konfirmasi_pesanan_diterima($kode_pesanan);
				$data['kode_pesanan'] = $kode_pesanan;

				$this->load->view('template/header-umkm');
				$this->load->view('umkm/konfirmasi_pesanan_diterima', $data);
				$this->load->view('template/footer');
			}

			public function konfirmasi_pesanan_diterima_up($id_pemesanan, $kode_pesanan)
			{
				$pesanan_diterima = array(
					'kondisi'=> 'Diterima'
				);

				$pesanan_diterima_cek = $this->M_umkm->pesanan_diterima($id_pemesanan);

				foreach ($pesanan_diterima_cek as $row) {
					$id_umkm = $row->id_umkm;
					$nama_komoditi = $row->nama_komoditi;
					$jumlah_komoditi = $row->jumlah_komoditi;
					$harga_satuan = $row->harga_satuan;
					$satuan_kg = $row->satuan_kg;
					$volume = $row->harga_satuan;
					$kode_pesanan = $row->kode_pesanan;
				}

				$tgl = date('d-m-Y');

				$pesanan_diterima_db = array(
					'id_umkm' => $id_umkm,
					'nama_komoditi' => $nama_komoditi,
					'jumlah_komoditi' => $jumlah_komoditi,
					'satuan_kg' => $satuan_kg,
					'harga_satuan' => $harga_satuan,
					'volume' => $volume,
					'tgl_diterima' => $tgl,
					'kode_pesanan' => $kode_pesanan
				);

				$this->M_umkm->konfirmasi_pesanan_diterima_up($pesanan_diterima, $id_pemesanan);
				$this->M_umkm->pesanan_diterima_db($pesanan_diterima_db);
				redirect ('C_umkm/konfirmasi_pesanan_diterima/'.$kode_pesanan);
			}


			public function konfirmasi_pesanan_belum_diterima($id_pemesanan, $kode_pesanan)
			{
				$pesanan_diterima = array(
					'kondisi'=> 'Belum diterima'
				);

				$this->M_umkm->konfirmasi_pesanan_belum_diterima($pesanan_diterima, $id_pemesanan);
				redirect ('C_umkm/konfirmasi_pesanan_diterima/'.$kode_pesanan);
			}

			public function konfirmasi_pesanan_selesai()
			{
				$tgl = date('d-m-Y');
				$ulasan_umkm = $this->input->post('ulasan_umkm');
				$kode_pesanan = $this->input->post('kode_pesanan');

				$pesanan_selesai = array(
					'status_kode'=> 'Sudah diterima',
					'tgl_diterima' => $tgl,
					'ulasan_umkm' => $ulasan_umkm
				);

				$this->M_umkm->konfirmasi_pesanan_selesai($pesanan_selesai, $kode_pesanan);
				redirect ('C_umkm/konfirmasi_pesanan/');
			}

			public function konfirmasi_pesanan_riwayat($kode_pesanan)
			{
				$data['tampil'] = $this->M_umkm->konfirmasi_pesanan_riwayat($kode_pesanan);
				$data['kode_pesanan'] = $kode_pesanan;

				$this->load->view('template/header-umkm');
				$this->load->view('umkm/konfirmasi_pesanan_riwayat', $data);
				$this->load->view('template/footer');
			}

// akhir komoditi konfirmasi


//awal gudang komoditi
			public function data_komoditi()
			{
				$ses_id_umkm = $this->session->userdata('ses_id');
				$data['tampil'] = $this->M_umkm->data_komoditi($ses_id_umkm);

				$this->load->view('template/header-umkm');
				$this->load->view('umkm/data_komoditi', $data);
				$this->load->view('template/footer');
			}

//akhir gudang komoditi


}
