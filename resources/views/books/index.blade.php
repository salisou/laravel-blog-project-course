<x-layout>

    <div class="max-w-4xl mx-auto px-6">

        <h1 class="text-4xl font-bold mb-8">Libri</h1>

        <a href="{{ route('books.create') }}"
            class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-500 transition">
            + Nuovo Libro
        </a>

        <div class="mt-10 space-y-6">

            @foreach ($books as $book)
            <div class="glass p-6 rounded-xl border border-white/10">
                <h2 class="text-2xl font-bold">{{ $book->title }}</h2>
                <p class="text-gray-300">{{ $book->author }} — {{ $book->year }}</p>

                <div class="mt-4 flex gap-6">

                    <a href="{{ route('books.show', $book) }}" class="text-green-400 hover:text-green-300">
                        Vedi Dettagli
                    </a>

                    <a href="{{ route('books.edit', $book) }}" class="text-blue-400 hover:text-blue-300">
                        Modifica
                    </a>

                    <form action="{{ route('books.destroy', $book) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-400 hover:text-red-300">
                            Elimina
                        </button>
                    </form>

                </div>
            </div>
            @endforeach

        </div>

    </div>

</x-layout>