<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">


    <div class="row">
      <div class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h1 align='center' style="margin-bottom: 30px" class="display-4">Kode Pesanan</h1>

            <?= $this->session->flashdata('msg') ?>
            <a class="btn btn-primary btn-sm" style="margin-bottom: 20px" href="kode_pesanan_tambah">Tambah</a>
            <table class="table table-bordered table-hover" id="example">
              <thead>
              <tr>
                <th>
                  <center>No
                </th>
                <th>
                  <center>Kode Pesanan
                </th>
                <th>
                  <center>Status
                </th>
                <th><center>Pilihan</th>
              </tr>
            </thead>

            <?php
            $no=1;
            foreach ($tampil as $row) {
             ?>

              <tr>
                <td><center><?= $no++ ?></td>
                <td><center><?= $row->kode_pesanan; ?></td>
                <td><center><?= $row->status_kode; ?></td>

                <td><center>
                  <a href="<?php echo site_url('C_umkm/pemesanan_komoditi/'.$row->kode_pesanan); ?>" class="btn btn-sm btn-info">Lihat</a>
                  <a href="<?php echo site_url('C_umkm/bukti_pesanan/'.$row->kode_pesanan) ?>" class="btn btn-sm btn-warning">Cetak</a>
                </td>
              </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </div>
