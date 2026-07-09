@extends('layouts.admin')

@section('content')

<h2 class="text-2xl font-bold mb-6">
    Editar Permissão
</h2>

@if ($errors->any())

<div class="bg-red-100 border border-red-300 text-red-700 p-3 rounded mb-4">

    <ul>

        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

<form action="{{ route('permissions.update', $permission) }}" method="POST">

    @csrf
    @method('PUT')

    <div class="mb-6">

        <label class="block mb-2">
            Nome da Permissão
        </label>

        <input
            type="text"
            name="name"
            class="border rounded w-full p-2"
            value="{{ old('name', $permission->name) }}"
            required>

        <p class="text-sm text-gray-500 mt-2">
            Exemplos:
            modulo.setores,
            modulo.especialidades,
            modulo.equipamentos,
            modulo.unidades
        </p>

    </div>

    <button
        class="bg-blue-600 text-white px-4 py-2 rounded">

        Salvar

    </button>

</form>

@endsection