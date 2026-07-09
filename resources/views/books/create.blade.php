<x-layout>

    <div class="max-w-3xl mx-auto px-6">

        <h1 class="text-3xl font-bold mb-8">Aggiungi Libro</h1>

        <form action="{{ route('books.store') }}" method="POST" class="space-y-6">
            @csrf

            <input type="text" name="title" placeholder="Titolo" class="w-full p-3 rounded-lg bg-gray-800 text-white">

            <input type="text" name="author" placeholder="Autore" class="w-full p-3 rounded-lg bg-gray-800 text-white">

            <input type="number" name="year" placeholder="Anno" class="w-full p-3 rounded-lg bg-gray-800 text-white">

            <textarea name="description" placeholder="Descrizione"
                class="w-full p-3 rounded-lg bg-gray-800 text-white"></textarea>

            <button class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-500 transition">
                Salva
            </button>
        </form>

    </div>

</x-layout>