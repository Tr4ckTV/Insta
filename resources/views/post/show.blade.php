<x-guest-layout>
    <div class="uppercase font-bold text-gray-800">
        {{ $post->user->username }}
    </div>
    <div class="mb-4 text-xs text-gray-500">
        <img src="{{ asset('storage/' . $post->img_path) }}" alt="Post Image" class="mb-4 rounded-md">
        {{ $post->published_at }}
    </div>
    <div>
        {!! \nl2br($post->body) !!}
    </div>

    <div class="flex mt-8">
        <x-avatar class="h-20 w-20" :user="$post->user" />
        <div class="ml-4 flex flex-col justify-center">
          <div class="text-gray-700">{{ $post->user->name }}</div>
          <div class="text-gray-500">{{ $post->user->email }}</div>
        </div>
      </div>
</x-guest-layout>
