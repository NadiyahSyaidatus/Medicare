<?php 

$title = 'Batalkan Transaksi';

require 'pusatKontrolPelanggan.php';
require 'headerPelanggan.php';

$idTransaksi = $_GET["id"];

if(batalkanTransaksi($idTransaksi) > 0){
    echo "<script>
            alert('Transaksi Berhasil Dibatalkan!');
            document.location.href = 'transaksiBelanja.php';
        </script>";
} else {
    echo "<script>
            alert('Transaksi Gagal Dibatalkan!');
            document.location.href = 'transaksiBelanja.php';
        </script>";
}



?>