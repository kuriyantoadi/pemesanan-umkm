<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">


    <div class="row">
      <div class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h1 align='center' style="margin-bottom: 30px" class="display-4">Tambah Info Masyarakat</h1>

            <?php echo form_open('C_umkm/info_tambah_up'); ?>
              <div class="form-group">
                <label for="exampleInputName1">Tangga Info</label>
                <input type="hidden" name="id_umkm" value="<?= $tampil_masyarakat ?>">
                <input type="text" class="form-control" name="tgl_upload" value="<?= date('d-m-Y') ?>" readonly>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail3">Judul Informasi</label>
                <input type="textarea" class="form-control" name="judul_info" placeholder="Judul Informasi" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword4">Isi Informasi</label>
                <textarea name="isi_info" class="form-control" rows="8" cols="80" required></textarea>
              </div>
              <div class="form-group">
                <label>Status Informasi</label>
                <select class="form-control" name="kondisi" required>
                  <option value="">Pilihan</option>
                  <option value="aktif">Aktif</option>
                  <option value="tidak aktif">Tidak Aktif</option>
                </select>
              </div>

              <center><button type="submit" class="btn btn-primary btn-sm">Submit</button>
              <a href="<?= base_url() ?>C_umkm/info_masyarakat" class="btn btn-warning btn-sm" >Kembali</a>
              <?php
                // }
                echo form_close();
              ?>
          </div>
        </div>
      </div>
    </div>
