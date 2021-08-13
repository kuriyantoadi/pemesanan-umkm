<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sistem Pemesanan</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.png" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/bukti_pemesanan.css">
</head>
<body>
  <div class="container">
    <center>
      <img style="margin-bottom: 50px" src="<?= base_url() ?>assets/images/kop-surat.png" width="90%" alt="kop surat">
    </center>
    <?php
    foreach ($tampil_umkm as $row_umkm) {
      $umkm = $row_umkm->nama_umkm;
    }

    foreach ($tampil_kode_pesanan as $row) {
      $kode_pesanan = $row->kode_pesanan;
      $tgl_pemesanan = $row->tgl_pesan;
    }
     ?>

     <table>
       <tr>
         <td>Kepada</td>
         <td>: <?= $umkm ?></td>
       </tr>
       <tr>
         <td>Tanggal Pemesanan</td>
         <td>: <?= $tgl_pemesanan ?></td>
       </tr>
       <tr>
         <td>Kode Pemesanan</td>
         <td>: <?= $kode_pesanan ?></td>
       </tr>
     </table>

    <table style="margin-top: 30px" class="table table-bordered">
      <tr>
        <th><center>No</th>
        <th><center>Nama Komoditi</th>
        <th><center>Harga Satuan</th>
        <th><center>Volume</th>
        <th><center>Satuan kg</th>
        <th><center>Jumlah</th>
        <th><center>Sub Total</th>
      </tr>
      <?php
        $no = 1;
        foreach ($tampil_pemesanan as $row) {
      ?>
      <tr>
        <td><center><?= $no++ ?></td>
        <td><?= $row->nama_komoditi ?></td>
        <td><center><?= $row->harga_satuan ?></td>
        <td><center><?= $row->volume ?></td>
        <td><center><?= $row->satuan_kg ?></td>
        <td><center><?= $row->jumlah_komoditi ?></td>
        <td><center><?= $row->sub_total ?></td>
      </tr>
    <?php } ?>
    </table>

  </div>

  <script>
      window.print();
    </script>
