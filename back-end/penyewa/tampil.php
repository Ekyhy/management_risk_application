<?php
include '../koneksi.php';
include 'penyewa.php';

$penyewa = new Penyewa($conn);
$data = $penyewa->tampil();

$result = [];
while ($row = $data->fetch_assoc()) {
    $result[] = $row;
}

header('Content-Type: application/json');
echo json_encode($result);

?>


