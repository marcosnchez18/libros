<x-app-layout>
    <div class="relative overflow-x-auto w-3/4 mx-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>



                    <th class="px-6 py-3">
                        Título ejemplar
                    </th>


                    <th class="px-6 py-3">
                        Titulo libro
                    </th>
                    <th class="px-6 py-3">
                        Autor
                    </th>
                    <th class="px-6 py-3">
                        Vencimiento
                    </th>





                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b">


                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $ejemplar->codigo }}
                    </td>

                    <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $ejemplar->libro->titulo}}
                    </th>
                    <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $ejemplar->libro->autor }}
                    </th>
                    <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {!! $ejemplar->esta_vencido() !!}
                    </th>











                </tr>
            </tbody>
        </table>

        <a href="{{ route('libros.index') }}">
            <x-secondary-button class="ms-4">
                Volver
                </x-primary-button>
        </a>

    </div>
</x-app-layout>
