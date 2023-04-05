{{-- <x-app-layout> --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Estudiantes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-student students={{$students}} /> --}}
                <table class="table table-sm flex-auto">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Acciones</th>
                            <th> <a href="{{ URL::route('addstudent') }}" class="bg-blue-500  text-white font-bold py-2 px-4 rounded"> Agregar </a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr>
                            {{-- @foreach($student as $key) --}}
                           <td>
                            {{$student->id}}
                            </td>
                           <td>
                            {{$student->name}}
                            </td>
                           <td>
                            {{$student->email}}
                            </td>
                           <td>
                            <a href="{{ URL::route('editstudent',$student->id ) }}" class="bg-blue-500  text-white font-bold py-2 px-4 rounded"> Editar </a>
                            <a href="{{ URL::route('deletestudent',$student->id ) }}" class="bg-blue-500  text-white font-bold py-2 px-4 rounded"> Eliminar </a>
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
