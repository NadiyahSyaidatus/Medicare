<?php 

$title = 'Delete Produk';

require 'pusatKontrolAdmin.php';
require 'headerAdmin.php';

$idProduk = $_GET["id"];

// memanggil function deleteProduk() yang ada di pusatKontrolAdmin.php
if(deleteProduk($idProduk) > 0){
    echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'produkAdmin.php';
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
