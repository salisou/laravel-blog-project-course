<x-layout>

    <div class="max-w-3xl mx-auto px-6">

        <h1 class="text-4xl font-bold mb-6">{{ $book->title }}</h1>

        <div class="glass p-8 rounded-2xl border border-white/10 shadow-xl">

            <p class="text-xl text-gray-200 mb-4">
                <strong>Autore:</strong> {{ $book->author }}
            </p>

            <p class="text-xl text-gray-200 mb-4">
                <strong>Anno:</strong> {{ $book->year }}
            </p>

            @if($book->description)
            <p class="text-gray-300 leading-relaxed">
                {{ $book->description }}
            </p>
            @else
            <p class="text-gray-400 italic">Nessuna descrizione disponibile.</p>
            @endif

        </div>

        <div class="mt-8 flex gap-4">

            <a href="{{ route('books.edit', $book) }}"
                class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-500 transition">
                Modifica
            </a>

            <form action="{{ route('books.destroy', $book) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="px-6 py-3 bg-red-600 text-white rounded-lg shadow hover:bg-red-500 transition">
                    Elimina
                </button>
            </form>

            <a href="{{ route('books.index') }}"
                class="px-6 py-3 bg-gray-700 text-white rounded-lg shadow hover:bg-gray-600 transition">
                Torna alla lista
            </a>

        </div>

    </div>

</x-layout>