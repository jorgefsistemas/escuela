
<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- {{$studiante}} --}}
                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
                    {{-- <form method="POST" action="{{ route('editstudent') }}"> --}}
                    <form method="PUT" action="{{ route('editstudent2', $studiante['id'] ) }}">
                        @csrf
                        <div class="mb-6">
                            <label class="block">
                                <span class="text-gray-700">Nombre</span>
                                <input type="text" name="name" id="name" class="block w-full mt-1 rounded-md" placeholder=""
                                    value="{{$studiante['name']}}" />
                            </label>
                            @error('name')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block">
                                <span class="text-gray-700">Correo</span>
                                <textarea class="block w-full mt-1 rounded-md" name="email" id="email" rows="3">{{$studiante['email']}}</textarea>
                            </label>
                            @error('email')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <input type="hidden" name="id" id="id" class="block w-full mt-1 rounded-md" placeholder=""
                            value="{{$studiante['id']}}" />
                        </div>
                        <button type="submit" class="text-white bg-blue-600  rounded text-sm px-5 py-2.5">Actualizar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
