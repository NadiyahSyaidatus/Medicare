<?php 

$title = 'Customer';

require 'Admin_pusatKontrol.php';
require 'Admin_header.php';

$username = $_GET["username"];

// memanggil function deleteCustomer() yang ada di pusatKontrolAdmin.php
if (deleteCustomer($username) > 0){
    echo "
        <script>
            alert('Customer berhasil dihapus!');
            document.location.href = 'Admin_lihatPelanggan.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Customer gagal dihapus!');
            document.location.href = 'viewCustomer.php';
        </script>
    ";
}


?>