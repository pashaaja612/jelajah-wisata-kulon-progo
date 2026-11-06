# Jelajah Wisata Kulon Progo

Aplikasi web pemesanan paket wisata alam Kabupaten Kulon Progo, Yogyakarta.

Proyek ini dibuat untuk memenuhi tugas UTS mata kuliah Pemrograman Aplikasi Internet 2 di STT Duta Bangsa.

## Fitur

- Beranda yang menampilkan tiga paket wisata beserta gambar, deskripsi, dan destinasi.
- Informasi video wisata melalui YouTube.
- Form pemesanan paket wisata.
- Pilihan layanan penginapan, transportasi, dan makanan.
- Perhitungan otomatis harga paket dan jumlah tagihan.
- Validasi form menggunakan JavaScript dan PHP.
- Pengelolaan pesanan: melihat, mengubah, dan menghapus data.

## Aturan Perhitungan

Harga layanan:
- Penginapan: Rp1.000.000
- Transportasi: Rp1.200.000
- Makanan: Rp500.000

Rumus:
- Harga paket = total harga layanan yang dipilih.
- Jumlah tagihan = lama perjalanan × jumlah peserta × harga paket.

## Teknologi

- PHP
- MariaDB/MySQL
- HTML
- CSS
- JavaScript
- XAMPP

## Cara Menjalankan

1. Pastikan XAMPP sudah terpasang.
2. Salin folder proyek ke `C:\xampp\htdocs\wisata_uts`.
3. Jalankan Apache dan MySQL melalui XAMPP Control Panel.
4. Buka phpMyAdmin melalui `http://localhost/phpmyadmin`.
5. Buat database baru dengan nama `db_wisata`.
6. Pilih database `db_wisata`, kemudian impor file `database.sql`.
7. Pastikan konfigurasi database pada `koneksi.php` menggunakan nama database `db_wisata`.
8. Pastikan empat gambar sudah tersedia di folder `img/`.
9. Sesuaikan link video YouTube pada `video_config.php` jika diperlukan.
10. Buka aplikasi melalui `http://localhost/wisata_uts`.

## Struktur Proyek

| File/Folder | Fungsi |
|---|---|
| `index.php` | Halaman beranda dan informasi paket wisata |
| `pemesanan.php` | Form pemesanan dan pengeditan pesanan |
| `simpan.php` | Proses validasi dan penyimpanan pesanan |
| `modifikasi.php` | Menampilkan daftar pesanan |
| `hapus.php` | Menghapus pesanan |
| `koneksi.php` | Konfigurasi koneksi database |
| `fungsi.php` | Kumpulan fungsi bantuan |
| `header.php` | Bagian header dan navigasi |
| `footer.php` | Bagian footer |
| `script.js` | Perhitungan dan validasi form |
| `style.css` | Pengaturan tampilan aplikasi |
| `video_config.php` | Konfigurasi video YouTube |
| `database.sql` | Struktur tabel dan data awal database |
| `img/` | Penyimpanan gambar banner dan paket wisata |

## Gambar

Gambar yang digunakan dalam aplikasi tersedia di folder `img/`:

- `header.jpg`
- `tour_2_hari.jpg`
- `wisata_sungai.jpg`
- `camping_ground.jpg`

## Pengembang

Proyek UTS Pemrograman Aplikasi Internet 2  
STT Duta Bangsa
