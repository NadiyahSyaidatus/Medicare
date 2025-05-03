<?php 
$title = 'Daftar Produk';

require 'Pelanggan_pusatKontrol.php';
require 'Pelanggan_header.php';

$allProduk = query("SELECT * FROM produk");

$kategori = array(
    "Peralatan Medis Dasar",
    "Alat Ukur dan Pemantau Kesehatan",
    "Alat Terapi dan Rehabilitasi",
    "Perlengkapan Rumah Sakit",
    "Perlengkapan Medis Umum & P3K",
    "Obat dan Suplemen",
    "Perlengkapan Dokter dan Perawat",
    "lain-lain"
);
?>

<main id="main" class="main" style="margin-left: 0;">
    <div class="pagetitle text-center">
        <h1 class="fw-bold" style="color:rgb(88, 25, 25);">Daftar Seluruh Produk Medicare</h1>
    </div>


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

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
    <?php foreach($allProduk as $produk) : ?>
        <div id="produk" class="col mb-4" data-kategori="<?= $produk["kategoriProduk"]; ?>">
            <div class="card h-100 p-2" style="font-size: 0.9rem;">
                <div style="height: 140px; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                    <img src="../img/<?= $produk["gambarProduk"]; ?>" class="card-img-top img-fluid" alt="<?= $produk["namaProduk"]; ?>" style="max-height: 100%; width: auto;">
                </div>
                <div class="card-body d-flex flex-column">
                    <h6 class="card-title"><?= $produk["namaProduk"]; ?></h6>
                    <p class="card-text"><?= $produk["kategoriProduk"]; ?></p>
                    <p class="text-danger mb-2">Rp<?= number_format($produk["hargaProduk"], 0, ',', '.'); ?></p>
                    <div class="mt-auto">
                        <?php if($produk["stokProduk"] == 0) : ?>
                            <a href="#" class="btn btn-danger w-100 btn-sm">Stok Kosong</a>
                        <?php else : ?>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                                <a href="Pelanggan_tambahKeranjang.php?idProduk=<?= $produk["idProduk"]; ?>" class="btn btn-danger me-md-2 btn-sm">Beli</a>
                                <a href="Pelanggan_detailProduk.php?id=<?= $produk["idProduk"]; ?>" class="btn btn-secondary btn-sm">Detail</a>
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
