<?php
require 'koneksi.php';
require 'fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$id       = (int)($_POST['id'] ?? 0);
$paket_id = (int)($_POST['paket_id'] ?? 0);
$nama     = trim($_POST['nama'] ?? '');
$hp       = trim($_POST['hp'] ?? '');
$tanggal  = $_POST['tanggal'] ?? '';
$hari     = (int)($_POST['waktu'] ?? 0);
$peserta  = (int)($_POST['peserta'] ?? 0);
$pen      = isset($_POST['penginapan']) ? 1 : 0;
$trans    = isset($_POST['transportasi']) ? 1 : 0;
$mak      = isset($_POST['makanan']) ? 1 : 0;

// validasi: semua field wajib terisi
$kosong = ($paket_id <= 0 || $nama === '' || $hp === '' || $tanggal === '' || $hari <= 0 || $peserta <= 0 || ($pen + $trans + $mak) === 0);
if ($kosong) {
    $balik = $id > 0 ? 'pemesanan.php?id=' . $id . '&pesan=kosong' : 'pemesanan.php?pesan=kosong';
    header('Location: ' . $balik);
    exit;
}

// hitung ulang di server
$harga   = hitung_harga($pen, $trans, $mak);
$tagihan = hitung_tagihan($hari, $peserta, $harga);

if ($id > 0) {
    $sql = 'UPDATE pemesanan SET paket_id=?, nama_pemesan=?, no_hp=?, tanggal_pesan=?, lama_hari=?, penginapan=?, transportasi=?, makanan=?, jumlah_peserta=?, harga_paket=?, jumlah_tagihan=? WHERE id=?';
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, 'isssiiiiiiii', $paket_id, $nama, $hp, $tanggal, $hari, $pen, $trans, $mak, $peserta, $harga, $tagihan, $id);
} else {
    $sql = 'INSERT INTO pemesanan (paket_id, nama_pemesan, no_hp, tanggal_pesan, lama_hari, penginapan, transportasi, makanan, jumlah_peserta, harga_paket, jumlah_tagihan) VALUES (?,?,?,?,?,?,?,?,?,?,?)';
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, 'isssiiiiiii', $paket_id, $nama, $hp, $tanggal, $hari, $pen, $trans, $mak, $peserta, $harga, $tagihan);
}

$ok = mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

header('Location: modifikasi.php?pesan=' . ($ok ? 'berhasil' : 'gagal'));
exit;
?>
