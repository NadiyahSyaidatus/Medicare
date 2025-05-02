<?php 

$title = 'Buku Tamu';
require 'connect.php';

// memanggil function addGuestBook

if(isset($_POST["kirim"])){
    if(addGuestBook($_POST) > 0){
        echo "
            <script>
                alert('Pesan berhasil dikirim!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Pesan gagal dikirim!');
                document.location.href = 'index.php';
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
<style>
    body, html {
      background-color: rgb(255, 219, 231) !important;
      height: 100%;
    }
  </style>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $title; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="img/logo.png" rel="icon">
  <link href="img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
<!-- Header -->
<nav class="navbar navbar-expand-lg bg-danger bg-opacity-75 rounded-bottom px-4 shadow mt-0">
  <div class="container-fluid d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center">
      <img src="img/logo.png" alt="Logo Apotek" width="70" class="me-3">
      <span class="navbar-brand fw-bold fs-3 text-white">Medicare</span>
    </div>
    <div class="d-flex gap-2">
      <a href="loginPelanggan.php" class="btn btn-danger">Login</a>
      <a href="registrasiAkun.php" class="btn btn-outline-light">Register</a>
      <a href="guestBook.php" class="btn btn-outline-light">Guest Book</a>
    </div>
  </div>
</nav>
    <div class="card pt-3">
        <div class="card-body">
                <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4" style="color: rgb(88, 25, 25);">Buku Tamu</h5>
                    <p class="text-center small">Berikan Kesan dan Pesan anda kepada kami!</p>
                  </div>
            <!-- Vertical Form -->
            <form class="row g-3" method="POST">
                <div class="col-12">
                    <label for="namaGuest" class="form-label" style="margin-top: 10;">Nama Lengkap</label>
                    <input type="text" class="form-control" id="namaGuest" name="namaGuest" required>
                </div>
                <div class="col-12">
                    <label for="emailGuest" class="form-label">Email</label>
                    <input type="email" class="form-control" id="emailGuest" name="emailGuest" required>
                </div>
                <div class="col-12">
                    <label for="pesanGuest" class="form-label">Pesan</label>
                    <textarea name="pesanGuest" id="pesanGuest" cols="30" rows="10" required></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" name="kirim" class="btn" style = "background-color:rgb(165, 64, 64); color: white;">Submit</button>
                </div>
            </form><!-- Vertical Form -->

            </div>
            <div class="col-12">
            <p class="small mb-0">Apakah anda pelanggan? <a href="loginPelanggan.php" class="text-primary">Login Pelanggan</a></p>
            <p class="small mb-0">Tidak memiliki akun? <a href="registrasiAkun.php" class="text-primary">Buat akun baru</a></p>
            </div>
          </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
  $('#pesanGuest').summernote({
    placeholder: 'Masukkan pesan anda disini...',
    tabsize: 0,
    height: 300,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['view', ['fullscreen', 'codeview', 'help']]
    ]
  });
</script>