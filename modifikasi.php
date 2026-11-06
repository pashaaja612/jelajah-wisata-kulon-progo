<?php
require 'koneksi.php';
require 'fungsi.php';

$judul = 'Modifikasi Pesanan';
$pesan = isset($_GET['pesan']) ? $_GET['pesan'] : '';
$data = mysqli_query($koneksi, 'SELECT p.*, w.nama_paket FROM pemesanan p LEFT JOIN paket_wisata w ON p.paket_id = w.id ORDER BY p.id DESC');
if (!$data) {
    die('Gagal mengambil data: ' . mysqli_error($koneksi));
}
include 'header.php';
?>
        <section>
            <h2>Modifikasi Pesanan</h2>
            <?php if ($pesan === 'berhasil'): ?>
                <div class="alert success">Data pemesanan berhasil disimpan.</div>
            <?php elseif ($pesan === 'hapus'): ?>
                <div class="alert success">Data pemesanan berhasil dihapus.</div>
            <?php elseif ($pesan === 'gagal'): ?>
                <div class="alert error">Data gagal disimpan.</div>
            <?php endif; ?>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>No</th><th>Paket</th><th>Nama</th><th>No HP</th><th>Tanggal</th><th>Hari</th>
                            <th>Layanan</th><th>Peserta</th><th>Harga Paket</th><th>Tagihan</th><th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (mysqli_num_rows($data) > 0): $no = 1; ?>
                        <?php while ($r = mysqli_fetch_assoc($data)): ?>
                            <?php
                            $layanan = [];
                            if ($r['penginapan'])   $layanan[] = 'Penginapan';
                            if ($r['transportasi']) $layanan[] = 'Transportasi';
                            if ($r['makanan'])      $layanan[] = 'Makanan';
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= e($r['nama_paket'] ?: '-') ?></td>
                                <td><?= e($r['nama_pemesan']) ?></td>
                                <td><?= e($r['no_hp']) ?></td>
                                <td><?= e($r['tanggal_pesan']) ?></td>
                                <td><?= e($r['lama_hari']) ?></td>
                                <td><?= e(implode(', ', $layanan)) ?></td>
                                <td><?= e($r['jumlah_peserta']) ?></td>
                                <td><?= rupiah($r['harga_paket']) ?></td>
                                <td><?= rupiah($r['jumlah_tagihan']) ?></td>
                                <td class="aksi">
                                    <a class="btn btn-sm" href="pemesanan.php?id=<?= (int)$r['id'] ?>">Edit</a>
                                    <form action="hapus.php" method="POST" onsubmit="return confirm('Yakin mau hapus pesanan ini?')">
                                        <input type="hidden" name="id" value="<?= (int)$r['id'] ?>">
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="11" class="empty">Belum ada data pemesanan.</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <p><a class="btn inline-btn" href="pemesanan.php">+ Tambah Pemesanan</a></p>
        </section>
<?php include 'footer.php'; ?>
