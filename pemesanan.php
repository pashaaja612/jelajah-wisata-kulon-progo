<?php
require 'koneksi.php';
require 'fungsi.php';

$row = [
    'id' => '', 'paket_id' => '', 'nama_pemesan' => '', 'no_hp' => '',
    'tanggal_pesan' => '', 'lama_hari' => '', 'penginapan' => 0,
    'transportasi' => 0, 'makanan' => 0, 'jumlah_peserta' => '',
    'harga_paket' => '', 'jumlah_tagihan' => ''
];

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    $stmt = mysqli_prepare($koneksi, 'SELECT * FROM pemesanan WHERE id = ?');
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $hasil = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_assoc($hasil);
    mysqli_stmt_close($stmt);
    if (!$data) {
        header('Location: modifikasi.php');
        exit;
    }
    $row = $data;
} elseif (isset($_GET['paket'])) {
    $row['paket_id'] = (int)$_GET['paket'];
}

$paketList = [];
$qPaket = mysqli_query($koneksi, 'SELECT id, nama_paket FROM paket_wisata ORDER BY id LIMIT 3');
while ($pk = mysqli_fetch_assoc($qPaket)) {
    $paketList[] = $pk;
}

$pesan = isset($_GET['pesan']) ? $_GET['pesan'] : '';
$judul = $id > 0 ? 'Edit Pesanan' : 'Pemesanan';
include 'header.php';
?>
        <section class="form-card">
            <h2><?= $id > 0 ? 'Edit Pemesanan Paket Wisata' : 'Form Pemesanan Paket Wisata' ?></h2>
            <?php if ($pesan === 'kosong'): ?>
                <div class="alert error">Data form pemesanan harus diisi!</div>
            <?php endif; ?>

            <form action="simpan.php" method="POST" id="formPesan" onsubmit="return cekForm()">
                <input type="hidden" name="id" value="<?= e($row['id']) ?>">

                <label for="paket">Pilihan Paket Wisata:</label>
                <select id="paket" name="paket_id">
                    <option value="">-- Pilih paket --</option>
                    <?php foreach ($paketList as $pk): ?>
                        <option value="<?= (int)$pk['id'] ?>" <?= ((string)$row['paket_id'] === (string)$pk['id']) ? 'selected' : '' ?>><?= e($pk['nama_paket']) ?></option>
                    <?php endforeach; ?>
                </select>

                <label for="nama">Nama Pemesan:</label>
                <input type="text" id="nama" name="nama" value="<?= e($row['nama_pemesan']) ?>">

                <label for="hp">Nomor HP/Telp:</label>
                <input type="text" id="hp" name="hp" value="<?= e($row['no_hp']) ?>">

                <label for="tanggal">Tanggal Pesan:</label>
                <input type="date" id="tanggal" name="tanggal" value="<?= e($row['tanggal_pesan']) ?>">

                <label for="waktu">Waktu Pelaksanaan Perjalanan (hari):</label>
                <input type="number" min="1" id="waktu" name="waktu" value="<?= e($row['lama_hari']) ?>">

                <label>Pelayanan Paket Perjalanan:</label>
                <div class="check-row">
                    <label><input type="checkbox" class="layanan" name="penginapan" value="1" data-harga="1000000" <?= $row['penginapan'] ? 'checked' : '' ?>> Penginapan (Rp 1.000.000)</label>
                    <label><input type="checkbox" class="layanan" name="transportasi" value="1" data-harga="1200000" <?= $row['transportasi'] ? 'checked' : '' ?>> Transportasi (Rp 1.200.000)</label>
                    <label><input type="checkbox" class="layanan" name="makanan" value="1" data-harga="500000" <?= $row['makanan'] ? 'checked' : '' ?>> Servis/Makanan (Rp 500.000)</label>
                </div>

                <label for="peserta">Jumlah Peserta:</label>
                <input type="number" min="1" id="peserta" name="peserta" value="<?= e($row['jumlah_peserta']) ?>">

                <label for="harga">Harga Paket Perjalanan:</label>
                <input type="text" id="harga" readonly value="<?= $row['harga_paket'] !== '' ? e($row['harga_paket']) : '' ?>">

                <label for="tagihan">Jumlah Tagihan:</label>
                <input type="text" id="tagihan" readonly value="<?= $row['jumlah_tagihan'] !== '' ? e($row['jumlah_tagihan']) : '' ?>">

                <button type="submit" class="btn">Simpan</button>
                <button type="button" class="btn" onclick="hitung()">Hitung</button>
                <button type="reset" class="btn btn-danger" onclick="resetHasil()">Reset</button>
            </form>
        </section>
        <script src="script.js"></script>
<?php include 'footer.php'; ?>
