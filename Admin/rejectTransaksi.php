<?php 

$title = 'Transaksi Belanja';

require 'pusatKontrolAdmin.php';
require 'headerAdmin.php';

$idTransaksi = $_GET["idTransaksi"];

// memanggil function rejectTransaksi() yang ada di pusatKontrolAdmin.php
if(rejectTransaksi($idTransaksi) > 0) {
    echo "
        <script>
            alert('Transaksi berhasil ditolak!');
            document.location.href = 'transaksiBelanja.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Transaksi gagal ditolak!');
            document.location.href = 'transaksiBelanja.php';
        </script>
    ";
}

?>