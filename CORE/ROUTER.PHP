<?php
// Ajoutez une route avec paramètre
$router->add('user/{id}/profile', [
    'controller' => 'User',
    'action' => 'showProfile'
]);

// Route pour l'édition
$router->add('user/{id}/edit', [
    'controller' => 'User', 
    'action' => 'editProfile'
]);