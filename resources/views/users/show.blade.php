@extends('layouts.master')

@section('content')

    <div class="min-h-screen bg-gray-50 py-10 px-6">

        {{-- Titre principal --}}

        <div class="max-w-6xl mx-auto flex text-center justify-center">
            <div class="max-w-6xl mx-auto mb-10">
                <h2 class="text-4xl font-extrabold text-gray-900 tracking-wide">
                    🛠️ Gestion des utilisateurs
                </h2>
                <p class="text-gray-600 mt-1">Liste complète des comptes enregistrés dans le système.</p>
            </div>
        </div>

        {{-- Si utilisateurs --}}
        @if (count($users) > 0)
            <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                @foreach ($users as $user)
                    <div
                        class="bg-white rounded-2xl border border-gray-200 shadow-sm hover:shadow-xl transition transform hover:-translate-y-1 p-6">

                        {{-- Avatar auto généré --}}
                        <div class="flex items-center gap-4 mb-4">
                            <div
                                class="w-14 h-14 bg-gradient-to-br from-blue-600 to-blue-400 rounded-full flex items-center justify-center text-white text-xl font-bold shadow">
                                {{ strtoupper(substr($user['name'], 0, 1)) }}
                            </div>

                            <div>
                                <h3 class="text-xl font-semibold text-gray-800">
                                    {{ $user['name'] }}
                                </h3>
                                <p class="text-gray-500 text-sm">ID : {{ $user['id'] }}</p>
                            </div>
                        </div>

                        <div class="mt-3 space-y-2">

                            <p class="text-gray-700">
                                <span class="font-semibold">Email :</span><br>
                                <span class="text-blue-600">{{ $user['email'] }}</span>
                            </p>

                            <p class="text-gray-700 text-sm">
                                <span class="font-semibold">Créé le :</span>
                                {{ \Carbon\Carbon::parse($user['created_at'])->format('d/m/Y H:i') }}
                            </p>

                        </div>

                        <div class="mt-6 flex justify-between items-center">

                            {{-- <a href="/user/{{ $user['id'] }}/edit"
                                class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 hover:shadow-lg transition">
                                Modifier
                            </a> --}}

                            <form action="/users/{{ $user['id'] }}/edit" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="role" onchange="this.form.submit()"
                                    class="px-3 py-1 text-[18px] font-medium rounded-full bg-yellow-100 text-purple-700 ring-1 ring-purple-200">
                                    <option value="admin" {{ $user['role'] === 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="user" {{ $user['role'] === 'user' ? 'selected' : '' }}>Editor</option>
                                    <option value="lecteur" {{ $user['role'] === 'lecteur' ? 'selected' : '' }}>Lector</option>
                                </select>
                            </form>


                            {{-- Bouton supprimer optionnel --}}
                            {{--
                        <form action="/user/{{ $user['id'] }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 text-white px-3 py-2 rounded-lg hover:bg-red-700 hover:shadow-lg">
                                🗑️ Désactiver
                            </button>
                        </form>
                        --}}
                        </div>

                    </div>
                @endforeach

            </div>
        @else
            <div class="max-w-3xl mx-auto bg-yellow-100 border border-yellow-300 text-yellow-800 p-6 rounded-xl shadow">
                Aucun utilisateur trouvé.
            </div>
        @endif

    </div>

@endsection
