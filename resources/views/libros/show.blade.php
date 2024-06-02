<x-app-layout>
    <div class="relative overflow-x-auto w-3/4 mx-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>



                    <th class="px-6 py-3">
                        Título
                    </th>


                    <th class="px-6 py-3">
                        Autor
                    </th>

                    <th class="px-6 py-3">
                        Numero de ejemplares
                    </th>

                    <th class="px-6 py-3">
                        Codigo de ejemplares
                    </th>

                    <th class="px-6 py-3">
                        Esta prestado
                    </th>

                    <th class="px-6 py-3">
                        Fecha prestamo
                    </th>



                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b">


                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $libro->titulo }}
                    </td>

                    <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $libro->autor }}
                    </th>

                    <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {!! $libro->cant_ejemplares() !!}
                    </th>

                    <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {!! $libro->nombre_ejemplares() !!}
                    </th>

                    <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {!! $libro->esta_prestado() !!}
                    </th>

                    <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {!! $libro->fecha_prestamo() !!}
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
