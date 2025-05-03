<?php 

$title = 'Tambah Keranjang';

require 'Pelanggan_pusatKontrol.php';
require 'Pelanggan_header.php';

$idProduk = $_GET["idProduk"];

// memanggil function tambahKeranjang() yang ada di pusatKontrolPelanggan.php
if(tambahKeranjang($idProduk) > 0) {
    echo "
        <script>
            alert('Produk berhasil ditambahkan ke keranjang!');
            document.location.href = 'Pelanggan_produkJual.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Produk gagal ditambahkan ke keranjang!');
            document.location.href = 'Pelanggan_produkJual.php';
        </script>
    ";
}

?>
