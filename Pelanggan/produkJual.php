<?php 
$title = 'Daftar Produk';

require 'pusatKontrolPelanggan.php';
require 'headerPelanggan.php';

$allProduk = query("SELECT * FROM produk");

$kategori = array(
    "Peralatan Medis Dasar",
    "Alat Ukur dan Pemantau Kesehatan",
    "Alat Terapi dan Rehabilitasi",
    "Alat Bantu Jalan",
    "Perlengkapan Rumah Sakit",
    "Perlengkapan Medis Umum & P3K",
    "Obat dan Suplemen",
    "Perlengkapan Dokter dan Perawat",
    "lain-lain"
);
?>

<main id="main" class="main" style="margin-left: 0;">
    <div class="pagetitle">
        <h1 class="text" style="color:rgb(88, 25, 25)">Produk Medicare</h1>
    </div><!-- End Page Title -->

    <!-- live dropdown with jquery for filter kategoriProduk -->
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <p>Pilih Kategori : </p>
                <select class="form-select mb-5" id="kategoriFilter">
                    <option value="all">Semua Kategori</option>
                    <?php foreach($kategori as $k) : ?>
                    <option value="<?= $k; ?>"><?= $k; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach($allProduk as $produk) : ?>
                <div id="produk" class="col mb-4" data-kategori="<?= $produk["kategoriProduk"]; ?>">
                    <div class="card h-100">
                        <div style="height: 200px; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                            <img src="../img/<?= $produk["gambarProduk"]; ?>" class="card-img-top img-fluid" alt="<?= $produk["namaProduk"]; ?>" style="max-height: 100%; width: auto;">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= $produk["namaProduk"]; ?></h5>
                            <p class="card-text"><?= $produk["kategoriProduk"]; ?></p>
                            <p class="text-danger mb-3">Rp<?= number_format($produk["hargaProduk"], 0, ',', '.'); ?></p>
                            <div class="mt-auto">
                                <?php if($produk["stokProduk"] == 0) : ?>
                                    <a href="#" class="btn btn-danger w-100">Stok Kosong</a>
                                <?php else : ?>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                                        <a href="tambahKeranjang.php?idProduk=<?= $produk["idProduk"]; ?>" class="btn btn-danger me-md-2">Beli</a>
                                        <a href="detailProduk.php?id=<?= $produk["idProduk"]; ?>" class="btn btn-primary">Detail</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#kategoriFilter").on("change", function() {
                var selectedCategory = $(this).val();
                $(".col").each(function() {
                    var cardCategory = $(this).data("kategori");
                    var isCategoryMatch = selectedCategory === "all" || cardCategory === selectedCategory;
                    
                    if (isCategoryMatch) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>
</main>
<?php include '../footer.php'; ?>
