<?php
$title = 'FAQ Customer';

require 'Pelanggan_pusatKontrol.php';
require 'Pelanggan_header.php';

$username = $_SESSION["username"];

?>
<main id="main" class="main" style="margin-left: 0;">

    <div class="pagetitle">
      <h1 class="text"  style = "color :rgba(184, 48, 71, 0.73)">Frequently Asked Questions</h1>
</div><!-- End Page Title -->

<div class="container">
    <div class="row">
        <div class="col-md-5">
            <ul class="list-group">
                <li class="list-group-item">
                    <strong>Bagaimana cara membuat akun?</strong>
                    <p>Untuk membuat akun, klik tombol 'Daftar' di halaman login dan isi formulir pendaftaran dengan data yang benar. Anda akan menerima email konfirmasi setelahnya.</p>
                </li>
                <li class="list-group-item">
                    <strong>Bagaimana cara mengubah informasi akun?</strong>
                    <p>Anda dapat mengubah informasi akun dengan masuk ke akun Anda, lalu di pojok kanan atas pergi ke menu 'My Profil'. Di sana Anda bisa memperbarui informasi Anda.</p>
                </li>
                <li class="list-group-item">
                    <strong>Bagaimana cara melihat riwayat pesanan saya?</strong>
                    <p>Setelah pesanan dikonfirmasi, pesanan Anda akan masuk secara otomatis di menu Transaksi Belanja. Anda juga bisa melakukan pengecekan apakah pesanan Anda sudah dikonfirmasi oleh pihak admin.</p>
                </li>
                <li class="list-group-item">
                    <strong>Apa metode pembayaran yang tersedia?</strong>
                    <p>Kami menerima berbagai metode pembayaran seperti pembayaran di tempat dan transfer bank. Pilihan metode pembayaran dapat Anda lihat di halaman Keranjang Belanja.</p>
                </li>
                <li class="list-group-item">
                    <strong>Bagaimana cara mengajukan pengembalian barang?</strong>
                    <p>Barang yang sudah dibeli tidak bisa dikembalikan lagi, jadi pastikan barang yang Anda beli sudah sesuai dengan kebutuhan Anda.</p>
                </li>
            </ul>
        </div>
    </div>
</div>

</main><!-- End #main -->
<?php include '../footer.php'; ?>