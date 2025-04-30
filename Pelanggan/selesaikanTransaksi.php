<?php 

$title = "Selesaikan Transaksi";

require 'pusatKontrolPelanggan.php';
require 'headerPelanggan.php';

$idTransaksi = $_GET["id"];

// memanggil function selesaikanTransaksi() yang ada di pusatKontrolPelanggan.php
if(selesaikanTransaksi($idTransaksi) > 0){
    echo "<script>
            alert('Transaksi Berhasil Diterima!');
            document.location.href = 'transaksiBelanja.php';
        </script>";
} else {
    echo "<script>
            alert('Transaksi Gagal Diterima!');
            document.location.href = 'transaksiBelanja.php';
        </script>";
}


?>