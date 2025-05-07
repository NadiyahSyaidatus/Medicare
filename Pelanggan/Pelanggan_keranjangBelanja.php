<?php 

$title = 'Keranjang Belanja';

require 'Pelanggan_pusatKontrol.php';
require 'Pelanggan_header.php';

$username = $_SESSION["username"];
$allKeranjang = query("SELECT * FROM keranjang JOIN produk ON keranjang.idProduk = produk.idProduk WHERE username = '$username' && status = 'Belum Dibayar'");

// memanggil function checkout() yang ada di pusatKontrolPelanggan.php
if(isset($_POST["submit"])) {
    if(checkout($_POST) > 0) {
        echo "
            <script>
                alert('Checkout berhasil!');
                document.location.href = 'Pelanggan_transaksiBelanja.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Checkout gagal!');
                document.location.href = 'Pelanggan_produkJual.php';
            </script>
        ";
    }
}

$totalHarga = query("SELECT SUM(harga) AS totalHarga FROM keranjang WHERE username = '$username' && status = 'Belum Dibayar'")[0]["totalHarga"];

?>
<main id="main" class="main" style="margin-left: 0;">


<div class="pagetitle text-center">
    <h1 class="fw-bold" style="color:rgb(88, 25, 25);">Keranjang Anda</h1>
</div>

<section class="section">
<div class="row">
<div class="col-12">

          <div class="card">
            <div class="card-body">

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID dan Nama Produk</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total Harga</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($allKeranjang as $keranjang) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $keranjang["idProduk"]; ?> - <?= $keranjang["namaProduk"]; ?></td>
                        <td><?= $keranjang["jumlah"]; ?></td>
                        <td>Rp<?= number_format($keranjang["harga"], 0, ',', '.') ?></td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="3">Total Harga</td>
                        <td>Rp<?= number_format($totalHarga, 0, ',', '.'); ?></td>
                    </tr>
                </tbody>
              </table>
              <!-- End Default Table Example -->
              <form action="" method="post">
                <input type="hidden" name="username" value="<?= $username; ?>">
                <input type="hidden" name="totalHarga" value="<?= $totalHarga; ?>">
                <label for="pembayaran" class="mb-2">Pembayaran</label>
                <br>
                <input type="radio" class="form-check-input" value="Prepaid" name="caraBayar" id="prepaid" checked> Prepaid
                <input type="radio" class="form-check-input" value="Postpaid" name="caraBayar" id="postpaid"> Postpaid
                <br>

                <div id="bankSelection">
                    <select name="bank" class="form-select" id="bankSelect" required>
                        <option value="">-- Pilih Metode Pembayaran --</option>
                        <option value="BCA">BCA</option>
                        <option value="BNI">BNI</option>
                        <option value="BRI">BRI</option>
                        <option value="Mandiri">Mandiri</option>
                    </select>
                </div>

                <div id="codOption" style="display:none;">
                    <select name="bank" class="form-select" id="codSelect">
                        <option value="Bayar Ditempat">Bayar Ditempat</option>
                    </select>
                </div>
                <br>

                
                <button type="submit" class="btn btn-danger" name="submit">Checkout</button>
                    <button class="btn btn-secondary" onclick="return confirm('Apakah anda yakin ingin menghapus semua produk di keranjang?')">
                        <a href="Pelanggan_hapusKeranjang.php" style="color: white; text-decoration: none;">Hapus Keranjang</a>
                    </button>
                
            </form>
            </div>
          </div>
        </div><!-- End Col -->
    </div><!-- End Row -->
</section><!-- End Section -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const prepaidRadio = document.getElementById('prepaid');
        const postpaidRadio = document.getElementById('postpaid');
        const bankSelection = document.getElementById('bankSelection');
        const codOption = document.getElementById('codOption');
        const bankSelect = document.getElementById('bankSelect');
        const codSelect = document.getElementById('codSelect');

        function updatePaymentOptions() {
            if (postpaidRadio.checked) {
                bankSelection.style.display = 'none';
                codOption.style.display = 'block';
                bankSelect.removeAttribute('required');
                codSelect.setAttribute('required', 'required');
                bankSelect.disabled = true;
                codSelect.disabled = false;
            } else {
                bankSelection.style.display = 'block';
                codOption.style.display = 'none';
                bankSelect.setAttribute('required', 'required');
                codSelect.removeAttribute('required');
                bankSelect.disabled = false;
                codSelect.disabled = true;
            }
        }

        // Add event listeners
        prepaidRadio.addEventListener('change', updatePaymentOptions);
        postpaidRadio.addEventListener('change', updatePaymentOptions);

        // Initialize on page load
        updatePaymentOptions();
    });
</script>
<?php include '../footer.php'; ?>



