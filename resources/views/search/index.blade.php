<!-- Afficher les résultats pour les utilisateurs -->
<h2>Utilisateurs :</h2>
@foreach ($users as $user)
    <p>
        <a href="{{ route('profile.show', $user) }}" class="text-blue-500 hover:underline">
            {{ $user->username }}
        </a>
    </p>
    <!-- Afficher les posts de l'utilisateur -->
    @foreach ($user->posts as $post)
        <x-post-card :post="$post" />
    @endforeach
@endforeach

<!-- Afficher les résultats pour les posts -->
<h2>Posts contenant le terme recherché</h2>
<ul>
    @foreach ($posts as $post)
        <li>
            <x-post-card :post="$post" />
        </li>
    @endforeach
</ul>



