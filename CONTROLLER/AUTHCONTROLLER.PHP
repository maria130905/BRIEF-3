<?php
require '../models/UserModel.php';

class AuthController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = new UserModel();
            $user = $userModel->login($_POST['email'], $_POST['password']);
            
            if ($user) {
                $_SESSION['user'] = $user;
                header('Location: ?page=dashboard');
                exit;
            } else {
                $error = "Email ou mot de passe incorrect";
            }
        }
        
        require '../views/auth/login.php';
    }
}