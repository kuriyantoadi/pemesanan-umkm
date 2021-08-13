<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">

    <div class="row">

      <div style="margin-top: 20px" class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h1 align='center' style="margin-bottom: 30px" class="display-4">Konfirmasi Pesanan</h1>

            <!-- <?= $this->session->flashdata('msg') ?> -->
            <table class="table table-bordered table-hover" id="example1">
              <thead>
              <tr>
                <th>
                  <center>No
                </th>
                <th>
                  <center>Kode Pesanan
                </th>
                <th>
                  <center>Pesanan
                </th>
                <th>
                  <center>Pengiriman
                </th>
                <th>
                  <center>Status Kode
                </th>
                <th><center>Pilihan</th>
              </tr>
            </thead>

            <?php
            $no=1;
            foreach ($tampil as $row) {
            $status_kode = $row->status_kode;
           ?>

              <tr>
                <td><center><?= $no++ ?></td>
                <td><center><?= $row->kode_pesanan; ?></td>
                <td><center><?= $row->tgl_pesan; ?></td>
                <td><center><?= $row->tgl_pengiriman; ?></td>
                <td><center><?= $row->status_kode; ?></td>
                <td><center>
                  <?php if ($status_kode == 'Dalam Pengiriman') { ?>
                    <a href="<?php echo site_url('C_umkm/konfirmasi_pesanan_diterima/'.$row->kode_pesanan); ?>" class="btn btn-sm btn-primary">Diterima</a>
                  <?php }elseif ($status_kode == 'Sudah diterima') { ?>
                    <a href="<?php echo site_url('C_umkm/konfirmasi_pesanan_riwayat/'.$row->kode_pesanan); ?>" class="btn btn-sm btn-info">Riwayat</a>
                  <?php } ?>


                </td>
              </tr>
              <?php
              }
               ?>

            </table>
          </div>
        </div>
      </div>
    </div>
