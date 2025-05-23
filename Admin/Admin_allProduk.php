<?php 

$title = "Daftar Produk";

require 'Admin_pusatKontrol.php';
require 'Admin_header.php';

$allProduk = query("SELECT * FROM produk ORDER BY idProduk DESC");

?>

<main id="main" class="main" style="margin-left: 0;">

    <section class="section">
      <div class="row">
        <div class="">

          <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-bold text-center" style="color:rgb(88, 25, 25);">
                    Seluruh Produk
                </h5>

                <a href="Admin_tambahProduk.php" class="btn btn-danger mb-2">Tambah Produk</a><br>
                <div class="col-md-6 mt-2 mb-2">
                  <input type="text" placeholder="Cari sesuatu di produk..." class="form-control" id="searchingTable">
                </div>

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Produk</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Detail</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($allProduk as $produk) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $produk["idProduk"]; ?></td>
                        <td><?= $produk["namaProduk"]; ?></td>
                        <td><?= $produk["kategoriProduk"]; ?></td>
                        <td><?= nl2br(htmlspecialchars($produk["detailProduk"])); ?></td>
                        <td>Rp<?= number_format($produk["hargaProduk"], 0, ',', '.'); ?></td>
                        <td><?= $produk["stokProduk"]; ?></td>
                        <td><img src="../img/<?= $produk["gambarProduk"]; ?>" width="100px"></td>
                        <td>
                            <a href="Admin_editProduk.php?id=<?= $produk["idProduk"]; ?>" class="btn btn-warning">Edit</a>
                            <a href="Admin_hapusProduk.php?id=<?= $produk["idProduk"]; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus produk <?= $produk["namaProduk"]; ?>?');">Delete</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>


</main><!-- End #main -->


