{{-- @extends('layouts.master')

@section('content')
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div style="margin: 15px;">
            <label for="email">Email : </label>
            <input type="email" name="email" id="email">
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div style="margin: 15px;">
            <label for="password">Mot de passe : </label>
            <input type="password" name="password" id="password">
            @error('password')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" style="margin: 15px; padding:10px;">Se connecter</button>
    </form>
@endsection --}}

@extends('layouts.master')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-gray-100 py-10">

    <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-lg border border-gray-200">

        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
            🔐 Connexion
        </h2>

        <form action="{{ route('login') }}" method="POST">
            @csrf

            {{-- Email --}}
            <div class="mb-5">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    Email :
                </label>
                <input type="email" name="email" id="email"
                    class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    value="{{ old('email') }}">

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
                    class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit button --}}
            <button type="submit"
                class="w-full py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition shadow-md font-semibold">
                Se connecter
            </button>

        </form>
    </div>
</div>

@endsection
