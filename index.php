<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
$userName = $isLoggedIn ? $_SESSION['user_name'] : '';
?>
<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gemini Café | L'Art de l'Instant</title>
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
        .hero-bg {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&q=80&w=1920');
            background-size: cover;
            background-position: center;
        }
        #mobile-menu.hidden {
            display: none;
        }
    </style>
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>
<body class="bg-amber-50 text-stone-900 dark:bg-slate-900 dark:text-stone-100 transition-colors duration-300">

    <!-- Header / Navbar -->
    <header class="fixed w-full z-50 bg-amber-50/90 dark:bg-slate-900/90 backdrop-blur-sm border-b border-amber-100 dark:border-slate-800 shadow-sm">
        <nav class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <a href="#" class="text-2xl font-black text-amber-900 dark:text-amber-500 tracking-tighter uppercase italic">Gemini Café</a>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex space-x-8 text-sm font-semibold uppercase tracking-widest text-stone-600 dark:text-stone-400">
                    <a href="#about" class="hover:text-amber-800 dark:hover:text-amber-500 transition">À propos</a>
                    <a href="#menu" class="hover:text-amber-800 dark:hover:text-amber-500 transition">Menu</a>
                    <a href="#contact" class="hover:text-amber-800 dark:hover:text-amber-500 transition">Contact</a>
                    <?php if ($isLoggedIn): ?>
                        <span class="text-amber-800 dark:text-amber-500 font-bold">Bonjour, <?php echo htmlspecialchars($userName); ?></span>
                        <a href="logout.php" class="hover:text-amber-800 dark:hover:text-amber-500 transition">Déconnexion</a>
                    <?php else: ?>
                        <a href="login.php" class="hover:text-amber-800 dark:hover:text-amber-500 transition">Connexion</a>
                    <?php endif; ?>
                </div>

                <div class="flex items-center space-x-4">
                    <button id="theme-toggle" class="p-2 rounded-lg bg-amber-100 dark:bg-slate-800 text-amber-800 dark:text-amber-500 hover:ring-2 hover:ring-amber-300 dark:hover:ring-slate-700 transition-all">
                        <i id="theme-toggle-dark-icon" data-lucide="moon" class="hidden w-5 h-5"></i>
                        <i id="theme-toggle-light-icon" data-lucide="sun" class="hidden w-5 h-5"></i>
                    </button>

                    <a href="#menu" class="hidden md:block bg-amber-800 text-white px-6 py-2 rounded-full text-sm font-bold hover:bg-amber-900 transition">Commander</a>

                    <button id="mobile-menu-button" class="md:hidden p-2 text-stone-600 dark:text-stone-400 hover:bg-amber-100 dark:hover:bg-slate-800 rounded-lg transition">
                        <i data-lucide="menu" class="w-6 h-6"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Navigation Menu -->
            <div id="mobile-menu" class="hidden md:hidden mt-4 pb-4 space-y-4">
                <a href="#about" class="block text-sm font-semibold uppercase tracking-widest text-stone-600 dark:text-stone-400 py-2">À propos</a>
                <a href="#menu" class="block text-sm font-semibold uppercase tracking-widest text-stone-600 dark:text-stone-400 py-2">Menu</a>
                <a href="#contact" class="block text-sm font-semibold uppercase tracking-widest text-stone-600 dark:text-stone-400 py-2">Contact</a>
                <?php if ($isLoggedIn): ?>
                    <a href="logout.php" class="block text-sm font-semibold uppercase tracking-widest text-stone-600 dark:text-stone-400 py-2">Déconnexion (<?php echo htmlspecialchars($userName); ?>)</a>
                <?php else: ?>
                    <a href="login.php" class="block text-sm font-semibold uppercase tracking-widest text-stone-600 dark:text-stone-400 py-2">Connexion</a>
                <?php endif; ?>
                <a href="#menu" class="block bg-amber-800 text-white px-6 py-3 rounded-full text-center text-sm font-bold mt-4">Commander</a>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="relative h-screen flex items-center justify-center text-center text-white hero-bg">
        <div class="px-6">
            <h1 class="text-5xl md:text-7xl mb-6 leading-tight font-black">L'essence du café<br>dans chaque tasse.</h1>
            <p class="text-xl md:text-2xl mb-10 max-w-2xl mx-auto font-light text-amber-100">Découvrez un espace où le temps s'arrête et où chaque grain raconte une histoire unique.</p>
            <div class="flex flex-col md:flex-row gap-4 justify-center items-center">
                <a href="#menu" class="w-full md:w-auto bg-amber-700 hover:bg-amber-800 text-white px-8 py-4 rounded-full font-bold transition transform hover:scale-105">Explorer le Menu</a>
                <button class="w-full md:w-auto px-8 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold rounded-full shadow-lg shadow-indigo-200/50 hover:shadow-xl hover:shadow-purple-200/50 hover:-translate-y-0.5 transition-all duration-300 active:scale-95 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:ring-offset-2">
                    Découvrir l'expérience
                </button>
                <a href="#contact" class="w-full md:w-auto bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/30 text-white px-8 py-4 rounded-full font-bold transition transform hover:scale-105">Nous trouver</a>
            </div>
        </div>
    </section>

    <!-- Reste du contenu (About, Menu, etc.) -->
    <!-- ... Copier le reste du contenu de index.html ici ... -->

    <script>
      lucide.createIcons();
      const mobileMenuButton = document.getElementById('mobile-menu-button');
      const mobileMenu = document.getElementById('mobile-menu');
      mobileMenuButton.addEventListener('click', () => {
          mobileMenu.classList.toggle('hidden');
          const icon = mobileMenuButton.querySelector('i');
          if (mobileMenu.classList.contains('hidden')) { icon.setAttribute('data-lucide', 'menu'); } 
          else { icon.setAttribute('data-lucide', 'x'); }
          lucide.createIcons();
      });

      const themeToggleBtn = document.getElementById('theme-toggle');
      const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
      const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

      if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
          themeToggleLightIcon.classList.remove('hidden');
      } else {
          themeToggleDarkIcon.classList.remove('hidden');
      }

      themeToggleBtn.addEventListener('click', function() {
          themeToggleDarkIcon.classList.toggle('hidden');
          themeToggleLightIcon.classList.toggle('hidden');
          if (document.documentElement.classList.contains('dark')) {
              document.documentElement.classList.remove('dark');
              localStorage.setItem('color-theme', 'light');
          } else {
              document.documentElement.classList.add('dark');
              localStorage.setItem('color-theme', 'dark');
          }
      });
    </script>
</body>
</html>