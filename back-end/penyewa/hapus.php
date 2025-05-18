<?php
include '../koneksi.php';
include 'penyewa.php';

// Ambil data JSON dari frontend
$data = json_decode(file_get_contents('php://input'), true);

// Validasi apakah ada id_penyewa
if (isset($data['id_penyewa'])) {
    $id = $data['id_penyewa'];

    $penyewa = new Penyewa($conn);
    $hasil = $penyewa->hapus($id);

    echo json_encode([
        'status' => $hasil,
        'message' => $hasil ? 'Berhasil Hapus' : 'Gagal Hapus'
    ]);
} else {
    echo json_encode([
        'status' => false,
        'message' => 'ID tidak ditemukan dalam request'
    ]);
}
?>
