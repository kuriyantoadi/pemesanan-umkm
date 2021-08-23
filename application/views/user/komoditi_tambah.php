<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">


    <div class="row">
      <div class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h1 align='center' style="margin-bottom: 30px" class="display-4">Tambah Komoditi</h1>

            <?php echo form_open('C_user/komoditi_tambah_up'); ?>
              <div class="form-group">
                <label for="exampleInputName1">Nama Komoditi</label>
                <input type="text" class="form-control" name="nama_komoditi" value="" placeholder="Nama Komoditi" required>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail3">Volume</label>
                <input type="text" class="form-control" name="volume" placeholder="Volume" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword4">Satuan (Kg/Bks/Karung)</label>
                <input type="text" class="form-control" name="satuan_kg" placeholder="Satuan" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword4">Harga</label>
                <input type="text" class="form-control" name="harga_satuan" placeholder="Harga" required>
              </div>


              <center><button type="submit" class="btn btn-primary btn-sm">Submit</button>
              <a href="<?= base_url() ?>C_user/komoditi" class="btn btn-warning btn-sm" >Kembali</a>
              <?php
                // }
                echo form_close();
              ?>
          </div>
        </div>
      </div>
    </div>
