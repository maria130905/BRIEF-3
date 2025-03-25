<!-- <!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <link href="/assets/css/style.css" rel="stylesheet">
</head>
<body>
    <div class="login-form">
        <h1>Connexion</h1>
        
        <?php if (isset($error)): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html> -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Administration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            light: '#6366f1',
                            DEFAULT: '#4f46e5',
                            dark: '#4338ca',
                        },
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(10px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
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
            .btn-hover {
                @apply transition-all duration-300 hover:bg-primary-dark hover:shadow-lg;
            }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md animate-fade-in">
        <div class="bg-white rounded-xl shadow-2xl overflow-hidden">
            <div class="bg-primary py-8 px-6 text-center">
                <h1 class="text-2xl font-bold text-white">
                    <i class="fas fa-lock mr-2"></i> Connexion Admin
                </h1>
                <p class="text-primary-200 mt-1">Accédez à votre espace sécurisé</p>
            </div>

            <div class="p-8">
                <?php if (isset($error)): ?>
                    <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-lg flex items-start">
                        <i class="fas fa-exclamation-circle text-red-500 mt-1 mr-3"></i>
                        <div>
                            <p class="font-bold">Erreur d'authentification</p>
                            <p class="text-sm"><?= htmlspecialchars($error) ?></p>
                        </div>
                    </div>
                <?php endif; ?>

                <form method="POST" class="space-y-6">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Adresse email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input type="email" id="email" name="email" required
                                class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:input-focus placeholder-gray-400"
                                placeholder="votre@email.com"
                                value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
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
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember" name="remember" type="checkbox" 
                                class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                            <label for="remember" class="ml-2 block text-sm text-gray-700">
                                Se souvenir de moi
                            </label>
                        </div>
                        <a href="#" class="text-sm text-primary hover:underline">
                            Mot de passe oublié ?
                        </a>
                    </div>

                    <button type="submit" 
                        class="w-full bg-primary text-white font-medium py-3 px-4 rounded-lg btn-hover focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                        <i class="fas fa-sign-in-alt mr-2"></i> Se connecter
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Nouveau sur la plateforme ? 
                        <a href="?page=register" class="font-medium text-primary hover:underline">
                            Créer un compte
                        </a>
                    </p>
                </div>
            </div>
        </div>

        <div class="mt-6 text-center text-xs text-gray-500">
            <p>© <?= date('Y') ?> Votre Société. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>