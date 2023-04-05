{{-- <x-app-layout> --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Materias
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table table-sm flex-auto">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                            <th> <a href="{{ URL::route('addsubject') }}" class="bg-blue-500  text-white font-bold py-2 px-4 rounded"> Agregar </a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subjects as $subject)
                        <tr>
                            {{-- @foreach($student as $key) --}}
                           <td>
                            {{$subject->id}}
                            </td>
                           <td>
                            {{$subject->name}}
                            </td>

                           <td>
                            <a href="{{ URL::route('editsubject',$subject->id ) }}" class="bg-blue-500  text-white font-bold py-2 px-4 rounded"> Editar </a>
                            <a href="{{ URL::route('deletesubject',$subject->id ) }}" class="bg-blue-500  text-white font-bold py-2 px-4 rounded"> Eliminar </a>
                            </td>
                               {{-- @endforeach --}}
                              </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
{{-- </x-app-layout> --}}
