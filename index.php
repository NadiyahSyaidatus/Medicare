<?php 

header("Location: landing.php");

?>

<?php
session_start();
require 'connect.php';

if(isset($_SESSION["login"])){
    header("Location: Pelanggan/produkJual.php"); // Jika sudah login, langsung masuk
    exit;
}
?>
