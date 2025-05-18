<?php
include '../koneksi.php';
include 'penyewa.php';

$penyewa = new Penyewa($conn);

// Hash password sebelum simpan
$hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

$data = [
    "nama" => $_POST['nama'],
    "username" => $_POST['username'],
    "email" => $_POST['email'],
    "phone" => $_POST['phone'],
    "password" => $hashedPassword, // pakai hash-nya
    "noKamar" => $_POST['noKamar'],
    "tanggalMasuk" => $_POST['tanggalMasuk'],
    "statusBayar" => $_POST['statusBayar']
];

if ($penyewa->tambah($data)) {
    echo "Berhasil tambah penyewa!";
} else {
    echo "Gagal!";
}
?>
