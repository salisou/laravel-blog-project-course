<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Post - {{ $post->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800 font-sans p-6">
    <div class="max-w-3xl mx-auto bg-white p-6 md:p-8 rounded-lg shadow-md mt-6">
        <div class="flex justify-between items-start mb-6 pb-6 border-b border-gray-200">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $post->title }}</h1>
                <div class="flex items-center space-x-4 text-sm text-gray-500">
                    <span class="flex items-center">
                        <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                        </svg>
                        {{ $post->slug }}
                    </span>
                    <span
                        class="px-2 py-0.5 inline-flex text-xs leading-5 font-semibold rounded-full {{ $post->status === 'publish' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                        {{ ucfirst($post->status) }}
                    </span>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3 items-end sm:items-center">
                <a href="{{ route('posts.index') }}"
                    class="text-sm font-medium text-gray-600 hover:text-gray-900 bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-md transition shadow-sm border border-gray-200">Back</a>
                <a href="{{ route('posts.edit', $post) }}"
                    class="text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded-md shadow-sm transition">Edit
                    Post</a>
            </div>
        </div>

        <div class="prose max-w-none text-gray-800 leading-relaxed whitespace-pre-wrap text-[17px]">
            {{ $post->content }}
        </div>

        <div
            class="mt-10 pt-6 border-t border-gray-100 flex flex-col sm:flex-row sm:justify-between text-sm text-gray-500">
            <span>Posted: {{ $post->created_at->format('M d, Y H:i') }}</span>
            @if($post->updated_at != $post->created_at)
            <span>Updated: {{ $post->updated_at->format('M d, Y H:i') }}</span>
            @endif
        </div>
    </div>

    <div class="mt-8 mb-6 text-center text-sm text-gray-500">
        <a href="https://moussasalisou.com" class="text-blue-600 hover:text-blue-800 hover:underline transition"
            target="_blank">Tutorial CRUD Laravel 13 at moussasalisou.com</a>
    </div>
</body>

</html>