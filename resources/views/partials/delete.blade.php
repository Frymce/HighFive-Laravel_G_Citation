<form action="/citation/{{ $citation['id'] }}/delete" method="POST" class="mt-4">
    @csrf
    @method('DELETE')
    <input class="px-3 py-3 bg-red-500 text-white rounded-lg hover:bg-red-700 transition" type="submit" value="Supprimer la citation">
</form>
