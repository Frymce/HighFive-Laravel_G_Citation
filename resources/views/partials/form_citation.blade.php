<div class="space-y-4">
    <div>
        <label for="content" class="block text-gray-700 font-medium mb-1">Contenu de la citation</label>
        <textarea name="content" id="content" cols="30" rows="5"
            class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-green-400">{{ old('content', isset($citation->content) ? $citation->content : '') }}</textarea>
        @error('content')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="author" class="block text-gray-700 font-medium mb-1">Auteur</label>
        <input type="text" name="author" id="author"
            value="{{ old('author', isset($citation->author) ? $citation->author : '') }}"
            class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-green-400">
        @error('author')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit"
        class="mt-4 px-6 py-2 bg-green-600 text-white font-semibold rounded-lg shadow hover:bg-green-700 transition">
        Enregistrer
    </button>
</div>
