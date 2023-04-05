<div class="p-6 lg:p-8 bg-white border-b border-gray-200">

    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Agregar Materia
    </h1>


</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
    <form method="POST" action="{{ route('addsubject') }}">
        @csrf
        <div class="mb-6">
            <label class="block">
                <span class="text-gray-700">Nombre</span>
                <input type="text" name="name" id="name" class="block w-full mt-1 rounded-md" placeholder=""
                    value="{{old('name')}}" />
            </label>
            @error('name')
            <div class="text-sm text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="text-white bg-blue-600  rounded text-sm px-5 py-2.5">Agregar</button>

    </form>







</div>
