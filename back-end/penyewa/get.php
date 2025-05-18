<?php
include '../koneksi.php';

$id = $_GET['id'];

$sql = "SELECT * FROM penyewa WHERE id_penyewa=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

echo json_encode($data);
?>
