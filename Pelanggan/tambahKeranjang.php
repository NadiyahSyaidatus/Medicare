<?php 

$title = 'Tambah Keranjang';

require 'pusatKontrolPelanggan.php';
require 'headerPelanggan.php';

$idProduk = $_GET["idProduk"];

// memanggil function tambahKeranjang() yang ada di pusatKontrolPelanggan.php
if(tambahKeranjang($idProduk) > 0) {
    echo "
        <script>
            alert('Produk berhasil ditambahkan ke keranjang!');
            document.location.href = 'produkJual.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Produk gagal ditambahkan ke keranjang!');
            document.location.href = 'produkJual.php';
        </script>
    ";
}

?>
