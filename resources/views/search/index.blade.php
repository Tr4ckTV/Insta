<x-app-layout>

<!-- Afficher les résultats pour les utilisateurs -->
<h2>Utilisateurs :</h2>
@foreach ($users as $user)
    <p>
        <a href="{{ route('profile.show', $user) }}" class="text-blue-500 hover:underline">
            {{ $user->username }}
        </a>
    </p>

@endforeach

<h2>Posts des utilisateurs :</h2>
    <!-- Afficher les posts de l'utilisateur -->
    <ul class="grid sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-8">
@foreach ($users as $user)
    @foreach ($user->posts as $post)
        <x-post-card :post="$post" />
    @endforeach
@endforeach
</ul>

<!-- Afficher les résultats pour les posts -->
<h2>Posts contenant le terme recherché</h2>
<ul class="grid sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-8">
    @foreach ($posts as $post)
        <li>
            <x-post-card :post="$post" />
        </li>
    @endforeach
</ul>
</x-app-layout>
