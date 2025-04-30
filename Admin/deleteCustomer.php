<?php 

$title = 'Customer';

require 'pusatKontrolAdmin.php';
require 'headerAdmin.php';

$username = $_GET["username"];

// memanggil function deleteCustomer() yang ada di pusatKontrolAdmin.php
if (deleteCustomer($username) > 0){
    echo "
        <script>
            alert('Customer berhasil dihapus!');
            document.location.href = 'viewCustomer.php';
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