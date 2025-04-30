<?php 

$title = 'Transaksi Belanja';

require 'pusatKontrolPelanggan.php';
require 'headerPelanggan.php';

$username = $_SESSION["username"];
$allTransaksi = query("SELECT * FROM transaksi WHERE username = '$username' ORDER BY idTransaksi DESC");

?>
<main id="main" class="main" style="margin-left: 0;">

    <div class="pagetitle">
      <h1 class="text"  style = "color :rgb(88, 25, 25)" >Laporan Transaksi</h1>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Daftar Transaksi Anda</h5>

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Transaksi</th>
                    <th scope="col">Username</th>
                    <th scope="col">Tanggal Transaksi</th>
                    <th scope="col">Cara Bayar</th>
                    <th scope="col">Bank</th>
                    <th scope="col">Status Transaksi</th>
                    <th scope="col">Status Pengiriman</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($allTransaksi as $transaksi) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $transaksi["idTransaksi"]; ?></td>
                        <td><?= $transaksi["username"]; ?></td>
                        <td><?= $transaksi["tanggalTransaksi"]; ?></td>
                        <td><?= $transaksi["caraBayar"]; ?></td>
                        <td><?= $transaksi["bank"]; ?></td>
                        <td><?= $transaksi["statusTransaksi"]; ?></td>
                        <td><?= $transaksi["statusPengiriman"]; ?></td>
                        <td>Rp<?= number_format($transaksi["totalHarga"], 0, ',', '.'); ?></td>
                        <td>
                            <a href="detailTransaksi.php?id=<?= $transaksi["idTransaksi"]; ?>" class="btn btn-primary">Detail</a>
                            <!-- batalkan transaksi apabila status belum accepted -->
                            <?php if($transaksi["statusTransaksi"] == 'Pending') : ?>
                                <a href="batalkanTransaksi.php?id=<?= $transaksi["idTransaksi"]; ?>" class="btn btn-danger">Batalkan</a>
                            <?php elseif(($transaksi["statusTransaksi"] == 'Accepted') && ($transaksi["statusPengiriman"] != 'Terkirim')) : ?>
                                <a href="selesaikanTransaksi.php?id=<?= $transaksi["idTransaksi"]; ?>" class="btn btn-success">Terima</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</endsection><!-- End Section -->
