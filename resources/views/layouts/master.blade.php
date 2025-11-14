<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        #typing-title::after {
            content: "|";
            animation: blink 0.7s infinite;
            margin-left: 3px;
        }

        @keyframes blink {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }
    </style>

    <title>@yield('title')</title>
</head>

<body class="flex flex-col min-h-screen bg-gray-50">

    {{-- NAVBAR --}}
    <nav class="bg-white shadow-md border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

            <h1 class="text-2xl font-bold text-green-600">G_Citations</h1>

            <div class="flex items-center gap-4 text-gray-700 font-medium">

                <a href="/accueil" class="hover:text-green-600 transition">Accueil</a>
                <a href="/about" class="hover:text-green-600 transition">About</a>

                @auth
                    <a href="/citation" class="hover:text-green-600 transition">Citations</a>
                    {{-- @if (auth()->user()->role == 'admin')
                        <a href="/g-citation" class="hover:text-green-600 transition">Gestion</a>
                    @endif --}}
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="hover:text-blue-600 transition">Login</a>
                    <a href="{{ route('register') }}" class="hover:text-blue-600 transition">Register</a>
                @endguest

                @auth
                    @if (auth()->user()->role == 'admin')
                    <a href="{{ route('users') }}" class="hover:text-green-600 transition">DashAdmin</a>
                    @endif

                    @if (auth()->user()->role == 'user'|| auth()->user()->role == 'admin')
                        <a href="/citation/create" class="hover:text-green-600 transition">Ajouter</a>
                    @endif

                    <a href="{{ route('profile') }}" class="hover:text-green-600 transition">
                        <div
                            class="w-8 h-8 rounded-full bg-green-600 flex items-center justify-center text-white text-xl font-bold shadow-md">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                    </a>

                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit"
                            class="ml-3 px-3 py-1 bg-red-500 text-white rounded-lg shadow hover:bg-red-600 transition">
                            Se déconnecter
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    {{-- CONTENU PRINCIPAL --}}
    <main class="flex-grow">
        @yield('content')
        @include('messages.allMessages')
    </main>

    <footer class="bg-gray-900 text-gray-300 py-10 mt-16 border-t border-gray-700">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-10">

            <div>
                <h3 class="text-xl font-bold text-white mb-3">G_Citations</h3>
                <p class="text-gray-400 text-sm">
                    Une plateforme simple et élégante pour partager vos citations préférées.
                </p>
            </div>

            <div>
                <h3 class="text-xl font-semibold text-white mb-3">Navigation</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="/accueil" class="hover:text-green-400 transition">Accueil</a></li>
                    <li><a href="/about" class="hover:text-green-400 transition">À propos</a></li>
                    <li><a href="/citation" class="hover:text-green-400 transition">Citations</a></li>
                    <li><a href="/g-citation" class="hover:text-green-400 transition">Gestion</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-xl font-semibold text-white mb-3">Contact</h3>
                <ul class="space-y-2 text-sm">
                    <li>Email : <span class="text-gray-400">support@gcitations.com</span></li>
                    <li>Téléphone : <span class="text-gray-400">+229 01 69 69 00 78</span></li>
                    <li>Adresse : <span class="text-gray-400">Cotonou, Bénin</span></li>
                </ul>
            </div>

        </div>

        <div class="mt-10 border-t border-gray-700 pt-6 text-center text-gray-500 text-sm">
            © {{ date('Y') }} <span class="text-green-400 font-semibold">G_Citations</span>. Tous droits réservés.
        </div>
    </footer>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const text = "Bienvenue sur G_Citation";
            const speed = 80; // vitesse en ms
            let index = 0;

            function typeEffect() {
                if (index < text.length) {
                    document.getElementById("typing-title").textContent += text.charAt(index);
                    index++;
                    setTimeout(typeEffect, speed);
                }
            }

            typeEffect();
        });
    </script>

</body>

</html>
