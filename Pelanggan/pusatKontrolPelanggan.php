<?php 

require '../connect.php';
require 'fpdf/fpdf.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';
    require 'phpmailer/src/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

// ===================== INSERT =====================
// Funtion untuk tambah produk ke keranjang

function tambahKeranjang($idProduk) {
    global $connect;

    $username = $_SESSION["username"];
    $idProduk = $idProduk;
    $jumlah = 1;

    $harga = query("SELECT hargaProduk FROM produk WHERE idProduk = '$idProduk'")[0]["hargaProduk"];

    // cek idProduk sudah ada di keranjang atau belum maka jumlah akan ditambah dan harga akan diupdate
    $cekProduk = mysqli_query($connect, "SELECT * FROM keranjang WHERE idProduk = '$idProduk' && username = '$username' && status = 'Belum Dibayar'");
    if(mysqli_num_rows($cekProduk) > 0) {
        $row = mysqli_fetch_assoc($cekProduk);
        $jumlah = $row["jumlah"] + 1;
        $totalHarga = $harga * $jumlah;
        mysqli_query($connect, "UPDATE keranjang SET jumlah = '$jumlah', harga = '$totalHarga' WHERE idProduk = '$idProduk' && username = '$username' && status = 'Belum Dibayar'");
        //mengurangi stok produk
        mysqli_query($connect, "UPDATE produk SET stokProduk = stokProduk - 1 WHERE idProduk = '$idProduk'");
        return mysqli_affected_rows($connect);
    }
    else{
        $totalHarga = $harga * $jumlah;
        $query = "INSERT INTO keranjang VALUES('', '$username', '$idProduk', '$jumlah', '$totalHarga', 'Belum Dibayar', '')";
        //mengurangi stok produk
        mysqli_query($connect, "UPDATE produk SET stokProduk = stokProduk - 1 WHERE idProduk = '$idProduk'");
        mysqli_query($connect, $query);
        return mysqli_affected_rows($connect);
    }
}

// Hapus produk dari keranjang
function hapusKeranjang($username){
    global $connect;

    //dapatkan semua jumlah produk di keranjang lalu tambahkan ke stok produk
    $allKeranjang = query("SELECT * FROM keranjang WHERE username = '$username' && status = 'Belum Dibayar'");
    foreach($allKeranjang as $keranjang) {
        $idProduk = $keranjang["idProduk"];
        $jumlah = $keranjang["jumlah"];
        mysqli_query($connect, "UPDATE produk SET stokProduk = stokProduk + '$jumlah' WHERE idProduk = '$idProduk'");
    }

    //hapus semua produk di keranjang
    $query = "DELETE FROM keranjang WHERE username = '$username' && status = 'Belum Dibayar'";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}

// ===========================================================

