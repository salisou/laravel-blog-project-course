<x-layout>
    <div class="max-w-7xl mx-auto py-12">

        <div class="flex justify-between items-center mb-10">
            <h1 class="text-5xl font-extrabold text-white tracking-tight">Blog</h1>

            <a href="{{ route('blog.create') }}"
                class="px-6 py-3 bg-blue-600 text-white rounded-xl shadow-xl hover:bg-blue-500 transition">
                + Nuovo Articolo
            </a>
        </div>

        @if(session('success'))
        <div class="bg-green-600 text-white p-4 rounded mb-6 shadow-lg">
            {{ session('success') }}
        </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            @foreach ($blogs as $blog)
            <div class="glass p-6 rounded-2xl shadow-xl border border-white/10">
                <h2 class="text-2xl font-bold text-white">{{ $blog->title }}</h2>
                <p class="text-gray-300 mt-3">{{ Str::limit($blog->content, 120) }}</p>

                <div class="mt-6 flex gap-6">
                    <a href="{{ route('blog.edit', $blog) }}"
                        class="text-blue-400 hover:text-blue-300 font-semibold">Modifica</a>

                    <form action="{{ route('blog.destroy', $blog) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-400 hover:text-red-300 font-semibold">
                            Elimina
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-12">
            {{ $blogs->links() }}
        </div>

    </div>
</x-layout>