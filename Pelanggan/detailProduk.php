<?php 

$title = 'Detail Produk';

require 'pusatKontrolPelanggan.php';
require 'headerPelanggan.php';

$id = $_GET["id"];

$produk = query("SELECT * FROM produk WHERE idProduk = '$id'")[0];

?>
<main id="main" class="main" style="margin-left: 0;">

<section class="section">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <h2 class="text-danger fw-bold mb-4">Detail Produk: <?= $produk["namaProduk"]; ?></h2>

            <div class="row mb-4">
                <div class="col-md-5">
                    <img src="../img/<?= $produk["gambarProduk"]; ?>" class="img-fluid rounded shadow" alt="<?= $produk["namaProduk"]; ?>">
                </div>
                <div class="col-md-7">
                    <table class="table table-borderless">
                        <tr>
                            <th class="fw-bold" style="width: 180px;">Nama Produk</th>
                            <td>: <?= $produk["namaProduk"]; ?></td>
                        </tr>
                        <tr>
                            <th class="fw-bold">Kategori Produk</th>
                            <td>: <?= $produk["kategoriProduk"]; ?></td>
                        </tr>
                        <tr>
                            <th class="fw-bold">Detail Produk</th>
                            <td>: <?= nl2br(htmlspecialchars($produk["detailProduk"])); ?></td>
                            </tr>
                        <tr>
                            <th class="fw-bold">Harga</th>
                            <td>: Rp<?= number_format($produk["hargaProduk"], 0, ',', '.'); ?></td>
                        </tr>
                        <tr>
                            <th class="fw-bold">Stok</th>
                            <td>: <?= $produk["stokProduk"]; ?></td>
                        </tr>
                    </table>

                    <div class="mt-4">
                        <a href="produkJual.php" class="btn btn-secondary px-4">Kembali</a>
                        <?php if($produk["stokProduk"] == 0): ?>
                            <button class="btn btn-danger px-4" disabled>Stok Habis</button>
                        <?php else: ?>
                            <a href="tambahKeranjang.php?idProduk=<?= $produk["idProduk"]; ?>" class="btn btn-danger px-4">Beli</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

</main>
