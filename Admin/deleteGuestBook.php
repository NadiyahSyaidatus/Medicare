<?php 

$title = 'Guest Book';

require 'pusatKontrolAdmin.php';
require 'headerAdmin.php';

$idGuest = $_GET["idGuest"];

// memanggil function deleteGuestBook() yang ada di pusatKontrolAdmin.php
if (deleteGuestBook($idGuest) > 0){
    echo "
        <script>
            alert('Guest Book berhasil dihapus!');
            document.location.href = 'viewGuestBook.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Guest Book gagal dihapus!');
            document.location.href = 'viewGuestBook.php';
        </script>
    ";
}

?>