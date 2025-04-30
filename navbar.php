<section id="navbar">
    <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body fixed-top rounded-5 m-3 p-3" data-bs-theme="dark">
        <div class="container-fluid align-items-center">
            <a class="navbar-brand d-flex " href="index.php">
                <img src="assets/image/pharmacy.png" alt="Logo" style="width: 30px; height: 30px; margin-right: 10px" class="d-inline-block align-text-top ms-3 my-1" />
                <span style="font-size: 1.5rem; font-weight: bold; color: white;" class="ms-2">Apotek Yupi</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <?php
                    // Mengambil nama file saat ini
                    $currentPage = basename($_SERVER['PHP_SELF']);
                    ?>

                    <li class="nav-item me-2">
                        <a class="nav-link <?php echo $currentPage == 'index.php' ? 'active' : 'text-secondary'; ?>" aria-current="page" href="index.php">
                            <i class="fas fa-home"></i> Beranda
                        </a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link <?php echo $currentPage == 'belanja.php' ? 'active' : 'text-secondary'; ?>" href="belanja.php">
                            <i class="fas fa-shopping-cart"></i> Belanja
                        </a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link position-relative <?php echo $currentPage == 'cart.php' ? 'active' : 'text-secondary'; ?>" href="cart.php?p=0">
                            <i class="fas fa-shopping-bag"></i> Keranjang
                            <span id="cart-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?php echo isset($_SESSION['cart']) ? max(0, array_sum($_SESSION['cart']) - 1) : 0; ?>
                            </span>
                        </a>
                    </li> 
                </ul>

                <ul class="navbar-nav mx-4">
                    <?php
                    if (!isset($_SESSION['log'])) {
                        echo '
                        <li><a href="register.php" class="btn btn-outline-light mx-2 rounded-5">Register</a></li>
                        <li><a href="loginPelanggan.php" class="btn btn-outline-light rounded-5">Login</a></li>
                        ';
                    } else {
                        if ($_SESSION['role'] == 'Member') {
                            echo '
                            <div class="dropdown text-end">
                                <a href="#" class="d-block text-decoration-none dropdown-toggle btn btn-outline-light mx-3 rounded-5" data-bs-toggle="dropdown" aria-expanded="false">
                                    Profile
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end text-small" style="">
                                    <li><a class="dropdown-item" href="pesanan.php">Pesanan Saya</a></li>
                                    <li><a class="dropdown-item" href="profile.php">Akun</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a href="logout.php" class="dropdown-item rounded-5">Logout</a></li>
                                </ul>
                            </div>
                            ';
                        } else {
                            echo '
                            <li><a href="admin" class="btn btn-outline-light mx-3 rounded-5">Admin</a></li>
                            <div class="dropdown text-end">
                                <a href="#" class="d-block text-decoration-none dropdown-toggle btn btn-outline-light mx-3 rounded-5" data-bs-toggle="dropdown" aria-expanded="false">
                                    Profile
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end text-small" style="">
                                    <li><a class="dropdown-item" href="pesanan.php">Pesanan Saya</a></li>
                                    <li><a class="dropdown-item" href="profile.php">Akun</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a href="logout.php" class="dropdown-item rounded-5">Logout</a></li>
                                </ul>
                            </div>
                            ';
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</section>
