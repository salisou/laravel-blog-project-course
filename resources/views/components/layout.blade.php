<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LearnCode Academy — Modern Layout</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- AOS Animations -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        .glass {
            backdrop-filter: blur(18px);
            background: rgba(255, 255, 255, 0.15);
        }
    </style>
</head>

<body class="bg-gray-950 text-gray-100">

    <!-- NAVBAR -->
    <header class="fixed top-0 left-0 w-full glass shadow-lg z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-white tracking-wide">LearnCode Academy</h1>

            <nav class="flex gap-8 text-lg">
                <a href="/" class="hover:text-blue-400 transition">Home</a>
                <a href="{{ route('blog.index') }}" class="hover:text-blue-400 transition">Blog</a>
                <a href="#" class="hover:text-blue-400 transition">Corsi</a>
                <a href="#" class="hover:text-blue-400 transition">Contatti</a>
            </nav>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="pt-40 pb-20">
        {{ $slot }}
    </main>

    <!-- FOOTER -->
    <footer class="bg-gray-950 text-gray-400 py-8">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <p class="text-sm">© {{ date('Y') }} LearnCode Academy — Tutti i diritti riservati.</p>
        </div>
    </footer>

    <!-- AOS Script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1200
        });
    </script>

</body>

</html>