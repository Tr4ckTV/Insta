<x-app-layout>
    <h1 class="font-bold text-xl mb-4">Profil de {{ $user->username }}</h1>

    <!-- Afficher les informations de l'utilisateur -->
    <div>
        <div class="flex mt-8">
            <x-avatar class="h-20 w-20" :user="$user" />
        </div>
        <p>{{ $user->username }}</p>
        <div class="ml-4 flex flex-col justify-center">
            <div class="text-gray-700">{{ $user->bio }}</div>
        </div>
    </div>

    <!-- Afficher la galerie de photos -->
    <h2>Galerie de photos :</h2>
    <div class="grid grid-cols-3 gap-4">
        @foreach ($user->posts as $post)
            <img src="{{ asset('storage/' . $post->img_path) }}" alt="Photo de {{ $user->username }}" class="w-full h-auto">
        @endforeach
    </div>
</x-app-layout>

