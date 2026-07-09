@extends('layouts.admin')

@section('content')

@if(session('success'))
    <div class="mb-4 rounded bg-green-100 border border-green-300 p-3 text-green-700">
        {{ session('success') }}
    </div>
@endif

<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Setores Hospitalares</h2>

    <a href="{{ route('setores.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Novo Setor
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
        @forelse($sectors as $sector)
            <tr class="border-t">
                <td class="px-4 py-3">{{ $sector->name }}</td>

                <td class="px-4 py-3 text-center">
                    <div class="flex justify-center gap-3">
                        <a href="{{ route('setores.edit', $sector) }}"
                           class="text-blue-600 hover:underline">
                            Editar
                        </a>

                        <form action="{{ route('setores.destroy', $sector) }}"
                              method="POST"
                              onsubmit="return confirm('Deseja realmente excluir este setor?')">
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
                    Nenhum setor encontrado.
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

@endsection