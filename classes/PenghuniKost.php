<?php
require_once "Database.php";

//Merupakan anak class dari Database yang berisi Tabel PenghuniKost
class PenghuniKost extends Database {
    //membuat property encapsulation yang mendeklarasikan isi dari tabel PenghuniKost
    private $nama;
    private $nomor_kamar;
    private $durasi_sewa;
    private $user_id;

    //untuk menyambung ke database dan menginialisasi property
    public function __construct($nama = null, $nomor_kamar = null, $durasi_sewa = null,$user_id = null) {
        parent::__construct();
        $this->nama = $nama;
        $this->nomor_kamar = $nomor_kamar;
        $this->durasi_sewa = $durasi_sewa;
        $this->user_id = $user_id;
    }

    // Getter dan Setter untuk melihat property yang bersifat private
    //sehingga kita sudah melakukan visibilty property
    public function getNama() {
        return $this->nama;
    }

    public function setNama($nama) {
        $this->nama = $nama;
    }

    public function getNomorKamar() {
        return $this->nomor_kamar;
    }

    public function setNomorKamar($nomor) {
        $this->nomor_kamar = $nomor;
    }

    public function getDurasiSewa() {
        return $this->durasi_sewa;
    }

    public function setDurasiSewa($durasi) {
        $this->durasi_sewa = $durasi;
    }

    public function setUserId($id) {
    $this->user_id = $id;
    }

    //Mendeklarasikan fungsi simpan yang terhubung ke database yang memiliki akses masukan data kedalam tabel penghuni
    public function simpan() {
        $sql = "INSERT INTO penghuni (nama, nomor_kamar, durasi_sewa, user_id) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        //mengidensitfikasi bahwa element bertipe string,string,string dan integer
        $stmt->bind_param("sssi", $this->nama, $this->nomor_kamar, $this->durasi_sewa, $this->user_id);
        return $stmt->execute();
    }

    public function ambilSemua() {
        $sql = "SELECT id, nama, nomor_kamar, durasi_sewa FROM penghuni";
        $result = $this->conn->query($sql);

        $penghuni = [];
        while ($row = $result->fetch_assoc()) {
            $penghuni[] = $row;
        }
        return $penghuni;
    }
    public function hapus($id) {
        $sql = "DELETE FROM penghuni WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function editPenghuni($user_id, $nama, $nomor_kamar, $durasi_sewa, $isAdmin = false) {
    if ($isAdmin) {
        //digunakan untuk role admin agar admin dapat mengedit data sesuai id yang tertera
        $sql = "UPDATE penghuni SET nama = ?, nomor_kamar = ?, durasi_sewa = ? WHERE id = ?";
    } else {
       //digunakan untuk role penghunu agar bisa mengedit datanya sendiri
        $sql = "UPDATE penghuni SET nama = ?, nomor_kamar = ?, durasi_sewa = ? WHERE user_id = ?";
    }

    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("sssi", $nama, $nomor_kamar, $durasi_sewa, $user_id);
    return $stmt->execute();
    }



}
?>
