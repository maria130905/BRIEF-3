<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
</head>
<body>
    <h1>Liste des utilisateurs</h1>
    <ul>
        <?php foreach ($users as $user): ?>
            <li><?= htmlspecialchars($user['USERNAME']) ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>