<!-- <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
</head>
<body>
    <h1>Bienvenue, <?= htmlspecialchars($_SESSION['user']['username']) ?> !</h1>
    <p>Vous êtes connecté.</p>
    <a href="index.php?action=logout">Se déconnecter</a>
</body>
</html> -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Tableau de Bord</h1>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <p>Bienvenue, <span class="font-semibold"><?= htmlspecialchars($_SESSION['username']) ?></span> !</p>
            <a href="logout.php" class="mt-4 inline-block bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600">
                Déconnexion
            </a>
        </div>
    </div>
</body>
</html>