<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">


    <div class="row">
      <div class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h1 align='center' style="margin-bottom: 30px" class="display-4">Edit Jumlah Pemesanan Komoditi</h1>

            <?php
            echo form_open('C_umkm/pemesanan_komoditi_jumlah_up');
            foreach ($tampil as $row) {
            $harga_satuan = $row->harga_satuan;
            $harga_satuan_rp = number_format($harga_satuan,2,',','.');

            ?>

            <table class="table table-bordered">
              <tr>
                <td>Nama Komoditi</td>
                <td><?= $row->nama_komoditi ?></td>
              <tr>
                <td>Volume</td>
                <td><?= $row->volume ?></td>
              </tr>
              <tr>
                <td>Satuan</td>
                <td><?= $row->satuan_kg ?></td>
              </tr>
                <td>Harga Satuan</td>
                <td><?= 'Rp. '.$harga_satuan_rp ?></td>
              </tr>
              <tr>
                <td>Jumlah Komoditi</td>
                <td>
                  <input type="hidden" name="kode_pesanan" value="<?= $kode_pesanan ?>">
                  <input type="hidden" name="id_pemesanan" value="<?= $row->id_pemesanan ?>" >
                  <input type="hidden" name="harga_satuan" value="<?= $row->harga_satuan ?>" >
                  <input type="number" class="form-control" name="jumlah_komoditi" value="<?= $row->jumlah_komoditi ?>">
                </td>
              </tr>
            </table>
              <center style="margin-top: 20px"><button type="submit" class="btn btn-primary btn-sm">Submit</button>
              <a href="<?= base_url() ?>C_umkm/pemesanan_komoditi/<?= $kode_pesanan ?>" class="btn btn-warning btn-sm" >Kembali</a>
              <?php echo form_close();
                }
              ?>
          </div>
        </div>
      </div>
    </div>
