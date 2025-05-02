<?php
session_start();
require 'connect.php';

if(isset($_SESSION["login"])){
    header("Location: Pelanggan/produkJual.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Medicare</title>
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .banner-image img {
      width: 100%;
      height: 25vh;
      object-fit: cover;
    }
  </style>
</head>
<body>

<!-- Header -->
<nav class="navbar navbar-expand-lg bg-danger bg-opacity-75 rounded-bottom px-4 shadow mt-0">
  <div class="container-fluid d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center">
      <img src="img/logo.png" alt="Logo Apotek" width="70" class="me-3">
      <span class="navbar-brand fw-bold fs-3 text-white">Medicare</span>
    </div>
    <div class="d-flex gap-2">
      <a href="loginPelanggan.php" class="btn btn-danger">Login</a>
      <a href="registrasiAkun.php" class="btn btn-outline-light">Register</a>
      <a href="bukuTamu.php" class="btn btn-outline-light">Guest Book</a>
    </div>
  </div>
</nav>

<!-- Banner Section -->
<section class="bg-dark text-white d-flex align-items-center justify-content-center text-center position-relative" style="height: 60vh; background: url('img/banner.jpg') no-repeat center center / cover;">
  <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.6);"></div>
  <div class="container position-relative z-2">
    <img src="img/logo.png" alt="Logo" style="width: 200px; height: 200px; margin-bottom: -50px;">
    <h1 class="display-5 fw-bold mb-1" style="margin-top: 0px;">Medicare</h1>
    <p class="lead mt-0" style="margin-top: 0;">Your One-Stop Marketplace for Quality Medical Tools and Equipment</p>
  </div>
</section>


<!-- Main Content -->
<section>
        <div class="container py-5">
            <div class="row text-center">
                <div class="col-12 mb-5">
                    <h2 class="display-4">Solusi Terbaik dari Medicare</h2>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card shadow-sm h-100 rounded-5">
                        <div class="card-body rounded-5">
                            <img src="img/medal.png" alt="Produk Terjamin Kualitasnya" class="img-fluid mb-3" width="100" height="100">
                            <h3 class="card-title">Produk Terjamin Kualitasnya</h3>
                            <p class="card-text">Semua produk berasal dari pemasok resmi dengan kualitas terjamin. Kami memastikan setiap item memenuhi standar tinggi.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card shadow-sm h-100 rounded-5">
                        <div class="card-body rounded-5">
                            <img src="img/pharmacist.png" alt="Ditinjau oleh Apoteker Berlisensi" class="img-fluid mb-3" width="100" height="100">
                            <h3 class="card-title">Ditinjau oleh Apoteker Berlisensi</h3>
                            <p class="card-text">Setiap produk telah diverifikasi oleh apoteker berpengalaman, memastikan keamanan dan kualitas untuk Anda.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card shadow-sm h-100 rounded-5">
                        <div class="card-body rounded-5">
                            <img src="img/real-time-strategy.png" alt="Stok Diperbarui Secara Real-Time" class="img-fluid mb-3" width="100" height="100">
                            <h3 class="card-title">Stok Diperbarui Secara Real-Time</h3>
                            <p class="card-text">Ketersediaan produk selalu terupdate secara real-time sehingga Anda mendapatkan informasi terkini.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card shadow-sm h-100 rounded-5">
                        <div class="card-body rounded-5">
                            <img src="img/safety.png" alt="Aman dan Terpercaya" class="img-fluid mb-3" width="100" height="100">
                            <h3 class="card-title">Aman dan Terpercaya</h3>
                            <p class="card-text">Transaksi Anda dilindungi dengan sistem keamanan terbaik, memberikan pengalaman belanja yang nyaman dan aman.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include 'footer.php'; ?>

</body>
</html>
