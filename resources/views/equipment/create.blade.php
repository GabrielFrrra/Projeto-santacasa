@extends('layouts.admin')

@section('content')

<h2 class="text-2xl font-bold mb-6">Novo Equipamento</h2>

@if ($errors->any())
    <div class="bg-red-100 border border-red-300 text-red-700 p-3 rounded mb-4">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('equipamentos.store') }}" method="POST">
    @csrf

    <div class="mb-6">
        <label class="block mb-2">Nome do Equipamento</label>
        <input type="text" name="name" value="{{ old('name') }}"
               class="border rounded w-full p-2" required>
    </div>

    <button class="bg-blue-600 text-white px-4 py-2 rounded">
        Salvar
    </button>
</form>

@endsection