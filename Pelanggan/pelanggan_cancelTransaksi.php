<?php 

$title = 'Batalkan Transaksi';

require 'Pelanggan_pusatKontrol.php';
require 'Pelanggan_header.php';

$idTransaksi = $_GET["id"];

if(batalkanTransaksi($idTransaksi) > 0){
    echo "<script>
            alert('Transaksi Berhasil Dibatalkan!');
            document.location.href = 'Pelanggan_transaksiBelanja.php';
        </script>";
} else {
    echo "<script>
            alert('Transaksi Gagal Dibatalkan!');
            document.location.href = 'Pelanggan_transaksiBelanja.php';
        </script>";
}



?>