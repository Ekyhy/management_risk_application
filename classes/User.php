<?php
require_once "Database.php";

class User extends Database {
    public function login($username, $password) {
        //memanggil getConnection yang ada di database untuk bisa terhubung denga mysql
        $conn = $this->getConnection();
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            // menyimpan password dalam bentuk variable untuk menghindari error 
            $hashedPassword = $user['password'];

            if (password_verify($password, $hashedPassword)) {
                session_start();
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'role' => $user['role']
                ];
                return true;
            }
        }

        return false;
    }

    public function register($username, $password, $role) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $username, $hashedPassword, $role);
        if ($stmt->execute()) {
            return $this->conn->insert_id;
        }
        return false;
    }

    public function logout() {
        session_start();
        session_destroy();
    }
}
?>
