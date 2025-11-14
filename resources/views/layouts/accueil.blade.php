{{-- @extends('layouts.master')

@section('content')
    <h2>Accueil</h2>
    @foreach($citations as $citation)
        <p>{{ $citation['content'] }}</p>
        <strong>{{ $citation['author'] }}</strong>
        <p><small> {{ \Carbon\Carbon::parse($citation['created_at'])->format('d/m/Y H:i') }}</small></p>

    @endforeach
@endsection --}}

@extends('layouts.master')

@section('content')

    <div class="relative bg-gradient-to-r from-green-600 to-green-800 text-white py-20 px-6 rounded-b-3xl shadow-xl">

        {{-- <h1 id="typing-title" class="text-4xl font-extrabold text-white text-center mt-10"></h1> --}}
        <h1 class="text-4xl md:text-5xl font-extrabold text-center">
            Bienvenue sur <span class="text-yellow-300">G_Citations</span>
        </h1>

        <p class="text-center mt-4 text-lg opacity-90 max-w-2xl mx-auto">
            Découvrez les plus belles citations, partagées par la communauté.
            Inspirez-vous, partagez et explorez.
        </p>

        {{-- Petite déco en bas de la bannière --}}
        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-6 w-24 h-2 bg-white rounded-full opacity-50"></div>
    </div>



    <div class="max-w-3xl mx-auto mt-16">

        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">
            📜 Citations récentes
        </h2>

        @foreach($citations as $citation)
            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200 mb-6">

                <p class="text-lg text-gray-700 italic leading-relaxed">
                    “{{ $citation['content'] }}”
                </p>

                <div class="text-right mt-4">
                    <strong class="text-gray-800">— {{ $citation['author'] }}</strong>
                    <p class="text-xs text-gray-400">
                        {{ \Carbon\Carbon::parse($citation['created_at'])->format('d/m/Y H:i') }}
                    </p>
                </div>

            </div>
        @endforeach

    </div>

@endsection
