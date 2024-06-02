<x-app-layout>
    <div class="relative overflow-x-auto w-3/4 mx-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>


                    <th  class="px-6 py-3">
                        Titulo
                    </th>

                    <th  class="px-6 py-3">
                        Autor
                    </th>

                    <th  class="px-6 py-3">
                        Editar
                    </th>
                    <th  class="px-6 py-3">
                        Borrar
                    </th>
                </tr>
            </thead>
            <br><br><br>
            <tbody>
                @foreach ($libros as $libro)
                    <tr class="bg-white border-b">

                        <th  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            <a href="{{ route('libros.show', ['libro' => $libro]) }}" class="text-blue-500">
                                {{ $libro->titulo }}
                            </a>
                        </th>
                        <th  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $libro->autor }}
                        </th>

                        <td class="px-6 py-4">
                            <a href="{{ route('libros.edit', ['libro' => $libro]) }}" class="font-medium text-blue-600 hover:underline">
                                <x-primary-button>
                                    Editar
                                </x-primary-button>
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('libros.destroy', ['libro' => $libro]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-primary-button class="bg-red-500">
                                    Borrar
                                </x-primary-button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form action="{{ route('libros.create') }}" class="flex justify-center mt-4 mb-4">
            <x-primary-button class="bg-green-500">Insertar un nuevo libro</x-primary-button>
        </form>
    </div>
</x-app-layout>
