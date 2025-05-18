<?php
class Penyewa {
    private $conn;
    private $table = "penyewa";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function tambah($data) {
    $sql = "INSERT INTO penyewa (nama, username, email, phone, password, noKamar, tanggalMasuk, statusBayar)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param(
        "sssssssi",
        $data['nama'],
        $data['username'],
        $data['email'],
        $data['phone'],
        $data['password'], // hashed password
        $data['noKamar'],
        $data['tanggalMasuk'],
        $data['statusBayar']
    );
    return $stmt->execute();
}

    public function tampil() {
        $result = $this->conn->query("SELECT * FROM $this->table");
        return $result;
    }

    public function update($id, $nama, $username, $email, $noKamar) {
    $sql = "UPDATE penyewa SET nama=?, username=?, email=?, noKamar=? WHERE id_penyewa=?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ssssi", $nama, $username, $email, $noKamar, $id);
    return $stmt->execute();
}


    public function hapus($id)
{
    $query = "DELETE FROM penyewa WHERE id_penyewa = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("i", $id);

    return $stmt->execute();
}

}
?>
