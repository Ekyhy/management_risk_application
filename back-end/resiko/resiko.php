<?php
class Resiko {
    private $conn;
    private $table = "resiko";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function tambah($data) {
        $skor = $data['dampak'] * $data['kemungkinan'];
        $sql = "INSERT INTO $this->table (id_penyewa, jenisBahaya, deskripsi, dampak, kemungkinan, skor, status)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("issiiis", $data['id_penyewa'], $data['jenisBahaya'], $data['deskripsi'], $data['dampak'], $data['kemungkinan'], $skor, $data['status']);
        return $stmt->execute();
    }

    public function tampil() {
        return $this->conn->query("SELECT * FROM $this->table");
    }

    public function update($id, $data) {
        $skor = $data['dampak'] * $data['kemungkinan'];
        $sql = "UPDATE $this->table SET jenisBahaya=?, deskripsi=?, dampak=?, kemungkinan=?, skor=?, status=? WHERE id_resiko=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssiiisi", $data['jenisBahaya'], $data['deskripsi'], $data['dampak'], $data['kemungkinan'], $skor, $data['status'], $id);
        return $stmt->execute();
    }

    public function hapus($id) {
        return $this->conn->query("DELETE FROM $this->table WHERE id_resiko = $id");
    }
}
?>
