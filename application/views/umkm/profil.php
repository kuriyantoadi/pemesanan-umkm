<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">

    <div class="row">
      <div class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h1 align='center' style="margin-bottom: 30px" class="display-4">Profil UMKM</h1>

            <?php
            foreach ($tampil as $row) {
            ?>
            <table class="table table-bordered">
              <tr>
                <td>Nama UMKM</td>
                <td><?= $row->nama_umkm ?></td>
              </tr>
              <tr>
                <td>Alamat UMKM</td>
                <td><?= $row->alamat_umkm ?></td>
              </tr>
              <tr>
                <td>Kecamatan UMKM</td>
                <td><?= $row->kec_umkm ?></td>
              </tr>
              <tr>
                <td>Username UMKM</td>
                <td><?= $row->username ?></td>
              </tr>
              <tr>
                <td>Status UMKM</td>
                <td><?= $row->status_umkm ?></td>
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
