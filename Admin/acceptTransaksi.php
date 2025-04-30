<?php 

$title = 'Transaksi Belanja';

require 'pusatKontrolAdmin.php';
require 'headerAdmin.php';

$idTransaksi = $_GET["idTransaksi"];

// memanggil function acceptTransaksi() yang ada di pusatKontrolAdmin.php
if(acceptTransaksi($idTransaksi) > 0) {
    echo "
        <script>
            alert('Transaksi berhasil diterima!');
            document.location.href = 'viewTransaksi.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Transaksi gagal diterima!');
            document.location.href = 'viewTransaksi.php';
        </script>
    ";
}


?>