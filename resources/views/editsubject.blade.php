
<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{$materia}}
                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
                    <form method="PUT" action="{{ route('editsubject2', $materia['id'] ) }}">
                        @csrf
                        <div class="mb-6">
                            <label class="block">
                                <span class="text-gray-700">Nombre</span>
                                <input type="text" name="name" id="name" class="block w-full mt-1 rounded-md" placeholder=""
                                    value="{{$materia['name']}}" />
                            </label>
                            @error('name')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <input type="hidden" name="id" id="id" class="block w-full mt-1 rounded-md" placeholder=""
                            value="{{$materia['id']}}" />
                        </div>
                        <button type="submit" class="text-white bg-blue-600  rounded text-sm px-5 py-2.5">Actualizar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
