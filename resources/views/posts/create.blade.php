<!DOCTYPE html>
<html lang="en">

{{--
    Alcune cose da evidenziare in questa forma:

    @csrfgenera un campo token CSRF nascosto. Laravel richiede questo su tutti i moduli POST, PUT, PATCH ed ELIMINAZIONE per prevenire attacchi di falsificazione di richieste cross-site.
    {{ old('title') }}ripopola il campo con i dati precedentemente inviati se la convalida non riesce, quindi l'utente
non deve ri-digitare tutto.
Il @if($errors->any())blocco nella parte superiore visualizza i messaggi di errore di convalida quando l'invio del
modulo viene rifiutato.
--}}

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800 font-sans p-6">
    <div class="max-w-2xl mx-auto bg-white p-6 md:p-8 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Create Post</h1>
            <a href="{{ route('posts.index') }}"
                class="text-gray-600 hover:text-gray-900 underline text-sm transition">Back to Manage Posts</a>
        </div>

        @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded mb-6">
            <ul class="list-disc list-inside text-sm">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('posts.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 outline-none transition">
            </div>



            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Content</label>
                <textarea name="content" rows="8" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 outline-none transition resize-y">{{ old('content') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 outline-none bg-white transition">
                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="publish" {{ old('status') == 'publish' ? 'selected' : '' }}>Publish</option>
                </select>
            </div>

            <div class="pt-2 flex justify-end">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-md transition duration-200 shadow-sm">
                    Submit Post
                </button>
            </div>
        </form>
    </div>


    <div class="mt-8 mb-6 text-center text-sm text-gray-500">
        <a href="https://moussasalisou.com" class="text-blue-600 hover:text-blue-800 hover:underline transition"
            target="_blank">Tutorial CRUD Laravel 13 at moussasalisou.com</a>
    </div>
</body>

</html>