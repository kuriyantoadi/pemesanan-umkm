<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">


    <div class="row">
      <div class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h1 align='center' style="margin-bottom: 30px" class="display-4">Tambah UMKM</h1>

            <?php echo form_open('C_user/data_umkm_tambah_up'); ?>
              <div class="form-group">
                <label for="exampleInputName1">Nama UMKM</label>
                <input type="text" class="form-control" name="nama_umkm" value="" required>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail3">Kecamatan UMKM</label>
                <input type="text" class="form-control" name="kec_umkm"  required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword4">Alamat UMKM</label>
                <input type="text" class="form-control" name="alamat_umkm" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword4">Username</label>
                <input type="text" class="form-control" name="username" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword4">Password</label>
                <input type="text" class="form-control" name="password" required>
              </div>
              <div class="form-group">
                <label>Status UMKM</label>
                <select class="form-control" name="status_umkm" required>
                  <option value="">Pilihan</option>
                  <option value="aktif">Aktif</option>
                  <option value="tidak aktif">Tidak Aktif</option>
                </select>
              </div>
              <center><button type="submit" class="btn btn-primary btn-sm">Submit</button>
              <a href="<?= base_url() ?>C_user/data_umkm" class="btn btn-warning btn-sm" >Kembali</a>
              <?php
                // }
                echo form_close();
              ?>
          </div>
        </div>
      </div>
    </div>
