# Jelajah Wisata Kulon Progo

Aplikasi web pemesanan paket wisata alam Kabupaten Kulon Progo, Yogyakarta.
Dibuat untuk tugas UTS Pemrograman Aplikasi Internet 2 (STT Duta Bangsa).

## Fitur

- Beranda dengan tiga paket wisata (gambar, deskripsi, destinasi) dan bagian video YouTube
- Form pemesanan: pilihan paket, nama, nomor HP, tanggal, waktu perjalanan, layanan, jumlah peserta
- Perhitungan otomatis harga paket dan jumlah tagihan
- Validasi form (JavaScript dan PHP)
- Modifikasi pesanan: edit dan hapus

## Aturan perhitungan

- Penginapan Rp 1.000.000, Transportasi Rp 1.200.000, Makanan Rp 500.000
- Harga paket = jumlah harga layanan yang dipilih
- Jumlah tagihan = hari x jumlah peserta x harga paket

## Teknologi

PHP, MariaDB/MySQL (mysqli), HTML, CSS, JavaScript

## Cara menjalankan (XAMPP)

1. Taruh folder ini di `C:\xampp\htdocs\wisata_uts`
2. Jalankan Apache dan MySQL di XAMPP Control Panel
3. Buka `localhost/phpmyadmin`, import `database.sql`
   (kalau database `db_wisata` sudah ada dari versi lama, jalankan `update_paket.sql` saja)
4. Taruh 4 gambar (header, tour 2 hari, wisata sungai, camping) di folder `img` sesuai `img/PETUNJUK.txt`
5. Isi link video YouTube di `video_config.php`
6. Buka `localhost/wisata_uts`

## Struktur file

| File | Fungsi |
|---|---|
| index.php | Beranda, paket wisata, video |
| pemesanan.php | Form pemesanan dan edit |
| simpan.php | Validasi dan simpan data |
| modifikasi.php, hapus.php | Daftar, edit, hapus pesanan |
| koneksi.php | Koneksi database |
| fungsi.php | Fungsi bantu |
| video_config.php | Daftar link video YouTube |
| database.sql, update_paket.sql | Struktur dan data database |
