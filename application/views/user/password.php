<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">

    <div class="row">
      <div class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h1 align='center' style="margin-bottom: 30px" class="display-4">Profil User</h1>

            <?= $this->session->flashdata('msg') ?>

            <?php
            // var_dump($user);
            echo form_open('C_user/password_up');
            foreach ($tampil as $row) {
            ?>
            <table class="table table-bordered">
              <tr>
                <td>Username</td>
                <td><?= $row->username ?></td>
              </tr>
              <tr>
                <td>Password Lama</td>
                <td>
                  <input type="hidden" name="id_user" value="<?= $row->id_user ?>" >
                  <input type="password_lama" class="form-control" name="password_lama" value="">
                </td>
              </tr>
              <tr>
                <td>Password Baru</td>
                <td>
                  <input type="password_baru" class="form-control" name="password_baru" value="">
                </td>
              </tr>
              <tr>
                <td>Password Baru Konfirmasi</td>
                <td>
                  <input type="password_konfirmasi" class="form-control" name="password_konfirmasi" value="">
                </td>
              </tr>

            </table>
            <center><button style="margin-top: 20px" type="submit" class="btn btn-primary btn-sm">Submit</button>
            <a style="margin-top: 20px" href="<?= base_url() ?>C_umkm/dashboard" class="btn btn-warning btn-sm" >Kembali</a>
              <?php echo form_close();
                }
              ?>
          </div>
        </div>
      </div>
    </div>
