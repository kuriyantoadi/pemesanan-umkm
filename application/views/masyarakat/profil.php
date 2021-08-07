<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">

    <div class="row">
      <div class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h1 align='center' style="margin-bottom: 30px" class="display-4">Profil Masyarakat</h1>

            <?php
            foreach ($tampil as $row) {
            ?>
            <table class="table table-bordered">
              <tr>
                <td>Nama</td>
                <td><?= $row->nama_masyarakat ?></td>
              </tr>
              <tr>
                <td>NIK</td>
                <td><?= $row->nik ?></td>
              </tr>
              <tr>
                <td>Tanggal Lahir (Bulan/Tanggal/Tahun)</td>
                <td><?= $row->tgl_lahir ?></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td><?= $row->alamat ?></td>
              </tr>
              <tr>
                <td>Username</td>
                <td><?= $row->username ?></td>
              </tr>
              <tr>
                <td>Status</td>
                <td><?= $row->status_masyarakat ?></td>
              </tr>

            </table>
              <center><a style="margin-top: 20px" href="<?= base_url() ?>C_umkm/dashboard" class="btn btn-warning btn-sm" >Kembali</a>
              <?php echo form_close();
                }
              ?>
          </div>
        </div>
      </div>
    </div>
