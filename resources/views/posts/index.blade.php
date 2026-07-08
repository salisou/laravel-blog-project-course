<!DOCTYPE html>
<html lang="en">

{{--

    Utilizziamo Tailwind CSS tramite CDN per lo styling, che mantiene il tutorial semplice senza richiedere un passaggio di build.
    Il @forelse/ @emptydirettiva gestisce entrambi i casi: quando esistono i post e quando la tabella è vuota.
    $posts->firstItem() + $loop->indexcalcola il numero di riga corretto tra le pagine impaginate. Ad esempio, a pagina 2 con 10 elementi per pagina, la numerazione inizia a 11 invece di ripristinare a 1.
    Il pulsante di eliminazione è avvolto in un modulo con @method('DELETE')perché i moduli HTML supportano solo GET e POST. Laravel utilizza questo campo nascosto per interpretare la richiesta come metodo DELETE.
    {{ $posts->links() }}rende i controlli di paginazione automaticamente.

--}}


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Posts</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800 font-sans p-6">
    <div class="max-w-7xl mx-auto bg-white p-6 md:p-8 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900">Manage Posts</h1>
            <a href="{{ route('posts.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md transition duration-200 shadow-sm">
                Create New Post
            </a>
        </div>

        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 shadow-sm rounded-lg overflow-hidden">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-16">
                            No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($posts as $post)
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                            {{ $posts->firstItem() + $loop->index }}
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $post->title }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500 break-words">{{ $post->slug }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $post->status === 'publish' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ ucfirst($post->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                            <a href="{{ route('posts.show', $post) }}"
                                class="inline-flex items-center px-3 py-1.5 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none transition ease-in-out duration-150 shadow-sm">View</a>
                            <a href="{{ route('posts.edit', $post) }}"
                                class="inline-flex items-center px-3 py-1.5 bg-amber-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-amber-600 focus:outline-none transition ease-in-out duration-150 shadow-sm">Edit</a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline-block m-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this post?')"
                                    class="inline-flex items-center px-3 py-1.5 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:outline-none transition ease-in-out duration-150 shadow-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">No posts found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $posts->links() }}
        </div>
    </div>
    <div class="mt-8 mb-6 text-center text-sm text-gray-500">
        <a href="https://moussasalisou.com" class="text-blue-600 hover:text-blue-800 hover:underline transition"
            target="_blank">Tutorial CRUD Laravel 13 at moussasalisou.com</a>
    </div>
</body>

</html>