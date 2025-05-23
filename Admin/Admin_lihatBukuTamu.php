<?php 

$title = 'Guest Book';

require 'Admin_pusatKontrol.php';
require 'Admin_header.php';

$allGuestBook = query("SELECT * FROM guestbook ORDER BY idGuest DESC");

?>

<main id="main" class="main" style="margin-left: 0;">

    <section class="section">
      <div class="row">
        <div class="">

          <div class="card">
            <div class="card-body">
            <h5 class="card-title fw-bold text-center" style="color:rgb(88, 25, 25);">
                    Daftar Pengisi Buku Tamu
                </h5>

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Guest</th>
                    <th scope="col">Email Guest</th>
                    <th scope="col">Pesan Guest</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($allGuestBook as $guestBook) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $guestBook["namaGuest"]; ?></td>
                        <td><?= $guestBook["emailGuest"]; ?></td>
                        <td><?= $guestBook["pesanGuest"]; ?></td>
                        <td>
                            <a href="Admin_hapusBukuTamu.php?idGuest=<?= $guestBook["idGuest"]; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus pesan dari <?= $guestBook["namaGuest"]; ?>?');">Delete</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
                </table>
            </div>
          </div>
        </div>
    </div>
    </section>
</main>
