<?php
public function showProfile($userId) {
    // 1. Demander les données au modèle
    $user = $this->userModel->getUserById($userId);

    // 2. Vérifier si l'utilisateur existe
    if (!$user) {
        // Redirection vers page 404
        $this->redirect('/not-found');
        return;
    }

    // 3. Afficher la vue avec les données
    $this->view('users/profile', ['user' => $user]);
}

public function updateProfile($userId) {
    // 1. Traitement du formulaire
    if ($this->userModel->updateUser($userId, $_POST)) {
        // 2. Redirection après succès
        $this->redirect('/user/'.$userId.'/profile?success=1');
    } else {
        // 3. Redirection après échec
        $this->redirect('/user/'.$userId.'/edit?error=update_failed');
    }
}