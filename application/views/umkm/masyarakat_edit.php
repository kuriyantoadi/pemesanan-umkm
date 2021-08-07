<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">


    <div class="row">
      <div class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h1 align='center' style="margin-bottom: 30px" class="display-4">Edit Data Masyarakat</h1>

            <?php
            echo form_open('C_umkm/masyarakat_edit_up');

            foreach ($masyarakat_edit as $row) {
            ?>
              <div class="form-group">
                <label>Nama Masyarakat</label>
                <input type="hidden" class="form-control" name="id_masyarakat" value="<?= $row->id_masyarakat ?>" required>
                <input type="text" class="form-control" name="nama_masyarakat" value="<?= $row->nama_masyarakat ?>" required>
              </div>
              <div class="form-group">
                <label>NIK</label>
                <input type="text" class="form-control" name="nik" value="<?= $row->nik ?>" required>
              </div>
              <div class="form-group">
                <label>Tanggal Lahir (bulan/tgl/tahun)</label>
                <input type="date" class="form-control" name="tgl_lahir" value="<?= $row->tgl_lahir ?>" required>
              </div>
              <div class="form-group">
                <label >Alamat</label>
                <input type="text" class="form-control" name="alamat" value="<?= $row->alamat ?>" required>
              </div>
              <div class="form-group">
                <label >Username</label>
                <input type="text" class="form-control" name="username" value="<?= $row->username ?>" required>
              </div>

              <div class="form-group">
                <label >Induk UMKM</label>
                <select class="form-control" name="id_umkm" required>
                  <option value="<?= $row->id_umkm ?>" >Pilihan ( <?= $row->nama_umkm ?> )</option>
                  <?php foreach ($tampil_umkm as $row2) { ?>
                    <option value="<?= $row2->id_umkm ?>"><?= $row2->nama_umkm ?></option>
                  <?php } ?>
                </select>
              </div>


              <div class="form-group">
                <label>Status Masyarakat <?= $row->status_masyarakat ?></label>
                <select class="form-control" name="status_masyarakat" required>
                  <option value="<?= $row->status_masyarakat ?>" >Pilihan ( <?= $row->status_masyarakat ?> )</option>
                  <option value="aktif">Aktif</option>
                  <option value="tidak aktif">Tidak Aktif</option>
                </select>
              </div>

              <center><button type="submit" class="btn btn-primary btn-sm">Submit</button>
              <a href="<?= base_url() ?>C_umkm/masyarakat" class="btn btn-warning btn-sm" >Kembali</a>
              <?php echo form_close();
                }
              ?>
          </div>
        </div>
      </div>
    </div>
