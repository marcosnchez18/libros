<x-app-layout>
    <div class="w-1/2 mx-auto">
        <form method="POST"
            action="{{ route('libros.update', ['libro' => $libro]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')


            <!-- Titulo -->
            <div>
                <x-input-label for="titulo" :value="'Titulo del libro'" />
                <x-text-input id="titulo" class="block mt-1 w-full"
                    type="text" name="titulo" :value="old('titulo', $libro->titulo)" required
                    autofocus autocomplete="titulo" />
                <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="autor" :value="'autor del libro'" />
                <x-text-input id="autor" class="block mt-1 w-full"
                    type="text" name="autor" :value="old('autor', $libro->autor)" required
                    autofocus autocomplete="autor" />
                <x-input-error :messages="$errors->get('autor')" class="mt-2" />
            </div>



            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('libros.index') }}">
                    <x-secondary-button class="ms-4">
                        Volver
                        </x-primary-button>
                </a>
                <x-primary-button class="ms-4">
                    Editar
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
