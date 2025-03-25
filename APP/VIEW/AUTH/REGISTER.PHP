<?php
// Exemple de traitement PHP
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    
    // Validation exemple
    if (empty($username)) $errors[] = "Le nom d'utilisateur est requis";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email invalide";
    
    if (empty($errors)) {
        // Hasher le mot de passe et insérer en BDD
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        // Redirection après succès
        header('Location: login.php');
        exit();
    }
}
?>

<?php
// Exemple de traitement PHP
$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars(trim($_POST['username']));
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Validation
    if (empty($username)) $errors[] = "Le nom d'utilisateur est requis";
    if (strlen($username) < 3) $errors[] = "Le nom d'utilisateur doit contenir au moins 3 caractères";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email invalide";
    if (strlen($password) < 8) $errors[] = "Le mot de passe doit contenir au moins 8 caractères";
    if ($password !== $confirm_password) $errors[] = "Les mots de passe ne correspondent pas";
    
    if (empty($errors)) {
        // Simulation d'inscription réussie
        $success = true;
        // En réalité: insérer en base de données ici
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Plateforme</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            light: '#4f46e5',
                            DEFAULT: '#4338ca',
                            dark: '#3730a3',
                        },
                        secondary: {
                            light: '#10b981',
                            DEFAULT: '#059669',
                            dark: '#047857',
                        }
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.3s ease-in-out',
                        'slide-up': 'slideUp 0.3s ease-out'
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' }
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(10px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' }
                        }
                    }
                }
            }
        }
    </script>
    <style type="text/tailwindcss">
        @layer utilities {
            .input-focus {
                @apply ring-2 ring-primary-light border-transparent;
            }
            .btn-transition {
                @apply transition-all duration-300 ease-in-out transform hover:scale-[1.01];
            }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <?php if ($success): ?>
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg animate-fade-in" role="alert">
                <div class="flex items-center">
                    <div class="py-1">
                        <svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm-1-9V8a1 1 0 0 1 2 0v3a1 1 0 0 1-2 0zm0 4a1 1 0 1 1 2 0 1 1 0 0 1-2 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold">Inscription réussie !</p>
                        <p class="text-sm">Vous pouvez maintenant vous connecter.</p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="bg-white rounded-xl shadow-2xl overflow-hidden animate-slide-up">
            <div class="bg-primary p-6 text-center">
                <h1 class="text-2xl font-bold text-white">Créer un compte</h1>
                <p class="text-primary-200 mt-1">Rejoignez notre plateforme</p>
            </div>

            <div class="p-6 sm:p-8">
                <?php if (!empty($errors)): ?>
                    <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-lg animate-fade-in" role="alert">
                        <div class="flex items-center">
                            <div class="py-1">
                                <svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm-1-9V8a1 1 0 0 1 2 0v3a1 1 0 0 1-2 0zm0 4a1 1 0 1 1 2 0 1 1 0 0 1-2 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold">Erreurs à corriger</p>
                                <ul class="list-disc list-inside text-sm mt-1">
                                    <?php foreach ($errors as $error): ?>
                                        <li><?= htmlspecialchars($error) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <form method="POST" class="space-y-5">
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Nom d'utilisateur</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                            <input type="text" id="username" name="username" required
                                class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:input-focus placeholder-gray-400"
                                placeholder="Votre nom d'utilisateur"
                                value="<?= isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '' ?>">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Adresse email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input type="email" id="email" name="email" required
                                class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:input-focus placeholder-gray-400"
                                placeholder="exemple@domaine.com"
                                value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input type="password" id="password" name="password" required
                                class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:input-focus placeholder-gray-400"
                                placeholder="••••••••">
                        </div>
                        <p class="mt-1 text-xs text-gray-500">Minimum 8 caractères</p>
                    </div>

                    <div>
                        <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-1">Confirmer le mot de passe</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input type="password" id="confirm_password" name="confirm_password" required
                                class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:input-focus placeholder-gray-400"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <div class="flex items-center">
                        <input id="terms" name="terms" type="checkbox" required
                            class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                        <label for="terms" class="ml-2 block text-sm text-gray-700">
                            J'accepte les <a href="#" class="text-primary hover:underline">conditions d'utilisation</a>
                        </label>
                    </div>

                    <button type="submit" 
                        class="w-full bg-primary hover:bg-primary-dark text-white font-medium py-3 px-4 rounded-lg btn-transition focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                        S'inscrire
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Vous avez déjà un compte ? 
                        <a href="login.php" class="font-medium text-primary hover:text-primary-dark hover:underline">
                            Se connecter
                        </a>
                    </p>
                </div>
            </div>
        </div>

        <div class="mt-6 text-center text-xs text-gray-500">
            <p>© <?= date('Y') ?> Votre Plateforme. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>          