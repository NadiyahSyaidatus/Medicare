<?php 

$title = 'Hapus Keranjang';

require 'pusatKontrolPelanggan.php';
require 'headerPelanggan.php';

$username = $_SESSION["username"];


// delete keranjang
if(hapusKeranjang($username) > 0) {
    echo "
        <script>
            alert('Keranjang berhasil dihapus!');
            document.location.href = 'keranjangBelanja.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Keranjang gagal dihapus!');
            document.location.href = 'keranjangBelanja.php';
        </script>
    ";
}


?>