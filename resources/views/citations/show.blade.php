{{-- @extends('layouts.master')

@section('content')

    <h2>Liste des citations</h2>
    @if (count($citations) != 0)
        @foreach ($citations as $citation)
            <p>{{ $citation['content'] }}</p>
            <strong>{{ $citation['author'] }}</strong>
            <p><small>{{ $citation['created_at'] }}</small></p>

            <a href="/citation/{{ $citation['id'] }}/edit">Editer la citation</a>
            @include('partials.delete')
        @endforeach
    @else
        <h1>Pas de citations</h1>
        <a href="/citation/{{ $citaion->id }}/edit">Editer la citation</a>
        @include('partials.no-citation')
    @endif

@endsection --}}
@extends('layouts.master')

@section('content')

    <div class="max-w-3xl mx-auto mt-10">

        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">
            📜 Liste des citations
        </h2>

        @if (count($citations) != 0)
            @foreach ($citations as $citation)
                <div class="bg-white shadow-lg rounded-xl p-6 mb-6 border border-gray-200">

                    <p class="text-lg text-gray-700 italic">
                        “{{ $citation['content'] }}”
                    </p>

                    <div class="">
                        <p class="text-sm text-gray-500 mt-4 text-right">
                            Auteur :
                            <span class="font-semibold text-gray-800">
                                {{ $citation['author'] }}
                            </span>
                        </p>

                        <p class="text-xs text-gray-400">
                            Publié le : {{ \Carbon\Carbon::parse($citation['created_at'])->format('d/m/Y H:i') }}
                        </p>
                    </div>

                    @if (auth()->user()->role == 'admin')
                        @include('partials.delete')
                    @endif


                </div>
            @endforeach
            {{-- Pagination stylisée --}}
            <div class="mt-8 flex justify-center">
                {{ $citations->links('pagination::tailwind') }}
            </div>
        @else
            <div class="text-center">
                <h1 class="text-2xl font-bold text-gray-600">Aucune citation disponible</h1>
                @include('partials.no-citation')
            </div>
        @endif

    </div>


@endsection
