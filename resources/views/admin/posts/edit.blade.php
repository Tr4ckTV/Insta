<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier le Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <!-- Formulaire d'édition avec les champs pré-remplis -->
                    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <!-- Ajoute les champs nécessaires pour l'édition -->
                        <div class="mb-4">
                            <label for="body" class="block text-gray-700 text-sm font-bold mb-2">Contenu du Post:</label>
                            <textarea name="body" id="body" rows="4" class="w-full border rounded-md p-2">{{ $post->body }}</textarea>
                        </div>

                        <!-- Ajoute d'autres champs si nécessaire -->

                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Enregistrer les modifications
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
