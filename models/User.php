<?php
class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createUser($type, $username, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO users (type, username, email, password) VALUES (?, ?, ?, ?)");
        $stmt->execute([$type, $username, $email, $hashedPassword]);
        return $stmt->rowCount();
    }

    public function getUserByUsername($username) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUserProfile($username, $email, $password) {
        if (!empty($password)) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->db->prepare("UPDATE users SET email = ?, password = ? WHERE username = ?");
            $stmt->execute([$email, $hashedPassword, $username]);
        } else {
            $stmt = $this->db->prepare("UPDATE users SET email = ? WHERE username = ?");
            $stmt->execute([$email, $username]);
        }
        
        return $stmt->rowCount();
    }
}

