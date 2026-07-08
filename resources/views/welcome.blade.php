<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LearnCode Academy — Modern Welcome</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- AOS Animations -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        /* Glassmorphism */
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
                <a href="{{ route('posts.index') }}" class="hover:text-blue-400 transition">CRUD Post</a>
                <a href="#" class="hover:text-blue-400 transition">Corsi</a>
                <a href="#" class="hover:text-blue-400 transition">Contatti</a>
            </nav>
        </div>
    </header>

    <!-- HERO -->
    <section class="pt-40 pb-32 bg-gradient-to-br from-blue-700 via-indigo-700 to-purple-700">
        <div class="max-w-5xl mx-auto text-center px-6" data-aos="fade-up">
            <h2 class="text-5xl font-extrabold mb-6 tracking-tight">
                Impara a programmare con stile
            </h2>

            <p class="text-xl text-gray-200 mb-10 leading-relaxed">
                Corsi moderni, progetti reali, codice pulito.
                Diventa lo sviluppatore che il mercato vuole.
            </p>

            <a href="{{ route('posts.index') }}"
                class="px-8 py-4 bg-white text-blue-700 font-semibold rounded-xl shadow-xl hover:bg-gray-200 transition">
                Entra nel Crud del Post
            </a>
        </div>
    </section>

    <!-- FEATURES -->
    <section class="py-24">
        <div class="max-w-7xl mx-auto px-6">
            <h3 class="text-4xl font-bold text-center mb-16" data-aos="fade-up">
                Cosa ti offre LearnCode Academy
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">

                <div class="glass p-10 rounded-2xl shadow-xl border border-white/10" data-aos="zoom-in">
                    <h4 class="text-2xl font-bold mb-4">Tutorial Moderni</h4>
                    <p class="text-gray-300">
                        Laravel, Flask, .NET, SQL, Tkinter, JavaScript e molto altro spiegati in modo chiaro e pratico.
                    </p>
                </div>

                <div class="glass p-10 rounded-2xl shadow-xl border border-white/10" data-aos="zoom-in"
                    data-aos-delay="150">
                    <h4 class="text-2xl font-bold mb-4">Progetti Reali</h4>
                    <p class="text-gray-300">
                        Costruisci CRUD, API, dashboard, app desktop e web complete passo dopo passo.
                    </p>
                </div>

                <div class="glass p-10 rounded-2xl shadow-xl border border-white/10" data-aos="zoom-in"
                    data-aos-delay="300">
                    <h4 class="text-2xl font-bold mb-4">Materiale Didattico</h4>
                    <p class="text-gray-300">
                        Guide annotate, esercizi, codice pronto e spiegazioni pensate per studenti e professionisti.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- CTA FINALE -->
    <section class="py-24 bg-gradient-to-r from-gray-900 to-gray-800">
        <div class="max-w-4xl mx-auto text-center px-6" data-aos="fade-up">
            <h3 class="text-4xl font-bold mb-6">Inizia il tuo percorso oggi</h3>
            <p class="text-lg text-gray-300 mb-10">
                Unisciti alla community di LearnCode Academy e costruisci il tuo futuro nel mondo dello sviluppo.
            </p>

            <a href="{{ route('blog.index') }}"
                class="px-10 py-4 bg-blue-600 text-white font-semibold rounded-xl shadow-xl hover:bg-blue-500 transition">
                Vai al Blog
            </a>
        </div>
    </section>

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