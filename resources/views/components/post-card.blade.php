<div>
    <a class="flex flex-col h-full space-y-4 bg-white rounded-md shadow-md p-5 w-full hover:shadow-lg hover:scale-105 transition"
        href="{{ route('posts.show', $post) }}">
        <div class="flex mt-8">
            <x-avatar class="h-20 w-20" :user="$post->user" />
            <div class="ml-4 flex flex-col justify-center">
              <div class="text-gray-700">{{ $post->user->username }}</div>
            </div>
        </div>
            <img src="{{ asset('storage/' . $post->img_path) }}" alt="Post Image" class="mb-4 rounded-md">
        <div class="flex-grow text-gray-700 text-sm text-justify">
            {{ Str::limit($post->body, 120) }}
        </div>
        <div class="bg-gray-800 text-white p-2 rounded">
            {{ $post->likeCount() }} Likes
        </div>
        <div class="text-xs text-gray-500">
            {{ $post->published_at }}
        </div>
    </a>
</div>
