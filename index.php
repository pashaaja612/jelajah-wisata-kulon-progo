<?php
require 'koneksi.php';
require 'fungsi.php';
require 'video_config.php';

$judul = 'Beranda';
// tepat 3 paket wisata
$paket = mysqli_query($koneksi, 'SELECT * FROM paket_wisata ORDER BY id LIMIT 3');
include 'header.php';
?>
        <section>
            <h2>Selamat Datang</h2>
            <p>Nikmati wisata alam Kulon Progo, mulai dari mata air dan air terjun sampai panorama perbukitan
               dan waduk. Pilih paket yang kamu mau, lalu lakukan pemesanan lewat form yang tersedia.</p>
        </section>

        <section id="paket">
            <h2>Daftar Paket Wisata</h2>
            <div class="package-grid">
            <?php while ($p = mysqli_fetch_assoc($paket)): ?>
                <?php
                // baris pertama kolom destinasi = judul, sisanya = isi daftar
                $baris = preg_split('/\R/', trim((string)($p['destinasi'] ?? '')));
                $judulDestinasi = array_shift($baris);
                ?>
                <article class="card">
                    <img src="<?= e(gambar($p['gambar'])) ?>" alt="<?= e($p['nama_paket']) ?>">
                    <div class="card-body">
                        <h3><?= e($p['nama_paket']) ?></h3>
                        <p><?= e($p['deskripsi']) ?></p>
                        <?php if ($judulDestinasi !== '' && $judulDestinasi !== null): ?>
                        <div class="destinasi">
                            <strong><?= e($judulDestinasi) ?></strong>
                            <ul>
                            <?php foreach ($baris as $b): if (trim($b) === '') continue; ?>
                                <li><?= e($b) ?></li>
                            <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                        <a class="btn" href="pemesanan.php?paket=<?= (int)$p['id'] ?>">Daftar Paket</a>
                    </div>
                </article>
            <?php endwhile; ?>
            </div>
        </section>

        <section id="video">
            <h2>Video Wisata Kulon Progo</h2>
            <div class="video-grid">
            <?php foreach ($daftar_video as $v): ?>
                <?php
                $embed = youtube_embed($v['link']);
                $sampul = trim($v['gambar'] ?? '') !== '' ? gambar($v['gambar']) : '';
                $punyaSampul = $sampul !== '' && file_exists(__DIR__ . '/' . $sampul);
                $linkAsli = $embed !== '' ? str_replace('/embed/', '/watch?v=', $embed) : '';
                ?>
                <div class="video-item">
                    <h3><?= e($v['judul']) ?></h3>
                    <?php if ($punyaSampul): ?>
                        <?php if ($linkAsli !== ''): ?>
                            <a class="video-thumb" href="<?= e($linkAsli) ?>" target="_blank" rel="noopener">
                                <img src="<?= e($sampul) ?>" alt="<?= e($v['judul']) ?>">
                            </a>
                            <p class="video-ket">Klik gambar untuk menonton di YouTube.</p>
                        <?php else: ?>
                            <img class="video-thumb-img" src="<?= e($sampul) ?>" alt="<?= e($v['judul']) ?>">
                            <p class="video-kosong">Link video belum diisi. Isi di file video_config.php.</p>
                        <?php endif; ?>
                    <?php elseif ($embed !== ''): ?>
                        <div class="video">
                            <iframe src="<?= e($embed) ?>" title="<?= e($v['judul']) ?>"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                        </div>
                    <?php else: ?>
                        <p class="video-kosong">Link video belum diisi. Isi di file video_config.php.</p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
            </div>
        </section>
<?php include 'footer.php'; ?>
