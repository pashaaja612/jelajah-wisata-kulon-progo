<?php
$judul = isset($judul) ? $judul : 'Jelajah Wisata Kulon Progo';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($judul) ?> | Jelajah Wisata Kulon Progo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="site-head">
        <div class="site-head-text">
            <h1>Jelajah Wisata Kulon Progo</h1>
            <p>Wisata Alam Kabupaten Kulon Progo, Yogyakarta.</p>
        </div>
        <?php
        $headerImg = 'img/header.jpg';
        foreach (['img/header.jpg'] as $kandidat) {
            $cek = gambar($kandidat);
            if (file_exists(__DIR__ . '/' . $cek)) { $headerImg = $cek; break; }
        }
        ?>
        <div class="banner">
            <img src="<?= e($headerImg) ?>" alt="Wisata Alam Kulon Progo">
        </div>
    </header>
    <nav class="navbar menu-bar">
        <div class="nav-links">
            <a href="index.php">Beranda</a>
            <a href="index.php#paket">Daftar Paket Wisata</a>
            <a href="pemesanan.php">Pemesanan</a>
            <a href="modifikasi.php">Modifikasi Pesanan</a>
        </div>
    </nav>
    <main class="container">
