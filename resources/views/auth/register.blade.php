{{-- @extends('layouts.master')

@section('content')
    <form action="{{ route('save') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nom : </label>
            <input type="text" name="name" id="name">
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="email">Email : </label>
            <input type="email" name="email" id="email">
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="password">Mot de passe : </label>
            <input type="password" name="password" id="password">
            @error('password')
                <div>{{ $message }}</div>
            @enderror

        </div>

        <div>
            <label for="password_confirmation">Confirmation du mot de passe</label>
            <input type="password" name="password_confirmation" id="password_confirmation">
            @error('password_confirmation')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Enregistrer</button>
    </form>
@endsection --}}
@extends('layouts.master')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-gray-100 py-10">

    <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-lg border border-gray-200">

        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
            📝 Créer un compte
        </h2>

        <form action="{{ route('save') }}" method="POST">
            @csrf

            {{-- Name --}}
            <div class="mb-5">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                    Nom :
                </label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">

                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-5">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    Email :
                </label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">

                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-5">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                    Mot de passe :
                </label>
                <input type="password" name="password" id="password"
                    class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">

                @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password Confirmation --}}
            <div class="mb-5">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                    Confirmer le mot de passe :
                </label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">

                @error('password_confirmation')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit --}}
            <button type="submit"
                class="w-full py-2.5 bg-green-600 text-white rounded-lg hover:bg-green-700 transition shadow-md font-semibold">
                Enregistrer
            </button>

        </form>
    </div>
</div>

@endsection
