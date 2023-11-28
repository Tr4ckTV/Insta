<x-app-layout>
    <h1 class="font-bold text-xl mb-4">Profil de {{ $user->username }}</h1>

    <!-- Afficher les informations de l'utilisateur -->
    <div class="flex mt-8 items-center">
        <x-avatar class="h-20 w-20" :user="$user" />

        <div class="ml-4 flex flex-col">
            <p class="font-bold">{{ $user->username }}</p>
            <div class="bg-gray-800 text-white p-2 rounded">
                {{ $user->followerCount() }} Followers
            </div>
            <div class="text-gray-700">{{ $user->bio }}</div>

            @if (Auth::user()->isNot($user))
                @if (Auth::user()->isFollowing($user))
                    <form action="{{ route('unfollow', $user) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Unfollow</button>
                    </form>
                @else
                    <form action="{{ route('follow', $user) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">follow</button>
                    </form>
                @endif
            @endif
        </div>
    </div>

    <!-- Afficher la galerie de photos -->
    <h2 class="mt-8 mb-4 text-xl">Galerie de photos :</h2>
    <div class="grid grid-cols-3 gap-4">
        @foreach ($user->posts as $post)
            <a href="{{ route('posts.show', $post) }}">
                <img src="{{ asset('storage/' . $post->img_path) }}" alt="Photo de {{ $user->username }}" class="w-full h-auto">
            </a>
        @endforeach
    </div>
</x-app-layout>

