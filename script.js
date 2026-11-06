function hitung() {
    var hari = parseInt(document.getElementById('waktu').value) || 0;
    var peserta = parseInt(document.getElementById('peserta').value) || 0;
    var harga = 0;

    var cek = document.querySelectorAll('.layanan');
    for (var i = 0; i < cek.length; i++) {
        if (cek[i].checked) {
            harga += parseInt(cek[i].getAttribute('data-harga'));
        }
    }

    document.getElementById('harga').value = harga;
    document.getElementById('tagihan').value = hari * peserta * harga;
}

function resetHasil() {
    document.getElementById('harga').value = '';
    document.getElementById('tagihan').value = '';
}

function cekForm() {
    var paket = document.getElementById('paket').value;
    var nama = document.getElementById('nama').value.trim();
    var hp = document.getElementById('hp').value.trim();
    var tanggal = document.getElementById('tanggal').value;
    var waktu = document.getElementById('waktu').value;
    var peserta = document.getElementById('peserta').value;
    var layanan = document.querySelectorAll('.layanan:checked').length;

    if (paket === '' || nama === '' || hp === '' || tanggal === '' || waktu === '' || peserta === '' || layanan === 0) {
        alert('Data form pemesanan harus diisi!');
        return false;
    }

    hitung();
    return true;
}
