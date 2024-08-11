<?php
class Admin {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllUsers() {
        $stmt = $this->db->prepare("SELECT id, type, username, email FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateUserProfile($id, $type, $username, $email) {
        if (!empty($id)) {
            $stmt = $this->db->prepare("UPDATE users SET type = ?, username = ?, email = ? WHERE id = ?");
            $stmt->execute([$type, $username, $email, $id]);
            return $stmt->rowCount(); // Returns the number of affected rows
        } else {
            return 'ID required!';
        }
    }

    public function deleteUser($id) {
        if (!empty($id)) {
            $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->rowCount(); // Returns the number of affected rows
        } else {
            return 'ID required!';
        }
    }
    
    
}

