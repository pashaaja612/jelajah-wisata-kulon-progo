-- Jalankan file ini kalau database db_wisata SUDAH pernah diimport sebelumnya
-- (misalnya kartu di beranda masih menampilkan deskripsi lama).
-- Aman: tidak menghapus database, tabel, kolom, maupun data pemesanan.
USE db_wisata;

ALTER TABLE paket_wisata ADD COLUMN IF NOT EXISTS destinasi TEXT NULL AFTER deskripsi;

INSERT IGNORE INTO paket_wisata (id, nama_paket, deskripsi, gambar) VALUES
(1, 'Tour Package 2 Hari', '-', 'img/tour_2_hari.jpg'),
(2, 'Wisata Alam Sungai', '-', 'img/wisata_sungai.jpg'),
(3, 'Paket Camping Ground', '-', 'img/camping_ground.jpg');

UPDATE paket_wisata SET
    nama_paket = 'Tour Package 2 Hari',
    deskripsi  = 'Dua hari menjelajah alam Pegunungan Menoreh. Hari pertama di Desa Wisata Jatimulyo, Girimulyo, mengunjungi Goa Kiskendo dan Air Terjun Kembang Soka. Hari kedua di Desa Wisata Hargowilis, Kokap, menikmati pemandangan perbukitan di Kalibiru dan Bukit Cendana.',
    destinasi  = 'Destinasi:
Hari pertama (Desa Wisata Jatimulyo, Girimulyo): Goa Kiskendo dan Air Terjun Kembang Soka.
Hari kedua (Desa Wisata Hargowilis, Kokap): Kalibiru dan Bukit Cendana.',
    gambar     = 'img/tour_2_hari.jpg'
WHERE id = 1;

UPDATE paket_wisata SET
    nama_paket = 'Wisata Alam Sungai',
    deskripsi  = 'Bermain air di kawasan Desa Wisata Jatimulyo. Ekowisata Sungai Mudal bersumber dari mata air alami dengan kolam bertingkat berair jernih kebiruan, dilanjutkan ke Air Terjun Kedung Pedut yang rindang di tengah kawasan hutan Pegunungan Menoreh.',
    destinasi  = 'Destinasi:
Ekowisata Sungai Mudal, Desa Jatimulyo, Girimulyo.
Air Terjun Kedung Pedut, Desa Jatimulyo, Girimulyo.',
    gambar     = 'img/wisata_sungai.jpg'
WHERE id = 2;

UPDATE paket_wisata SET
    nama_paket = 'Paket Camping Ground',
    deskripsi  = 'Berkemah di kawasan Waduk Sermo, Desa Hargowilis, Kokap. Menikmati panorama danau yang dikelilingi perbukitan hijau dan suasana alam terbuka di area camping yang dikelola warga sekitar.',
    destinasi  = 'Lokasi:
Camp Menara Pelangi, kawasan Waduk Sermo (Sermo Tengah, Hargowilis).
Alternatif: Mengger Kemuning Waduk Sermo (Tegiri 1, Hargowilis).',
    gambar     = 'img/camping_ground.jpg'
WHERE id = 3;

SELECT id, nama_paket, deskripsi, gambar FROM paket_wisata ORDER BY id;
