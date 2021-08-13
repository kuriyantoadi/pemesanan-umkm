<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login User</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/base/vendor.bundle.base.css">

  <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-7 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <center><img src="<?= base_url() ?>assets/images/logo.png" alt="logo">
              </div>
              <h6 class="font-weight-light"><center></h6>
                <p><center>PT. Agro Serang Berkah</p>
                <p><center>Pilih Halaman Login</p>

                <div class="form-group">
                  <a class="btn btn-primary btn-sm" href="<?= base_url() ?>C_login/user">User/Pimpinan PT Agro</a>
                  <a class="btn btn-primary btn-sm" href="<?= base_url() ?>C_login/umkm">Login UMKM</a>
                  <a class="btn btn-primary btn-sm" href="<?= base_url() ?>C_login/masyarakat">Login Masyarakat</a>
                </div>
                
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?= base_url() ?>assets/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?= base_url() ?>assets/s/off-canvas.js"></script>
  <script src="<?= base_url() ?>assets/js/hoverable-collapse.js"></script>
  <script src="<?= base_url() ?>assets/js/template.js"></script>
  <!-- endinject -->
</body>

</html>
