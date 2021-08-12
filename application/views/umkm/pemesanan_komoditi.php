<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">


    <div class="row">
      <div class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h1 align='center' style="margin-bottom: 30px" class="display-4">Data Komoditi PT Agro</h1>

            <?= $this->session->flashdata('msg') ?>
            <table class="table table-bordered table-hover" id="example">
              <thead>
              <tr>
                <th>
                  <center>No
                </th>
                <th>
                  <center>Nama Komoditi
                </th>
                <th>
                  <center>Volume
                </th>
                <th>
                  <center>Satuan (kg)
                </th>
                <th>
                  <center>Harga Satuan
                </th>
                <th><center>Pilihan</th>
              </tr>
            </thead>

            <?php
            $no=1;
            foreach ($tampil as $row) {
             ?>

              <tr>
                <td><center><?= $no++ ?></td>
                <td><center><?= $row->nama_komoditi; ?></td>
                <td><center><?= $row->volume; ?></td>
                <td><center><?= $row->satuan_kg; ?></td>
                <td><center><?= $row->harga_satuan; ?></td>

                <td><center>
                  <a href="<?php echo site_url('C_user/komoditi_edit/'.$row->id_komoditi_agro); ?>" class="btn btn-sm btn-primary">Pesan</a>
                </td>
              </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>

      <div style="margin-top: 20px" class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h1 align='center' style="margin-bottom: 30px" class="display-4">Pemesanan Komoditi</h1>

            <?= $this->session->flashdata('msg') ?>
            <table class="table table-bordered table-hover" id="example">
              <thead>
              <tr>
                <th>
                  <center>No
                </th>
                <th>
                  <center>Nama Komoditi
                </th>
                <th>
                  <center>Volume
                </th>
                <th>
                  <center>Satuan (kg)
                </th>
                <th>
                  <center>Harga Satuan
                </th>
                <th><center>Pilihan</th>
              </tr>
            </thead>

            <?php
            $no=1;
            foreach ($tampil as $row) {
             ?>

              <tr>
                <td><center><?= $no++ ?></td>
                <td><center><?= $row->nama_komoditi; ?></td>
                <td><center><?= $row->volume; ?></td>
                <td><center><?= $row->satuan_kg; ?></td>
                <td><center><?= $row->harga_satuan; ?></td>

                <td><center>
                  <a href="<?php echo site_url('C_user/komoditi_edit/'.$row->id_komoditi_agro); ?>" class="btn btn-sm btn-primary">Pesan</a>
                </td>
              </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>

    </div>
