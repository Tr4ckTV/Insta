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

    <div class="flex mt-8">
        <x-avatar class="h-20 w-20" :user="$post->user" />
        <div class="ml-4 flex flex-col justify-center">
          <div class="text-gray-700">{{ $post->user->name }}</div>
          <div class="text-gray-500">{{ $post->user->email }}</div>
        </div>
      </div>

      <div class="mt-8 flex items-center justify-center">
        <a
          href="{{ route('front.post.index') }}"
          class="font-bold bg-white text-gray-700 px-4 py-2 rounded shadow"
        >
          Retour à la liste des post
        </a>
      </div>
</x-guest-layout>
