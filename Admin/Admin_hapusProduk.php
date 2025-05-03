<?php 

$title = 'Delete Produk';

require 'Admin_pusatKontrol.php';
require 'Admin_header.php';

$idProduk = $_GET["id"];

// memanggil function deleteProduk() yang ada di pusatKontrolAdmin.php
if(deleteProduk($idProduk) > 0){
    echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'Admin_allProduk.php';
        </script>
    ";
}
else{
    echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'produkAdmin.php';
        </script>
    ";
}

?>
