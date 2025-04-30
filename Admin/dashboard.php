<?php 

$title = 'Dashboard';

require 'pusatKontrolAdmin.php';
require 'headerAdmin.php';

$totalTransaksiSelesai = count(query("SELECT * FROM transaksi WHERE statusPengiriman = 'Terkirim'"));
$totalTransaksiBelumSelesai = count(query("SELECT * FROM transaksi WHERE statusPengiriman = 'Dalam Perjalanan' OR statusPengiriman = 'Pending'"));
$totalTransaksiReject = count(query("SELECT * FROM transaksi WHERE statusTransaksi = 'Rejected'"));
$totalCancelTransaksi = count(query("SELECT * FROM transaksi WHERE statusTransaksi = 'Cancelled'"));
$totalProduk = count(query("SELECT * FROM produk"));
$totalGuestBook = count(query("SELECT * FROM guestbook"));
$totalCustomer = count(query("SELECT * FROM customer"));
$totalKeuangan = query("SELECT SUM(totalHarga) FROM transaksi WHERE statusPengiriman = 'Terkirim'")[0]['SUM(totalHarga)'];

?>

<style>
  .random-color {
    background-color: rgb(231, 124, 165);
    color: white;
    text-align: center;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 10px; /* Membuat sudut lebih membulat */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Memberikan bayangan */
}
.card-icon {
    background-color: rgba(255, 255, 255, 0.2);
    width: 50px;
    height: 50px;
    font-size: 24px;
    color: white;
}
</style>

<main id="main" class="main" style="margin-left: 0;">

    <div class="pagetitle">
      <h1 class="text" style="color:rgb(165, 64, 64)">Dashboard</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="container">
            <div class="row g-4"> <!-- g-4 = gap antar kartu -->
                <!-- Kartu 1 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card random-color">
                        <div class="card-body">
                            <h5 class="card-title text-white">Total Transaksi Selesai</h5>
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-bag-check"></i>
                                </div>
                            </div>
                            <h6 class="text-white mt-3"><?= $totalTransaksiSelesai; ?></h6>
                        </div>
                    </div>
                </div>

                <!-- Kartu 2 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card random-color">
                        <div class="card-body">
                            <h5 class="card-title text-white">Total Transaksi Belum Selesai</h5>
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-clock"></i>
                                </div>
                            </div>
                            <h6 class="text-white mt-3"><?= $totalTransaksiBelumSelesai; ?></h6>
                        </div>
                    </div>
                </div>

                <!-- Kartu 3 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card random-color">
                        <div class="card-body">
                            <h5 class="card-title text-white">Total Transaksi Ditolak</h5>
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-x-circle"></i>
                                </div>
                            </div>
                            <h6 class="text-white mt-3"><?= $totalTransaksiReject; ?></h6>
                        </div>
                    </div>
                </div>

                <!-- Kartu 4 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card random-color">
                        <div class="card-body">
                            <h5 class="card-title text-white">Total Transaksi Dibatalkan</h5>
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-calendar-x"></i>
                                </div>
                            </div>
                            <h6 class="text-white mt-3"><?= $totalCancelTransaksi; ?></h6>
                        </div>
                    </div>
                </div>

                <!-- Kartu 5 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card random-color">
                        <div class="card-body">
                            <h5 class="card-title text-white">Total Produk</h5>
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-box"></i>
                                </div>
                            </div>
                            <h6 class="text-white mt-3"><?= $totalProduk; ?></h6>
                        </div>
                    </div>
                </div>

                <!-- Kartu 6 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card random-color">
                        <div class="card-body">
                            <h5 class="card-title text-white">Total Guestbook</h5>
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-book"></i>
                                </div>
                            </div>
                            <h6 class="text-white mt-3"><?= $totalGuestBook; ?></h6>
                        </div>
                    </div>
                </div>

                <!-- Kartu 7 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card random-color">
                        <div class="card-body">
                            <h5 class="card-title text-white">Total Customer</h5>
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                            <h6 class="text-white mt-3"><?= $totalCustomer; ?></h6>
                        </div>
                    </div>
                </div>

                <!-- Kartu 8 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card random-color">
                        <div class="card-body">
                            <h5 class="card-title text-white">Total Pemasukan</h5>
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-currency-dollar"></i>
                                </div>
                            </div>
                            <h6 class="text-white mt-3">Rp<?= number_format($totalKeuangan, 0, ',', '.'); ?></h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
