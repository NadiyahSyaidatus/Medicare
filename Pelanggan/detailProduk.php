<?php 

$title = 'Detail Produk';

require 'pusatKontrolPelanggan.php';
require 'headerPelanggan.php';

$id = $_GET["id"];

$produk = query("SELECT * FROM produk WHERE idProduk = '$id'")[0];

?>
<main id="main" class="main" style="margin-left: 0;">

    <div class="pagetitle">
      <h1 class="text-danger fw-bold mb-4">Detail Produk</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h5 class="card-title text-primary mb-4">Detail Produk <?= $produk["namaProduk"]; ?></h5>

                        <!-- Vertical Form -->
                        <form class="row g-4" method="post" enctype="multipart/form-data">
                        <div class="col-12">
                                <label for="gambarProduk" class="form-label fw-bold">Gambar Produk</label><br>
                                <img src="../img/<?= $produk["gambarProduk"]; ?>" class="img-fluid rounded mb-3" style="max-width: 100%; height: auto;"><br>
                            </div>

                            <div class="col-12">
                                <label for="namaProduk" class="form-label fw-bold">Nama Produk</label>
                                <input class="form-control bg-light" id="namaProduk" name="namaProduk" readonly value="<?= $produk["namaProduk"]; ?>">
                            </div>

                            <div class="col-12">
                                <label for="kategoriProduk" class="form-label fw-bold">Kategori Produk</label>
                                <input class="form-control bg-light" id="kategoriProduk" name="kategoriProduk" readonly value="<?= $produk["kategoriProduk"]; ?>">
                            </div>

                            <div class="col-12">
                                <label for="hargaProduk" class="form-label fw-bold">Harga Produk</label>
                                <input class="form-control bg-light" id="hargaProduk" name="hargaProduk" readonly value="Rp<?= number_format($produk["hargaProduk"], 0, ',', '.'); ?>">
                            </div>

                            <div class="col-12">
                                <label for="stokProduk" class="form-label fw-bold">Stok Produk</label>
                                <input class="form-control bg-light" id="stokProduk" name="stokProduk" readonly value="<?= $produk["stokProduk"]; ?>">
                            </div>

                            <div class="text-center mt-4">
                                <a href="produkJual.php" class="btn btn-warning px-4 me-2">Kembali</a>
                                <a href="tambahKeranjang.php?idProduk=<?= $produk["idProduk"]; ?>" class="btn btn-success px-4">Beli</a>
                            </div>
                        </form><!-- Vertical Form -->

                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
