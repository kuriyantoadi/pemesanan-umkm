<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">

    <div class="row">
      <div class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h1 align='center' style="margin-bottom: 30px" class="display-4">Info Masyarakat</h1>

            <?= $this->session->flashdata('msg') ?>
            <table class="table table-bordered table-hover" id="example">
              <thead>
              <tr>
                <th>
                  <center>No
                </th>
                <th>
                  <center>Tanggal
                </th>
                <th>
                  <center>Judul Info
                </th>
                <th>
                  <center>Kode Pengambilan
                </th>
                <th>
                  <center>UMKM Induk
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
                <td><center><?= $row->tgl_upload; ?></td>
                <td><center><?= $row->judul_info; ?></td>
                <td><center><?= $row->kode_pengambilan; ?></td>
                <td><center><?= $row->nama_umkm; ?>
                </td>
                <td><center>
                  <a href="<?php echo site_url('C_masyarakat/info_detail/'.$row->id_info.'/'.$row->kode_pengambilan); ?>" class="btn btn-sm btn-success">Detail</a>
                </td>
              </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </div>
