<x-app-layout>
    <div class="flex mt-8">
        <x-avatar class="h-20 w-20" :user="$post->user" />
        <div class="ml-4 flex flex-col justify-center">
            <div class="text-gray-700">
                <a href="{{ route('profile.show', $post->user) }}" class="text-blue-500 hover:underline">
                    {{ $post->user->username }}
                </a>
            </div>
        </div>
    </div>
    <div class="mb-4 text-xs text-gray-500">
        <img src="{{ asset('storage/' . $post->img_path) }}" alt="Post Image" class="mb-4 rounded-md">
        {{ $post->published_at }}
    </div>
    <div>
        {!! \nl2br($post->body) !!}
    </div>

    <!-- Boutons de like/unlike -->
    <div class="mt-4">
        @if (auth()->user()->likes->contains('post_id', $post->id))
            <form action="{{ route('posts.unlike', $post) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 hover:underline">Unlike</button>
            </form>
        @else
            <form action="{{ route('posts.like', $post) }}" method="POST">
                @csrf
                <button type="submit" class="text-blue-500 hover:underline">Like</button>
            </form>
        @endif
    </div>
    <div class="bg-gray-800 text-white p-2 rounded">
        {{ $post->likeCount() }} Likes
    </div>

    <h2>Commentaires :</h2>
    @foreach($post->comments as $comment)
        <p>{{ $comment->user->username }} : {{ $comment->content }}</p>
    @endforeach

    <form action="{{ route('comment.create', ['post' => $post->id]) }}" method="POST">
        @csrf
        <textarea name="content" rows="3" placeholder="Ajouter un commentaire"></textarea>
        <button type="submit">Commenter</button>
    </form>
</x-app-layout>


