<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">


    <div class="row">
      <div class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h1 align='center' style="margin-bottom: 30px" class="display-4">Detail Informasi </h1>

            <?php
            foreach ($tampil as $row) {
              $info = $row->id_info;
              $pengambilan = $row->kode_pengambilan;
            ?>
            <table class="table table-bordered">
              <tr>
                <td><b>Tanggal Upload</td>
                <td><?= $row->tgl_upload ?></td>
              </tr>
              <tr>
                <td><b>Judul Informasi</td>
                <td><?= $row->judul_info ?></td>
              </tr>
              <tr>
                <td><b>Isi Informasi</td>
                <td><?= $row->isi_info ?></td>
              </tr>
              <tr>
                <td><b>Kode Pengambilan</td>
                <td><?= $row->kode_pengambilan ?></td>
              </tr>
            </table>
            <?php
              }
            ?>


            <h1 align='center' style="margin-bottom: 30px;margin-top: 50px" class="display-4">Komoditi Masyarakat</h1>
            <table class="table table-bordered">
              <tr>
                <td><b>No</td>
                <td><b>Nama Komoditi</td>
              </tr>
              <?php
              $no=1;
              foreach ($kode_pengambilan as $row1) {
              ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $row1->nama_komoditi ?></td>
              </tr>
            <?php } ?>
            </table>


            <?php
            echo form_open('C_masyarakat/pengambilan_komoditi');
            ?>
            <!-- <p style="margin-top: 50px">Ulasan Pengambilan</p> -->
            <!-- <input type="hidden" name"id_masyarakat" value="<?= $ses_id ?>"> -->
            <input type="hidden" name="id_masyarakat" value="<?= $ses_id ?>" >
            <input type="hidden" name="id_info" value="<?= $info ?>">
            <input type="hidden" name="kode_pengambilan" value="<?= $pengambilan ?>">
            <input type="hidden" name="kondisi" value="Sudah Diterima">
            <input type="hidden" name="tgl_pengambilan" value="<?= date('d-m-Y') ?>">

            <?php
            if ($data_pengambilan > 0) {

              foreach ($data_pengambilan as $row) {
                $cek_kondisi = $row->kondisi;
              }
            ?>
            <p style="margin-top: 20px">Pesanan sudah diambil</p>

          <?php }else { ?>
            <textarea style="margin-top: 20px" class="form-control" placeholder="Ulasan Pengambilan Komoditi" name="ulasan_pengambilan" rows="8" cols="80"></textarea>
            <center><button style="margin-top: 20px" type="submit" class="btn btn-primary btn-sm">Submit</button>
          <?php }  ?>

          <?php
          echo form_close();
          ?>
          <center><a style="margin-top: 20px" href="<?= base_url() ?>C_masyarakat/info" class="btn btn-warning btn-sm" >Kembali</a>

          </div>
        </div>
      </div>
    </div>
