<x-app-layout>
    <div class="w-full max-w-screen-md mx-auto">
        <form method="get" action="{{ route('search') }}" class="mb-4 flex">
            <input type="text" name="query" placeholder="Recherche..." class="flex-1 rounded-l-md p-2" />
            <button type="submit" class="bg-blue-500 text-white rounded-r-md p-2">Rechercher</button>
        </form>
    </div>



    <h1 class="font-bold text-xl mb-4">Liste des posts</h1>
    <ul class="grid sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-8">
        @foreach ($posts as $post)
            <li>
                <x-post-card :post="$post" />
            </li>
        @endforeach
    </ul>

    <div class="mt-8">
        {{ $posts->links()}}
    </div>

</x-app-layout>
