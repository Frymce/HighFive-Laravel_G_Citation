@extends('layouts.master')

@section('title')
    Formulaire de création d'une blague
@endsection

@section('content')
<div class="max-w-4xl mx-auto py-10 px-4">

    {{-- Formulaire --}}
    <div class="bg-white shadow-md rounded-lg p-6 mb-10 border border-gray-200">
        <h2 class="text-2xl font-bold mb-4 text-gray-700">Ajouter une blague</h2>
        <form action="/blagues/create" enctype="multipart/form-data" method="POST">
            @csrf
            @include('partials.blague_form')
        </form>
    </div>

    {{-- Tableau des blagues --}}
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 shadow-md rounded-lg">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="py-3 px-4 border-b">Blagues</th>
                    <th class="py-3 px-4 border-b">Auteur</th>
                    <th class="py-3 px-4 border-b">Date</th>
                    <th class="py-3 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if ($blagues)
                    @foreach ($blagues as $blague)
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 border-b">{{ $blague['content'] }}</td>
                            <td class="py-2 px-4 border-b">{{ $blague['author'] }}</td>
                            <td class="py-2 px-4 border-b">{{ \Carbon\Carbon::parse($blague['created_at'])->format('d/m/Y H:i') }}</td>
                            <td class="py-2 px-4 border-b flex gap-2">
                                <a href="/blague/{{ $blague->id }}/edit" class="px-3 py-1 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Editer</a>
                                <form action="/blague/{{ $blague->id }}/delete" enctype="multipart/form-data" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input class="px-3 py-1 bg-red-600 text-white rounded-lg hover:bg-red-700 transition" type="submit" value="Supprimer">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="text-center py-4 text-gray-500">Pas de citations trouvées.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

</div>
@endsection
