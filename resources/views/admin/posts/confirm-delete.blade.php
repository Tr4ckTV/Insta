<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Confirmer la suppression') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <p>Êtes-vous sûr de vouloir supprimer ce post?</p>
                    <div class="mt-4">
                        <form method="POST" action="{{ route('admin.posts.delete', $post->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400">Confirmer la suppression</button>
                        </form>
                        <a href="{{ route('admin') }}" class="text-blue-500">Annuler</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
