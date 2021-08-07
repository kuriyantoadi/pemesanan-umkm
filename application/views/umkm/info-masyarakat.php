<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">


    <div class="row">
      <div class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h1 align='center' style="margin-bottom: 30px" class="display-4">Info Masyarakat</h1>

            <?= $this->session->flashdata('msg') ?>
            <a class="btn btn-primary btn-sm" style="margin-bottom: 20px" href="<?= base_url() ?>C_umkm/info_tambah">Tambah</a>
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
                  <center>Kondisi
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
                <td><center><?= $row->kondisi; ?>
                </td>
                <td><center>
                  <a href="<?php echo site_url('C_umkm/info_hapus/'.$row->id_info); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin menhapus data <?= $row->judul_info ?> ?')">Hapus</a>
                  <a href="<?php echo site_url('C_umkm/info_edit/'.$row->id_info); ?>" class="btn btn-sm btn-info">Edit</a>
                  <a href="<?php echo site_url('C_umkm/info_detail/'.$row->id_info); ?>" class="btn btn-sm btn-success">Detail</a>

                </td>
              </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </div>
