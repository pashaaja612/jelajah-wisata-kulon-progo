<?php
const HARGA_PENGINAPAN   = 1000000;
const HARGA_TRANSPORTASI = 1200000;
const HARGA_MAKANAN      = 500000;

function e($nilai) {
    return htmlspecialchars((string)$nilai, ENT_QUOTES, 'UTF-8');
}

function rupiah($angka) {
    return 'Rp ' . number_format((int)$angka, 0, ',', '.');
}

function hitung_harga($penginapan, $transportasi, $makanan) {
    $harga = 0;
    if ($penginapan)   $harga += HARGA_PENGINAPAN;
    if ($transportasi) $harga += HARGA_TRANSPORTASI;
    if ($makanan)      $harga += HARGA_MAKANAN;
    return $harga;
}

function hitung_tagihan($hari, $peserta, $harga) {
    return $hari * $peserta * $harga;
}

function youtube_embed($url) {
    $url = trim($url);
    if (preg_match('/^[A-Za-z0-9_-]{11}$/', $url)) {
        return 'https://www.youtube.com/embed/' . $url;
    }
    if (preg_match('/(?:v=|youtu\.be\/|embed\/)([A-Za-z0-9_-]{11})/', $url, $m)) {
        return 'https://www.youtube.com/embed/' . $m[1];
    }
    return '';
}

function gambar($path) {
    $info = pathinfo($path);
    $dasar = $info['dirname'] . '/' . $info['filename'];
    foreach (['jpg', 'jpeg', 'png', 'webp', 'JPG', 'JPEG', 'PNG'] as $ext) {
        if (file_exists(__DIR__ . '/' . $dasar . '.' . $ext)) {
            return $dasar . '.' . $ext;
        }
    }
    return $path;
}
?>
