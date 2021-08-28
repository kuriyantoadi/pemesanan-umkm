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
            foreach ($tampil as $row) {
            ?>
            <table class="table table-bordered">
              <tr>
                <td>Username</td>
                <td><?= $row->username ?></td>
              </tr>
              <tr>
                <td>Password</td>
                <td><?= $row->password ?></td>
              </tr>
              <tr>
                <td>Status</td>
                <td><?= $row->status ?></td>
              </tr>

            </table>
              <center><a style="margin-top: 20px" href="<?= base_url() ?>C_user/password" class="btn btn-danger btn-sm" >Password</a>
              <a style="margin-top: 20px" href="<?= base_url() ?>C_user/dashboard" class="btn btn-warning btn-sm" >Kembali</a>
              <?php echo form_close();
                }
              ?>
          </div>
        </div>
      </div>
    </div>
