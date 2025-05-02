<?php 

session_start();

//cek apakah username ada di database customer
$userLogin = $_SESSION["username"];
$namaLengkap = query("SELECT namaLengkap FROM customer WHERE username = '$userLogin'")[0]["namaLengkap"];
$checkLogin = query("SELECT username FROM customer WHERE username = '$userLogin'");

if (count($checkLogin) === 0) {
    header("Location: ../logout.php");
    exit;
}

// cek login
if(!isset($_SESSION["login"]) && $checkLogin > 0){
    header("Location: ../loginPelanggan.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $title; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../img/logo.png" rel="icon">
  <link href="../img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="produkJual.php" class="logo d-flex align-items-center">
        <img src="../img/logo.png" alt="">
        <span class="navbar-brand fw-bold fs-3 text-white">Medicare</span>
      </a>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <!-- Layanan Button Dropdown -->
        <li class="nav-item dropdown">
          <a class="btn btn-danger d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="me-2">Layanan</span>
            <i class="bi bi-chevron-down"></i>
          </a>
          
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="produkJual.php">
                <i class="bi bi-grid"></i> Daftar Produk
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="keranjangBelanja.php">
                <i class="bi bi-basket-fill"></i> Keranjang Belanja
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="transaksiBelanja.php">
                <i class="bi bi-file-text"></i> Transaksi Belanja
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="faqCust.php">
                <i class="bi bi-question-circle"></i> FAQ Customer
              </a>
            </li>
          </ul>
        </li>
        <!-- End Layanan Button Dropdown -->

        <!-- Profile Dropdown -->
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?= $userLogin; ?></span>
          </a><!-- End Profile Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?= $namaLengkap; ?></h6>
              <span><?= $userLogin; ?></span>
            </li>
            <li><hr class="dropdown-divider"></li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="detailAkun.php">
                <i class="bi bi-person"></i>
                <span>Profile</span>
              </a>
            </li>
            <li><hr class="dropdown-divider"></li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>
          </ul><!-- End Profile Dropdown -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>
