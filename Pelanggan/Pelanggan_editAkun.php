<?php 

$title = 'Customer';

require 'Pelanggan_pusatKontrol.php';
require 'Pelanggan_header.php';

$username = $_GET["username"];
$customer = query("SELECT * FROM customer WHERE username = '$username'")[0];

// memanggil function updateCustomer() yang ada di pusatKontrolPelanggan.php
if(isset($_POST["submit"])){
    if(updateCustomer($_POST) > 0){
        echo "
            <script>
                alert('Customer berhasil diupdate!');
                document.location.href = 'Pelanggan_detailAkun.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Customer gagal diupdate!');
                document.location.href = 'Pelanggan_editAkun.php';
            </script>
        ";
    }
}

?>

<main id="main" class="main" style="margin-left: 0;">

    <section class="section">
        <div class="row">
            <div class="">
                <div class="card">
                    <div class="card-body">
                    <div class="pagetitle text-center">
                        <h5 class="card-title fw-bold" style="color:rgb(88, 25, 25);">
                            Edit Akun <?= $customer["username"]; ?>
                        </h5>
                    </div>
                        <form action="" method="post">
                            <div class="col-12 mt-2">
                                <label for="username" class="form-label">Username</label>
                                <input class="form-control" id="username" name="username" required readonly value="<?= $customer["username"]; ?>">
                            </div>

                            <div class="col-12 mt-2">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>

                            <div class="col-12 mt-2">
                                <label for="namaLengkap" class="form-label">nama Lengkap</label>
                                <input class="form-control" id="namaLengkap" name="namaLengkap" required value="<?= $customer["namaLengkap"]; ?>">
                            </div>

                            <input type="hidden" name="passwordOLD" value="<?= $customer["password"]; ?>">

                            <div class="col-12 mt-2">
                                <label for="email" class="form-label">E-Mail</label>
                                <input type="text" class="form-control" id="email" name="email" required value="<?= $customer["email"]; ?>">
                            </div>

                            <div class="col-12 mt-2">
                                <label for="dob" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="dob" name="dob" required value="<?= $customer["dob"]; ?>">
                            </div>

                            <div class="col-12 mt-2">
                                <label for="gender" class="form-label">Jenis Kelamin</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="male" name="gender" value="male" <?php echo ($customer["gender"] == "male") ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="female" name="gender" value="female" <?php echo ($customer["gender"] == "female") ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                            </div>

                            <div class="col-12 mt-2">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" required value="<?= $customer["alamat"]; ?>">
                            </div>

                            <div class="col-12 mt-2">
                                <label for="kota" class="form-label">Kota</label>
                                <input type="text" class="form-control" id="kota" name="kota" required value="<?= $customer["kota"]; ?>">
                            </div>

                            <div class="col-12 mt-2">
                                <label for="contact" class="form-label">Contact</label>
                                <input type="text" class="form-control" id="contact" name="contact" required pattern="[0-9]*" value="<?= $customer["contact"]; ?>">
                            </div>

                            <div class="col-12 mt-2">
                                <label for="paypalID" class="form-label">Paypal ID</label>
                                <input type="text" class="form-control" id="paypalID" name="paypalID" value="<?= $customer["paypalID"]; ?>">
                            </div>

                            <button type="submit" name="submit" class="btn btn-danger mt-3">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php include '../footer.php'; ?>


