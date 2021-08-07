<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">


    <div class="row">
      <div class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h1 align='center' style="margin-bottom: 30px" class="display-4">Tambah Data Masyarakat</h1>

            <?= form_open('C_umkm/masyarakat_tambah_up'); ?>
              <div class="form-group">
                <label for="exampleInputName1">Nama Masyarakat</label>
                <input type="text" class="form-control" name="nama_masyarakat" placeholder="Nama" required>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail3">NIK</label>
                <input type="text" class="form-control" name="nik" id="exampleInputEmail3" placeholder="NIK" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword4">Tanggal Lahir (bulan/tgl/tahun)</label>
                <input type="date" class="form-control" name="tgl_lahir" placeholder="Tanggal Lahir" required>
              </div>
              <div class="form-group">
                <label >Alamat</label>
                <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
              </div>
              <div class="form-group">
                <label >Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username" required>
              </div>
              <div class="form-group">
                <label >Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
              </div>
              <div class="form-group">
                <label >Induk UMKM</label>
                <select class="form-control" name="id_umkm" required>
                  <option value="">Pilihan</option>
                  <?php foreach ($tampil_umkm as $row) { ?>
                    <option value="<?= $row->id_umkm ?>"><?= $row->nama_umkm ?></option>
                  <?php }?>
                </select>
              </div>
              <div class="form-group">
                <label>Status Masyarakat</label>
                <select class="form-control" name="status_masyarakat" required>
                  <option value="">Pilihan</option>
                  <option value="aktif">Aktif</option>
                  <option value="tidak aktif">Tidak Aktif</option>
                </select>
              </div>

              <center><button type="submit" class="btn btn-primary btn-sm">Submit</button>
              <a href="<?= base_url() ?>C_umkm/masyarakat" class="btn btn-warning btn-sm" >Kembali</a>
              <?= form_close(); ?>
          </div>
        </div>
      </div>
    </div>
