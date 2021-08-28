<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">


    <div class="row">

      <div style="margin-top: 20px" class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h1 align='center' style="margin-bottom: 10px" class="display-4">Konfirmasi Pesanan Komoditi</h1>
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
                <th><center>Pilihan</th>
              </tr>
            </thead>

            <?php
            $no=1;
            foreach ($tampil as $row) {
            $id_pemesanan = $row->id_pemesanan;
            $kode_pesanan = $row->kode_pesanan;
            $kondisi = $row->kondisi;
           ?>

              <tr>
                <td><center><?= $no++ ?></td>
                <td><center><?= $row->nama_komoditi; ?></td>
                <td><center><?= $row->volume; ?></td>
                <td><center><?= $row->satuan_kg; ?></td>
                <td><center><?= $row->jumlah_komoditi; ?></td>
                <td><center><?= $row->kondisi; ?></td>
                <td><center>
                  <?php if ($kondisi == 'Tidak Tersedia') { ?>
                    Komoditi tidak tersedia
                  <?php }elseif ($kondisi == 'Diterima') {  ?>
                    Sudah dikonfirmasi
                  <?php }else{ ?>
                    <a href="<?php echo site_url('C_umkm/konfirmasi_pesanan_belum_diterima/'.$row->id_pemesanan.'/'.$kode_pesanan); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin komoditi <?= $row->nama_komoditi ?> belum diterima ?')">Belum diterima</a>
                    <a href="<?php echo site_url('C_umkm/konfirmasi_pesanan_diterima_up/'.$row->id_pemesanan.'/'.$kode_pesanan); ?>" class="btn btn-sm btn-primary" onclick="return confirm('Anda yakin komoditi <?= $row->nama_komoditi ?> sudah diterima ?')">Diterima</a>
                  <?php  } ?>
                </td>
              </tr>
              <?php } ?>
            </table>


            <?= form_open('C_umkm/konfirmasi_pesanan_selesai'); ?>
            <div class="form-group">
              <label for="">Berikan Ulasan</label>
              <input type="hidden" name="kode_pesanan" value="<?= $kode_pesanan ?>">
              <textarea name="ulasan_umkm" class="form-control" rows="8" cols="80"></textarea>
            </div>
            <div class="form-group"><center>
              <input type="submit" name="" class="btn btn-success btn-sm" value="Selesai Konfirmasi">
            </div>
            <?= form_close(); ?>


          </div>
        </div>
      </div>
  </div>
