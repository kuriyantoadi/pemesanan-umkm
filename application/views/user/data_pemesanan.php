<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">


    <div class="row">
      <div class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h1 align='center' style="margin-bottom: 30px" class="display-4">Data Pemesanan</h1>

            <?= $this->session->flashdata('msg') ?>
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
                  <center>Pemesanan
                </th>
                <th>
                  <center>Pengiriman
                </th>
                <th>
                  <center>Nama UMKM
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
                <td><center><?= $row->tgl_pesan; ?></td>
                <td><center><?= $row->tgl_pengiriman; ?></td>
                <td><center><?= $row->nama_umkm ?></td>
                <td><center><?= $row->status_kode; ?></td>
                <td><center>
                  <a href="<?php echo site_url('C_user/data_pemesanan_hapus/'.$row->kode_pesanan) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin menghapus data pesanan <?= $row->kode_pesanan ?> ?')">Hapus</a>
                  <a href="<?php echo site_url('C_umkm/bukti_pesanan/'.$row->kode_pesanan) ?>" class="btn btn-sm btn-warning">Cetak</a>
                  <a href="<?php echo site_url('C_user/data_pemesanan_detail/'.$row->kode_pesanan); ?>" class="btn btn-sm btn-info">Detail</a>
                </td>
              </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </div>
