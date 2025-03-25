<?php
class AdminController {
    public function dashboard() {
        // Vérifier si l'utilisateur est connecté
        if (!isset($_SESSION['user'])) {
            header('Location: ?page=login');
            exit;
        }

        // Récupérer les données si nécessaire
        // $users = ... 
        
        require '../views/admin/dashboard.php';
