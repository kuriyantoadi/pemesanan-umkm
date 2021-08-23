<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">


    <div class="row">

      <div style="margin-top: 20px" class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h1 align='center' style="margin-bottom: 10px" class="display-4">Riwayat Konfirmasi Pesanan Komoditi</h1>
            <h1 align='center' style="margin-bottom: 30px" class="display-4">  Kode Pesanan <?= $kode_pesanan  ?></h1>

            <!-- <?= $this->session->flashdata('msg') ?> -->
            <table class="table table-bordered table-hover" id="example1">
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
                  <center>Satuan (Kg/Bks/Karung)
                </th>

                <th>
                  <center>Jumlah
                </th>
                <th><center>Kondisi</th>
              </tr>
            </thead>

            <?php
            $no=1;
            foreach ($tampil as $row) {
            $id_pemesanan = $row->id_pemesanan;
            $kode_pesanan = $row->kode_pesanan;
            $ulasan = $row->ulasan_umkm;
            $kondisi = $row->kondisi;
           ?>

              <tr>
                <td><center><?= $no++ ?></td>
                <td><center><?= $row->nama_komoditi; ?></td>
                <td><center><?= $row->volume; ?></td>
                <td><center><?= $row->satuan_kg; ?></td>
                <td><center><?= $row->jumlah_komoditi; ?></td>
                <td><center><?= $row->kondisi; ?></td>
              </tr>
            <?php } ?>
            </table>

            <h4 style="margin-top: 20px">Ulasan</h4>
            <blockquote class="blockquote">
              <?= $ulasan ?>
            </blockquote>
            <center><a class="btn btn-sm btn-warning" href="<?= base_url() ?>C_umkm/konfirmasi_pesanan">Kembali</a>
          </div>
        </div>
      </div>
  </div>
