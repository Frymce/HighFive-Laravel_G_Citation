@extends('layouts.master')

@section('content')

<div class="min-h-screen bg-gray-100 flex justify-center py-10">

    <div class="w-full max-w-3xl bg-white rounded-2xl shadow-lg p-8 border border-gray-200">

        {{-- Header du profil --}}
        <div class="flex items-center gap-6 mb-8">

            {{-- Avatar --}}
            <div class="w-24 h-24 rounded-full bg-green-600 flex items-center justify-center text-white text-3xl font-bold shadow-md">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>

            {{-- Infos principales --}}
            <div>
                <h2 class="text-3xl font-bold text-gray-800">
                    {{ auth()->user()->name }}
                    <span class="text-[20px] font-medium text-green-600 ml-1">({{ auth()->user()->role }})</span>
                </h2>

                <p class="text-gray-600">{{ auth()->user()->email }}</p>

                <p class="mt-2 text-sm text-gray-400">
                    Membre depuis : {{ auth()->user()->created_at->format('d/m/Y') }}
                </p>
            </div>
        </div>

        {{-- Séparateur --}}
        <hr class="my-6">

        {{-- Infos détaillées --}}
        <div class="space-y-5">

            <h3 class="text-xl font-semibold text-gray-800">Informations du compte</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                <div>
                    <p class="text-gray-500 text-sm">Nom</p>
                    <p class="font-medium text-gray-800">{{ auth()->user()->name }}</p>
                </div>

                <div>
                    <p class="text-gray-500 text-sm">Email</p>
                    <p class="font-medium text-gray-800">{{ auth()->user()->email }}</p>
                </div>
                
                <div>
                    <p class="text-gray-500 text-sm">Dernière mise à jour</p>
                    <p class="font-medium text-gray-800">
                        {{ auth()->user()->updated_at->format('d/m/Y H:i') }}
                    </p>
                </div>

            </div>
        </div>

        {{-- Boutons --}}
        <div class="mt-10 flex justify-between items-center">

            {{-- <a href="{{ route('edit.profile') }}"
                class="px-5 py-2.5 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                Modifier le profil
            </a> --}}

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="px-5 py-2.5 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 transition">
                    Déconnexion
                </button>
            </form>

        </div>

    </div>
</div>

@endsection
