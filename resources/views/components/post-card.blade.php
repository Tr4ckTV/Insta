<div>
    <a class="flex flex-col h-full space-y-4 bg-white rounded-md shadow-md p-5 w-full hover:shadow-lg hover:scale-105 transition"
        href="{{ route('posts.show', $post) }}">
            <img src="{{ asset('storage/' . $post->img_path) }}" alt="Post Image" class="mb-4 rounded-md">
        <div class="uppercase font-bold text-gray-800">
            {{ $post->title }}
        </div>
        <div class="flex-grow text-gray-700 text-sm text-justify">
            {{ Str::limit($post->body, 120) }}
        </div>
        <div class="text-xs text-gray-500">
            {{ $post->published_at }}
        </div>

    </a>
</div>

