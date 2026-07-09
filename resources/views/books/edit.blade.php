<x-layout>

    <div class="max-w-3xl mx-auto px-6">

        <h1 class="text-3xl font-bold mb-8">Modifica Libro</h1>

        <form action="{{ route('books.update', $book) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <input type="text" name="title" value="{{ $book->title }}"
                class="w-full p-3 rounded-lg bg-gray-800 text-white">

            <input type="text" name="author" value="{{ $book->author }}"
                class="w-full p-3 rounded-lg bg-gray-800 text-white">

            <input type="number" name="year" value="{{ $book->year }}"
                class="w-full p-3 rounded-lg bg-gray-800 text-white">

            <textarea name="description"
                class="w-full p-3 rounded-lg bg-gray-800 text-white">{{ $book->description }}</textarea>

            <button class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-500 transition">
                Aggiorna
            </button>
        </form>

    </div>

</x-layout>