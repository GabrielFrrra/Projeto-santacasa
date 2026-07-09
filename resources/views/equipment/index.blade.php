@extends('layouts.admin')

@section('content')

@if(session('success'))
    <div class="mb-4 rounded bg-green-100 border border-green-300 p-3 text-green-700">
        {{ session('success') }}
    </div>
@endif

<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Equipamentos</h2>

    <a href="{{ route('equipamentos.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Novo Equipamento
    </a>
</div>

<div class="bg-white rounded-lg shadow">
    <table class="min-w-full">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-3 text-left">Nome</th>
                <th class="px-4 py-3 text-center">Ações</th>
            </tr>
        </thead>

        <tbody>
        @forelse($equipments as $equipment)
            <tr class="border-t">
                <td class="px-4 py-3">{{ $equipment->name }}</td>

                <td class="px-4 py-3 text-center">
                    <div class="flex justify-center gap-3">
                        <a href="{{ route('equipamentos.edit', $equipment) }}"
                           class="text-blue-600 hover:underline">
                            Editar
                        </a>

                        <form action="{{ route('equipamentos.destroy', $equipment) }}"
                              method="POST"
                              onsubmit="return confirm('Deseja realmente excluir este equipamento?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="text-red-600 hover:underline">
                                Excluir
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="2" class="text-center py-5">
                    Nenhum equipamento encontrado.
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

@endsection