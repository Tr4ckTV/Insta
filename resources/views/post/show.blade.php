<x-guest-layout>
    <div class="uppercase font-bold text-gray-800">
        {{ $post->user->username }}
    </div>
    <div class="mb-4 text-xs text-gray-500">
        <img src="{{ asset($post->img_path) }}" alt="Post Image" class="mb-4 rounded-md">
        {{ $post->published_at }}
    </div>
    <div>
        {!! \nl2br($post->body) !!}
    </div>
</x-guest-layout>
