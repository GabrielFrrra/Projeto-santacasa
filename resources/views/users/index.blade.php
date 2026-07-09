@extends('layouts.admin')

@section('content')

@if(session('success'))
    <div class="mb-4 rounded bg-green-100 border border-green-300 p-3 text-green-700">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="mb-4 rounded bg-red-100 border border-red-300 p-3 text-red-700">
        {{ session('error') }}
    </div>
@endif

<div class="flex justify-between items-center mb-6">

    <h2 class="text-2xl font-bold">
        Usuários
    </h2>

    <a href="{{ route('users.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Novo Usuário
    </a>

</div>

<div class="bg-white rounded-lg shadow">

    <table class="min-w-full">

        <thead class="bg-gray-100">

            <tr>

                <th class="px-4 py-3 text-left">Nome</th>
                <th class="px-4 py-3 text-left">E-mail</th>
                <th class="px-4 py-3 text-center">Ações</th>

            </tr>

        </thead>

        <tbody>

        @forelse($users as $user)

            <tr class="border-t">

                <td class="px-4 py-3">
                    {{ $user->name }}
                </td>

                <td class="px-4 py-3">
                    {{ $user->email }}
                </td>

                <td class="px-4 py-3 text-center">

                    <div class="flex justify-center gap-3">

                        <a href="{{ route('users.edit', $user) }}"
                        class="text-blue-600 hover:underline">
                            Editar
                        </a>

                        <form action="{{ route('users.destroy', $user) }}"
                            method="POST"
                            onsubmit="return confirm('Deseja realmente excluir este usuário?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="text-red-600 hover:underline">
                                Excluir
                            </button>

                        </form>

                    </div>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="3" class="text-center py-5">
                    Nenhum usuário encontrado.

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection