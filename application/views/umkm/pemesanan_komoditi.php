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
            $harga_satuan = $row->harga_satuan;
            $harga_satuan_rp = number_format($harga_satuan,2,',','.');
             ?>

              <tr>
                <td><center><?= $no++ ?></td>
                <td><center><?= $row->nama_komoditi; ?></td>
                <td><center><?= $row->volume; ?></td>
                <td><center><?= $row->satuan_kg; ?></td>
                <td><center><?= 'Rp. '. $harga_satuan_rp ?></td>
                <td><center>
                  <a href="<?php echo site_url('C_umkm/pemesanan_komoditi_tambah/'.$row->id_komoditi_agro.'/'.$kode_pesanan); ?>" class="btn btn-sm btn-primary">Tambah</a>
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
            <h1 align='center' style="margin-bottom: 30px" class="display-4">Pemesanan Komoditi <?= $kode_pesanan  ?></h1>

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
                  <center>Satuan (kg)
                </th>
                <th>
                  <center>Harga Satuan
                </th>
                <th>
                  <center>Jumlah
                </th>
                <th><center>Sub Total</th>
                <th><center>Pilihan</th>
              </tr>
            </thead>

            <?php
            $no=1;
            foreach ($tampil_pemesanan as $row) {

            $id_pemesanan = $row->id_pemesanan;
            $sub_total = $row->sub_total;

            $harga_satuan_rp = number_format($harga_satuan,2,',','.');
            $sub_total_rp = number_format($sub_total,2,',','.');
           ?>

              <tr>
                <td><center><?= $no++ ?></td>
                <td><center><?= $row->nama_komoditi; ?></td>
                <td><center><?= $row->volume; ?></td>
                <td><center><?= $row->satuan_kg; ?></td>
                <td><center><?= 'Rp. '. $harga_satuan_rp ?></td>
                <td><center><?= $row->jumlah_komoditi; ?></td>
                <td><center><?= 'Rp. '. $sub_total_rp ?></td>
                <td><center>
                  <a href="<?php echo site_url('C_umkm/pemesanan_komoditi_jumlah_hapus/'.$row->id_pemesanan.'/'.$kode_pesanan); ?>"
                    class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin menhapus data <?= $row->nama_komoditi ?> ?')">Hapus</a>
                  <a href="<?php echo site_url('C_umkm/pemesanan_komoditi_jumlah/'.$row->id_pemesanan.'/'.$kode_pesanan); ?>" class="btn btn-sm btn-primary">Jumlah</a>
                </td>
              </tr>

              <?php } ?>

              <tr>
                <td colspan="6"><b>Total</b></td>
                <td><center>
                  <?php
                  foreach ($total_sum as $row1) {
                      $total = $row1->sub_total;
                      $total_rp = number_format($total,2,',','.');
                      echo "Rp. ". $total_rp;
                  }
                  ?>
                </td>
              </tr>

            </table>
            <center style="margin-top: 20px"><a href="<?= base_url() ?>C_umkm/pemesanan_selesai/<?= $kode_pesanan.'/'.$total ?>" class="btn btn-sm btn-success" onclick="return confirm('Anda yakin pemesanan sudah selesai ?')">Seleai Pemesanan</a>
          </div>
        </div>
      </div>
    </div>
