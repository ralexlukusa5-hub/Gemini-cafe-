<?php
require_once 'db.php';
session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $error = "Veuillez remplir tous les champs.";
    } else {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password_hash'])) {
            // Authentification réussie
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_role'] = $user['role'];

            header("Location: index.php");
            exit();
        } else {
            $error = "Email ou mot de passe incorrect.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | Gemini Café</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3 { font-family: 'Playfair Display', serif; }
    </style>
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>
<body class="bg-amber-50 text-stone-900 dark:bg-slate-900 dark:text-stone-100 min-h-screen flex flex-col transition-colors duration-300">

    <div class="flex-grow flex items-center justify-center px-6 py-12">
        <div class="w-full max-w-md">
            <div class="text-center mb-10">
                <a href="index.php" class="inline-flex items-center text-amber-800 dark:text-amber-500 hover:underline mb-6 transition">
                    <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                    Retour à l'accueil
                </a>
                <h1 class="text-4xl font-black tracking-tighter uppercase italic text-amber-900 dark:text-amber-500 mb-2">Gemini Café</h1>
                <p class="text-stone-500 dark:text-stone-400">Heureux de vous revoir parmi nous</p>
            </div>

            <div class="bg-white dark:bg-slate-800 p-8 rounded-3xl shadow-xl dark:shadow-slate-950/50 border border-amber-100 dark:border-slate-700">
                
                <?php if ($error): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-6 text-sm">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="login.php" class="space-y-6">
                    <div>
                        <label for="email" class="block text-sm font-bold mb-2 uppercase tracking-wide text-stone-600 dark:text-stone-400">Email</label>
                        <div class="relative">
                            <i data-lucide="mail" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-stone-400"></i>
                            <input type="email" name="email" id="email" placeholder="votre@email.com" class="w-full pl-12 pr-4 py-3 rounded-xl border border-stone-200 dark:border-slate-600 bg-stone-50 dark:bg-slate-900 focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition" required>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between mb-2">
                            <label for="password" class="block text-sm font-bold uppercase tracking-wide text-stone-600 dark:text-stone-400">Mot de passe</label>
                            <a href="#" class="text-sm text-amber-800 dark:text-amber-500 hover:underline">Oublié ?</a>
                        </div>
                        <div class="relative">
                            <i data-lucide="lock" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-stone-400"></i>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="w-full pl-12 pr-4 py-3 rounded-xl border border-stone-200 dark:border-slate-600 bg-stone-50 dark:bg-slate-900 focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition" required>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" id="remember" class="w-4 h-4 text-amber-600 bg-stone-100 border-stone-300 rounded focus:ring-amber-500 dark:bg-slate-700 dark:border-slate-600">
                        <label for="remember" class="ml-2 text-sm text-stone-600 dark:text-stone-400">Se souvenir de moi</label>
                    </div>

                    <button type="submit" class="w-full bg-amber-800 hover:bg-amber-900 text-white font-bold py-4 rounded-xl shadow-lg shadow-amber-200/50 dark:shadow-none transition transform hover:scale-[1.02] active:scale-95">
                        Se connecter
                    </button>
                </form>

                <div class="relative my-8">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-stone-200 dark:border-slate-700"></div>
                    </div>
                    <div class="relative flex justify-center text-sm uppercase">
                        <span class="px-4 bg-white dark:bg-slate-800 text-stone-500 tracking-widest">Ou continuer avec</span>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <button class="flex items-center justify-center px-4 py-3 border border-stone-200 dark:border-slate-600 rounded-xl hover:bg-stone-50 dark:hover:bg-slate-700 transition">
                        <i data-lucide="github" class="w-5 h-5 mr-2"></i>
                        <span>Github</span>
                    </button>
                    <button class="flex items-center justify-center px-4 py-3 border border-stone-200 dark:border-slate-600 rounded-xl hover:bg-stone-50 dark:hover:bg-slate-700 transition">
                        <i data-lucide="chrome" class="w-5 h-5 mr-2 text-blue-500"></i>
                        <span>Google</span>
                    </button>
                </div>
            </div>

            <p class="text-center mt-8 text-stone-600 dark:text-stone-400">
                Pas encore de compte ? 
                <a href="signup.php" class="text-amber-800 dark:text-amber-500 font-bold hover:underline">Créer un compte</a>
            </p>
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>