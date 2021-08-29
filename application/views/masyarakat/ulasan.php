<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">


    <div class="row">
      <div class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h1 align='center' style="margin-bottom: 30px" class="display-4">Detail Informasi</h1>

            <?php
            foreach ($tampil as $row) {
            ?>
            <table class="table table-bordered">
              <tr>
                <td>Tanggal Upload</td>
                <td><?= $row->tgl_upload ?></td>
              </tr>
              <tr>
                <td>Judul Informasi</td>
                <td><?= $row->judul_info ?></td>
              </tr>
              <tr>
                <td>Isi Informasi</td>
                <td><?= $row->isi_info ?></td>
              </tr>

            </table>
              <center><a style="margin-top: 20px" href="<?= base_url() ?>C_masyarakat/info" class="btn btn-warning btn-sm" >Kembali</a>
              <?php echo form_close();
                }
              ?>
          </div>
        </div>
      </div>
    </div>
