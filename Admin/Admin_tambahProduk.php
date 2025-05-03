<?php 

$title = 'Tambah Produk';

require 'Admin_pusatKontrol.php';
require 'Admin_header.php';

// Cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])){
    if(tambahProduk($_POST) > 0){
        echo "
            <script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'Admin_allProduk.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambahkan!');
                document.location.href = 'Admin_allProduk.php';
            </script>
        ";
    }
}

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

    <section class="section">
        <div class="row">
            <div class="">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title fw-bold text-center" style="color:rgb(88, 25, 25);">
                    Tambahkan Produk Baru
                </h5>
                    <!-- Vertical Form -->
                    <form class="row g-3" method="post" enctype="multipart/form-data">
                        <div class="col-12">
                            <label for="namaProduk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="namaProduk" name="namaProduk" required>
                        </div>

                        <div class="col-12">
                            <label for="kategoriProduk" class="form-label">Kategori Produk</label>
                            <select class="form-select" id="kategoriProduk" name="kategoriProduk" required>
                                <option value="">-- Pilih Kategori --</option>
                                <?php foreach($kategori as $k) : ?>
                                <option value="<?= $k; ?>"><?= $k; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="hargaProduk" class="form-label">Harga Produk</label>
                            <input type="number" class="form-control" id="hargaProduk" name="hargaProduk" required>
                        </div>

                        <div class="col-12">
                            <label for="stokProduk" class="form-label">Stok Produk</label>
                            <input type="number" class="form-control" id="stokProduk" name="stokProduk" required>
                        </div>

                        <div class="col-12">
                            <label for="detailProduk" class="form-label">Detail Produk</label>
                            <textarea class="form-control" id="detailProduk" name="detailProduk" required></textarea>
                            </div>

                        <div class="col-12">
                            <label for="gambarProduk" class="form-label">Gambar Produk</label>
                            <input type="file" class="form-control" id="gambarProduk" name="gambarProduk" required>
                        </div>
                        
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                        </div>
                    </form><!-- Vertical Form -->

                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->