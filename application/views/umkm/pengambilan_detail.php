<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">


    <div class="row">
      <div class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h1 align='center' style="margin-bottom: 30px" class="display-4">Ulasan Detail Pengambilan Komoditi</h1>

            <?= $this->session->flashdata('msg') ?>
            <table class="table table-bordered table-hover" id="example">
              <thead>
              <tr>
                <th>
                  <center>No
                </th>
                <th>
                  <center>Tanggal
                </th>
                <th>
                  <center>Kode Pengambilan
                </th>
                <th>
                  <center>Nama Masyarakat
                </th>
                <th>
                  <center>Ulasan
                </th>

              </tr>
            </thead>

            <?php
            $no=1;
            foreach ($tampil as $row) {
             ?>

              <tr>
                <td><center><?= $no++ ?></td>
                <td><center><?= $row->tgl_pengambilan; ?></td>
                <td><center><?= $row->kode_pengambilan; ?></td>
                <td><center><?= $row->nama_masyarakat; ?></td>
                <td><center><?= $row->ulasan_pengambilan; ?></td>
              </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </div>
