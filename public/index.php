<?php
require_once __DIR__ . '/../app/controllers/HomeController.php';

// Exemple de routage simple
$action = $_GET['action'] ?? 'index'; // Par défaut, afficher la page d'accueil

$controller = new HomeController();

if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    echo "Page non trouvée.";
}
?>