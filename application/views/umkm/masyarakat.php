<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">


    <div class="row">
      <div class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h1 align='center' style="margin-bottom: 30px" class="display-4">Data Masyarakat</h1>

            <?= $this->session->flashdata('msg') ?>
            <a class="btn btn-primary btn-sm" style="margin-bottom: 20px" href="masyarakat_tambah">Tambah</a>
            <table class="table table-bordered table-hover" id="example">
              <thead>
              <tr>
                <th>
                  <center>No
                </th>
                <th>
                  <center>NIK
                </th>
                <th>
                  <center>Nama
                </th>
                <th>
                  <center>UMKM Induk
                </th>
                <th><center>Pilihan</th>
              </tr>
            </thead>

            <?php
            $no=1;
            foreach ($tampil_masyarakat as $row) {
             ?>

              <tr>
                <td><center><?= $no++ ?></td>
                <td><center><?= $row->nik; ?></td>
                <td><center><?= $row->nama_masyarakat; ?></td>
                <td><center>
                  <?= $row->nama_umkm; ?>
                </td>
                <td><center>
                  <a href="<?php echo site_url('C_umkm/masyarakat_hapus/'.$row->id_masyarakat); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin menhapus data <?= $row->nama_masyarakat ?> ?')">Hapus</a>
                  <a href="<?php echo site_url('C_umkm/masyarakat_edit/'.$row->id_masyarakat); ?>" class="btn btn-sm btn-info">Edit</a>
                  <a href="<?php echo site_url('C_umkm/masyarakat_password/'.$row->id_masyarakat); ?>" class="btn btn-sm btn-warning">Password</a>
                  <a href="<?php echo site_url('C_umkm/masyarakat_detail/'.$row->id_masyarakat); ?>" class="btn btn-sm btn-success">Detail</a>
                </td>
              </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </div>
