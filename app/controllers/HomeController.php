<?php
require_once __DIR__ . '/../models/UserModel.php';

class HomeController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    // Action pour afficher la page d'accueil
    public function index() {
        $users = $this->userModel->getAllUsers();
        require_once __DIR__ . '/../views/home.php';
    }

    // Action pour afficher un utilisateur spécifique
    public function showUser($id) {
        $user = $this->userModel->getUserById($id);
        if ($user) {
            echo "Utilisateur : " . $user['name'];
        } else {
            echo "Utilisateur non trouvé.";
        }
    }
}
?>