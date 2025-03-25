<?php
session_start();
require 'config/database.php';

// Routeur simple
$page = $_GET['page'] ?? 'login';

switch ($page) {
    case 'login':
        require 'controllers/AuthController.php';
        $controller = new AuthController();
        $controller->login();
        break;
        
    case 'dashboard':
        require 'controllers/AdminController.php';
        $controller = new AdminController();
        $controller->dashboard();
        break;
        
    default:
        header('Location: ?page=login');
        exit;
}