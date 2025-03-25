<!-- <!DOCTYPE html>
<html>
<head>
    <title>Tableau de bord</title>
</head>
<body>
    <h1>Bienvenue <?= $_SESSION['user']['username'] ?>!</h1>
    <p>Vous êtes connecté en tant qu'administrateur</p>
    <a href="?page=logout">Déconnexion</a>
</body>
</html> -->
<?php
// Vérification de session au début du fichier
if (!isset($_SESSION['user'])) {
    header('Location: ?page=login');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .logout-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 8px 16px;
            background: #dc3545;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .logout-btn:hover {
            background: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenue <?= htmlspecialchars($_SESSION['user']['username'] ?? 'Administrateur') ?> !</h1>
        <p>Vous êtes connecté en tant qu'administrateur</p>
        
        <a href="?page=logout" class="logout-btn">Déconnexion</a>
        
        <!-- Section sécurisée - exemple de contenu admin -->
        <section style="margin-top: 30px;">
            <h2>Fonctionnalités administrateur</h2>
            <ul>
                <li>Gestion des utilisateurs</li>
                <li>Visualisation des statistiques</li>
                <li>Configuration du système</li>
            </ul>
        </section>
    </div>
</body>
</html>