// function untuk checkout
function checkout($data) {
    global $connect;

    $idTransaksi = 'TRS-' . time();
    $username = $data["username"];
    $tanggalTransaksi = date("Y-m-d");
    $caraBayar = $data["caraBayar"];
    $bank = $data["bank"];
    $statusTransaksi = "Pending";
    $totalHarga = $data["totalHarga"];

    // 1. Simpan Transaksi
    $queryTransaksi = "INSERT INTO transaksi 
        VALUES('$idTransaksi', '$username', '$tanggalTransaksi', '$caraBayar', '$bank', '$statusTransaksi', '$totalHarga', 'Pending','')";
    mysqli_query($connect, $queryTransaksi);

    // 2. Update status keranjang
    $queryKeranjang = "UPDATE keranjang 
        SET status = 'Dibayar', idTransaksi='$idTransaksi' 
        WHERE username = '$username' && status = 'Belum Dibayar'";
    mysqli_query($connect, $queryKeranjang);

    // 3. Ambil data keranjang untuk invoice
    $queryItems = "SELECT produk.namaProduk, keranjang.jumlah, keranjang.harga 
                   FROM keranjang 
                   JOIN produk ON keranjang.idProduk = produk.idProduk 
                   WHERE keranjang.username = '$username' AND keranjang.idTransaksi = '$idTransaksi'";
    $resultItems = mysqli_query($connect, $queryItems);
    $items = [];
    while ($row = mysqli_fetch_assoc($resultItems)) {
        $items[] = $row;
    }

    // 4. Ambil email user
    $queryUser = "SELECT email FROM customer WHERE username = '$username'";
    $resultUser = mysqli_query($connect, $queryUser);
    $emailUser = mysqli_fetch_assoc($resultUser)["email"];

    // 5. Generate PDF
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(0,10,'INVOICE PEMBAYARAN',0,1,'C');
    $pdf->Ln(5);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,"ID Transaksi: $idTransaksi",0,1);
    $pdf->Cell(0,10,"Nama: $username",0,1);
    $pdf->Cell(0,10,"Tanggal: $tanggalTransaksi",0,1);
    $pdf->Cell(0,10,"Metode: $caraBayar via $bank",0,1);
    $pdf->Ln(5);

    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(10,10,'No',1);
    $pdf->Cell(80,10,'Produk',1);
    $pdf->Cell(30,10,'Jumlah',1);
    $pdf->Cell(50,10,'Harga',1);
    $pdf->Ln();

    $pdf->SetFont('Arial','',12);
    $no = 1;
    foreach ($items as $item) {
        $pdf->Cell(10,10,$no++,1);
        $pdf->Cell(80,10,$item['namaProduk'],1);
        $pdf->Cell(30,10,$item['jumlah'],1);
        $pdf->Cell(50,10,"Rp".number_format($item['harga'],0,',','.'),1);
        $pdf->Ln();
    }
    $pdf->Cell(120,10,'TOTAL',1);
    $pdf->Cell(50,10,"Rp".number_format($totalHarga,0,',','.'),1);

    // Simpan PDF
    $namaFile = 'invoice_' . $idTransaksi . '.pdf';
    $lokasiFile = 'invoices/' . $namaFile;
    if (!file_exists('invoices')) mkdir('invoices', 0777, true);
    $pdf->Output('F', $lokasiFile);

    // 6. Kirim email
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Atur sesuai SMTP kamu
        $mail->SMTPAuth = true;
        $mail->Username = '22082010038@student.upnjatim.ac.id'; // Ganti
        $mail->Password = 'togi mvhl ozti ulvr'; // Ganti, pakai App Password kalau Gmail
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('22082010038@student.upnjatim.ac.id', 'Medicare');
        $mail->addAddress($emailUser);
        $mail->Subject = "Invoice Pembayaran - $idTransaksi";
        $mail->Body = "Terima kasih telah berbelanja di Medicare!. Selalu cek Invoice Kamu ya!";
        $mail->addAttachment($lokasiFile);

        $mail->send();
    } catch (Exception $e) {
        error_log("Email gagal dikirim: {$mail->ErrorInfo}");
        // Tetap lanjut walau email gagal, tapi bisa return 0 jika ingin dianggap gagal total
    }

    return mysqli_affected_rows($connect);
}


// ===========================================================
// Function untuk batalkan transaksi
function batalkanTransaksi($idTransaksi){
    global $connect;

    $statusTransaksi = query("SELECT statusTransaksi FROM transaksi WHERE idTransaksi = '$idTransaksi'")[0]["statusTransaksi"];
    $username = $_SESSION["username"];

    //jika status transaksi sudah accepted maka tidak bisa dibatalkan
    if($statusTransaksi == 'Accepted') {
        return 0;
    }
    else {
        //dapatkan semua jumlah produk di keranjang lalu tambahkan ke stok produk
        $allKeranjang = query("SELECT * FROM keranjang WHERE idTransaksi = '$idTransaksi' && username = '$username' && status = 'Dibayar'");
        foreach($allKeranjang as $keranjang) {
            $idProduk = $keranjang["idProduk"];
            $jumlah = $keranjang["jumlah"];
            mysqli_query($connect, "UPDATE produk SET stokProduk = stokProduk + '$jumlah' WHERE idProduk = '$idProduk'");
        }
        //update status transaksi menjadi cancelled
        mysqli_query($connect, "UPDATE transaksi SET statusTransaksi = 'Cancelled', statusPengiriman = 'Dibatalkan' WHERE idTransaksi = '$idTransaksi' AND username = '$username'");
        //update status keranjang menjadi dibatalkan
        mysqli_query($connect, "UPDATE keranjang SET status = 'Dibatalkan' WHERE idTransaksi = '$idTransaksi'");
        return mysqli_affected_rows($connect);
    }
}

// ===========================================================
// Function untuk selesaikan transaksi
function selesaikanTransaksi($idTransaksi){
    global $connect;
    //update statusPengiriman

    $statusTransaksi = query("SELECT statusTransaksi FROM transaksi WHERE idTransaksi = '$idTransaksi'")[0]["statusTransaksi"];
    $username = $_SESSION["username"];

    //jika status transaksi sudah rejected maka tidak bisa diterima
    if($statusTransaksi == 'Rejected' || $statusTransaksi == 'Cancelled') {
        return 0;
    }
    else {
        $query = "UPDATE transaksi SET statusPengiriman = 'Terkirim' WHERE idTransaksi = '$idTransaksi' && username = '$username'";
        mysqli_query($connect, $query);
        return mysqli_affected_rows($connect);
    }
}

// Function untuk feedback
function feedback($data){
    global $connect;

    $idTransaksi = $data["idTransaksi"];
    $feedBack = htmlspecialchars($data["feedBack"]);

    $query = "UPDATE transaksi SET feedBack = '$feedBack' WHERE idTransaksi = '$idTransaksi'";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}

?>