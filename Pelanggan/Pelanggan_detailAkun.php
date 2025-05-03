<?php 

$title = 'Detail Akun';

require 'Pelanggan_pusatKontrol.php';
require 'Pelanggan_header.php';

$username = $_SESSION["username"];
$customer = query("SELECT * FROM customer WHERE username = '$username'")[0];

$tanggalLahir = strtotime($customer["dob"]);
$tanggalFormatted = date("j F Y", $tanggalLahir);

?>

<main id="main" class="main" style="margin-left: 0;">
    <div class="pagetitle text-center">
        <h1 class="fw-bold" style="color:rgb(88, 25, 25);">Detail Akun Anda</h1>
    </div>

    <section class="section">
        <div class="card p-3 shadow-lg rounded">
            <div class="card-body pt-3">
                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                    <!-- Detail Akun -->
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 fw-bold">Username</div>
                        <div class="col-lg-9 col-md-8">: <?= $customer["username"]; ?></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 fw-bold">Nama Lengkap</div>
                        <div class="col-lg-9 col-md-8">: <?= $customer["namaLengkap"]; ?></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 fw-bold">Email</div>
                        <div class="col-lg-9 col-md-8">: <?= $customer["email"]; ?></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 fw-bold">Tanggal Lahir</div>
                        <div class="col-lg-9 col-md-8">: <?= $tanggalFormatted; ?></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 fw-bold">Gender</div>
                        <div class="col-lg-9 col-md-8">: <?= $customer["gender"]; ?></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 fw-bold">Alamat</div>
                        <div class="col-lg-9 col-md-8">: <?= $customer["alamat"]; ?></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 fw-bold">Kota</div>
                        <div class="col-lg-9 col-md-8">: <?= $customer["kota"]; ?></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-4 fw-bold">Contact</div>
                        <div class="col-lg-9 col-md-8">: <?= $customer["contact"]; ?></div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 fw-bold">Paypal ID</div>
                        <div class="col-lg-9 col-md-8">: <?= $customer["paypalID"]; ?></div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Add the "Edit Akun" button here -->
    <a href="Pelanggan_editAkun.php?username=<?= $customer["username"]; ?>" class="btn btn-danger">Edit Akun</a>

<?php include '../footer.php'; ?>
