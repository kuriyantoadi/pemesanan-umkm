<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">


    <div class="row">

      <div style="margin-top: 20px" class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h1 align='center' style="margin-bottom: 30px" class="display-4">Detail Pemesanan <?= $kode_pesanan ?></h1>

            <!-- <?= $this->session->flashdata('msg') ?> -->
            <table class="table table-bordered table-hover" id="example1">
              <thead>
              <tr>
                <th>
                  <center>No
                </th>
                <th>
                  <center>Nama Komoditi
                </th>
                <th>
                  <center>Volume
                </th>
                <th>
                  <center>Satuan (kg)
                </th>
                <th>
                  <center>Harga Satuan
                </th>
                <th>
                  <center>Jumlah
                </th>
                <th><center>Kondisi</th>
                <th><center>Sub Total</th>
                <th><center>Pilihan</th>
              </tr>
            </thead>

            <?php
            $no=1;
            foreach ($status_kode as $row) {
              $status_kode = $row->status_kode;
            }

            foreach ($tampil as $row) {
            $kode_pesanan = $row->kode_pesanan;
            $harga_satuan = $row->harga_satuan;
            $sub_total = $row->sub_total;
            $harga_satuan_rp = number_format($harga_satuan,2,',','.');
            $sub_total_rp = number_format($sub_total,2,',','.');
           ?>

              <tr>
                <td><center><?= $no++ ?></td>
                <td><center><?= $row->nama_komoditi; ?></td>
                <td><center><?= $row->volume; ?></td>
                <td><center><?= $row->satuan_kg; ?></td>
                <td><center><?= 'Rp. '. $harga_satuan_rp ?></td>
                <td><center><?= $row->jumlah_komoditi; ?></td>
                <td><center><?= $row->kondisi ?></td>
                <td><center><?= 'Rp. '. $sub_total_rp ?></td>
                <td><center>
                  <?php if ($status_kode == 'Menunggu Konfirmasi') { ?>
                  <a href="<?php echo site_url('C_user/data_pemesanan_tidak_tersedia/'.$row->id_pemesanan.'/'.$kode_pesanan); ?>">
                    <button type="button" class="btn btn-danger btn-rounded btn-icon">
                      <i class="mdi mdi mdi-close"></i>
                    </button>
                  </a>
                  <a href="<?php echo site_url('C_user/data_pemesanan_tersedia/'.$row->id_pemesanan.'/'.$kode_pesanan); ?>">
                    <button type="button" class="btn btn-primary btn-sm btn-rounded btn-icon">
                      <i class="mdi mdi-check"></i>
                    </button>
                  </a>
                <?php  } ?>

                </td>
              </tr>

              <?php } ?>

              <tr>
                <td colspan="7"><b>Total</b></td>
                <td><center>
                  <?php
                  foreach ($total_sum as $row1) {
                      $total = $row1->sub_total;
                      $total_rp = number_format($total,2,',','.');
                      echo "Rp. ". $total_rp;
                  }
                  ?>
                </td>
              </tr>

            </table>
            <center style="margin-top: 20px">
              <a href="<?= base_url() ?>C_user/data_pemesanan/" class="btn btn-sm btn-warning">Kembali</a>
              <a href="<?= base_url() ?>C_user/data_pemesanan_reset/<?= $kode_pesanan ?>" class="btn btn-sm btn-info" onclick="return confirm('Anda yakin melakukan reset?')">Reset</a>

              <?php if ($status_kode == 'Menunggu Konfirmasi') { ?>
                <a href="<?= base_url() ?>C_user/data_pemesanan_tolak/<?= $kode_pesanan ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin menerima ?')">Tolak Pesanan</a>
                <a href="<?= base_url() ?>C_user/data_pemesanan_terima/<?= $kode_pesanan ?>" class="btn btn-sm btn-success" onclick="return confirm('Anda yakin menerima ?')">Terima & Kirim Pesanan</a>
              <?php } ?>

          </div>
        </div>
      </div>
    </div>
