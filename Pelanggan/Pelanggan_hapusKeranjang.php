<?php 

$title = 'Hapus Keranjang';

require 'Pelanggan_pusatKontrol.php';
require 'Pelanggan_header.php';

$username = $_SESSION["username"];


// delete keranjang
if(hapusKeranjang($username) > 0) {
    echo "
        <script>
            alert('Keranjang berhasil dihapus!');
            document.location.href = 'Pelanggan_keranjangBelanja.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Keranjang gagal dihapus!');
            document.location.href = 'Pelanggan_keranjangBelanja.php';
        </script>
    ";
}


?>