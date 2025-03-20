<?php
class UserModel {
    private $db;

    public function __construct() {
        $config = require __DIR__ . '/../../config/config.php';
        $dbConfig = $config['db'];

        try {
            $dsn = "mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']}";
            $this->db = new PDO($dsn, $dbConfig['username'], $dbConfig['password']);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    // Récupérer tous les utilisateurs
    public function getAllUsers() {
        $query = "SELECT * FROM users";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer un utilisateur par son ID
    public function getUserById($id) {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>