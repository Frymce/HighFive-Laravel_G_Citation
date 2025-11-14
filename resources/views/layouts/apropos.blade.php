@extends('layouts.master')

@section('content')

<div class="min-h-screen bg-gray-50 py-12 px-6">

    <div class="max-w-4xl mx-auto bg-white shadow-xl rounded-3xl p-10 border border-gray-200">

        <h2 class="text-4xl font-extrabold text-gray-900 mb-6 text-center">
            À propos de <span class="text-green-600">G_Citation</span>
        </h2>

        <p class="text-gray-700 leading-relaxed text-lg mb-6">
            Bienvenue sur <strong>G_Citation</strong>, une plateforme moderne conçue pour permettre à chacun
            de partager, découvrir et gérer facilement des citations inspirantes.
            Nous croyons que les mots ont le pouvoir de transformer, de motiver et d’éduquer.
        </p>

        <p class="text-gray-700 leading-relaxed text-lg mb-6">
            Que vous soyez un passionné de littérature, un entrepreneur en quête de motivation ou simplement
            quelqu’un qui aime partager de belles pensées, <strong>G_Citation</strong> est fait pour vous.
        </p>

        <div class="bg-green-50 border border-green-200 p-6 rounded-2xl mb-10 shadow-sm">
            <h3 class="text-2xl font-bold text-green-700 mb-3">💡 Notre mission</h3>
            <p class="text-gray-700">
                Offrir un espace simple, rapide et élégant pour partager les mots qui vous touchent.
                Nous voulons créer une communauté où chaque citation trouve sa place et peut inspirer les autres.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="p-6 bg-gray-100 rounded-xl shadow hover:shadow-lg transition">
                <h4 class="text-xl font-semibold text-gray-800 mb-2">🎯 Simplicité</h4>
                <p class="text-gray-600 text-sm">
                    Une interface claire, intuitive, pensée pour tous.
                </p>
            </div>

            <div class="p-6 bg-gray-100 rounded-xl shadow hover:shadow-lg transition">
                <h4 class="text-xl font-semibold text-gray-800 mb-2">⚡ Rapidité</h4>
                <p class="text-gray-600 text-sm">
                    Naviguez, publiez et gérez vos citations en un clic.
                </p>
            </div>

            <div class="p-6 bg-gray-100 rounded-xl shadow hover:shadow-lg transition">
                <h4 class="text-xl font-semibold text-gray-800 mb-2">🌍 Partage</h4>
                <p class="text-gray-600 text-sm">
                    Une communauté qui partage le pouvoir des mots.
                </p>
            </div>

        </div>

        <div class="mt-10 text-center">
            <a href="/citation"
                class="px-6 py-3 bg-green-600 text-white rounded-full font-semibold shadow hover:bg-green-700 transition">
                Explorer les citations
            </a>
        </div>

    </div>

</div>

@endsection
