<x-app-layout>
    <form method="get" action="{{ route('search') }}" class="mb-4">
        <input type="text" name="query" placeholder="Recherche..." />
        <button type="submit">Rechercher</button>
    </form>

    <h1 class="font-bold text-xl mb-4">Liste des posts</h1>
    <ul class="grid sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-8">
        @foreach ($posts as $post)
            <li>
                <x-post-card :post="$post" />
            </li>
        @endforeach
    </ul>

    <div class="mt-8">
        {{ $posts->links() }}
    </div>

</x-app-layout>
