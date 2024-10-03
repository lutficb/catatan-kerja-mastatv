<?php

// Fungsi untuk merubah format tanggal ke dalam format bahasa Indonesia
function formatTanggalIndo($date)
{
    // Ubah format tanggal dari Y-m-d (2021-11-22) menjadi d-m-Y (22-11-2021)
    $ubahFormat = date('d-m-Y', strtotime($date));
    // Rubah string ke dalam bentuk array
    $pecahTgl = explode('-', $ubahFormat);

    // Array nama bulan ke dalam bahasa Indonesia
    $bulan = [
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember'
    ];

    // Susun ulang string ke dalam format tgl bulan tahun, ex : 22 Nobember 2021
    return $tglBaru = $pecahTgl[0] . ' ' . $bulan[$pecahTgl[1]] . ' ' . $pecahTgl[2];
}

function formatHariIndonesia($date)
{
    $day = [
        'Sun' => 'Ahad',
        'Mon' => 'Senin',
        'Tue' => 'Selasa',
        'Wed' => 'Rabu',
        'Thu' => 'Kamis',
        'Fri' => "Jum'at",
        'Sat' => 'Sabtu',
    ];

    return $hari = $day[$date];
}

// Fungsi untuk mengambil sebagian kata dari kalimat yang diberikan
// $kalimat -> string inputan user
// $num -> jumlah kata yang ingin ditampilkan, ex : $num = 10 (Berarti yang akan ditampilkan adalah 10 kata pertama dari total kata dalam variable $kalimat)
function ringkasKalimat($kalimat, $num)
{
    return implode(' ', array_slice(explode(' ', $kalimat), 0, $num));
}
