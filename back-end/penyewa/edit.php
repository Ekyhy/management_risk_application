<?php
include '../koneksi.php';
include 'penyewa.php';

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['id_penyewa'])) {
    $penyewa = new Penyewa($conn);

    $result = $penyewa->update(
        $data['id_penyewa'],
        $data['nama'],
        $data['username'],
        $data['email'],
        $data['noKamar']
    );

    echo json_encode([
        'status' => $result,
        'message' => $result ? 'Data berhasil diupdate' : 'Gagal update data'
    ]);
} else {
    echo json_encode([
        'status' => false,
        'message' => 'Data tidak lengkap'
    ]);
}
?>
