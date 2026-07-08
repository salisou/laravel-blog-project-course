<x-layout>
    <div class="max-w-4xl mx-auto py-12">

        <h1 class="text-4xl font-bold text-white mb-8">Crea un nuovo Blog</h1>

        <form action="{{ route('blog.store') }}" method="POST"
            class="glass p-10 rounded-2xl shadow-xl border border-white/10">
            @csrf

            <div class="mb-6">
                <label class="text-white font-semibold">Titolo</label>
                <input type="text" name="title"
                    class="w-full mt-2 p-3 rounded bg-gray-800 text-white border border-gray-700">
            </div>

            <div class="mb-6">
                <label class="text-white font-semibold">Contenuto</label>
                <textarea name="content" rows="6"
                    class="w-full mt-2 p-3 rounded bg-gray-800 text-white border border-gray-700"></textarea>
            </div>

            <div class="mb-6">
                <label class="text-white font-semibold">Stato</label>
                <select name="status" class="w-full mt-2 p-3 rounded bg-gray-800 text-white border border-gray-700">
                    <option value="draft">Bozza</option>
                    <option value="published">Pubblicato</option>
                </select>
            </div>

            <button class="px-6 py-3 bg-blue-600 text-white rounded-xl shadow-xl hover:bg-blue-500 transition">
                Salva
            </button>
        </form>

    </div>
</x-layout>