<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">


    <div class="row">
      <div class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h1 align='center' style="margin-bottom: 30px" class="display-4">Edit Komoditi</h1>

            <?php
            echo form_open('C_user/komoditi_edit_up');
            foreach ($tampil as $row) {
            ?>
              <div class="form-group">
                <label for="exampleInputName1">Nama Komoditi</label>
                <input type="hidden" class="form-control" name="id_komoditi_agro" value="<?= $row->id_komoditi_agro ?>" required>
                <input type="text" class="form-control" name="nama_komoditi" value="<?= $row->nama_komoditi ?>" required>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail3">Volume</label>
                <input type="text" class="form-control" name="volume" value="<?= $row->volume ?>" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword4">Satuan (Kg/Bks/Karung)</label>
                <input type="text" class="form-control" name="satuan_kg" value="<?= $row->satuan_kg ?>" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword4">Harga</label>
                <input type="text" class="form-control" name="harga_satuan" value="<?= $row->harga_satuan ?>" required>
              </div>


              <center><button type="submit" class="btn btn-primary btn-sm">Submit</button>
              <a href="<?= base_url() ?>C_user/komoditi" class="btn btn-warning btn-sm" >Kembali</a>
              <?php
                }
                echo form_close();
              ?>
          </div>
        </div>
      </div>
    </div>
