@extends('layouts.admin')

@section('content')

<h2 class="text-2xl font-bold mb-6">
    Novo Usuário
</h2>

@if ($errors->any())

    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">

        <ul>

            @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

<form action="{{ route('users.update', $user) }}" method="POST">

    @csrf
    @method('PUT')

    <div class="mb-4">
        <label>Nome</label>

        <input
            type="text"
            name="name"
            value="{{ old('name', $user->name) }}"
            class="border rounded w-full p-2">
    </div>

    <div class="mb-4">
        <label>E-mail</label>

        <input
            type="email"
            name="email"
            value="{{ old('email', $user->email) }}"
            class="border rounded w-full p-2">
    </div>

    <div class="mb-4">
        <label>Senha</label>

        <input
            type="password"
            name="password"
            class="border rounded w-full p-2">

        <p class="text-sm text-gray-500">
            Deixe em branco para manter a senha atual.
        </p>
    </div>

    <div class="mb-4">
        <label>Perfil</label>

        <select
            name="role"
            class="border rounded w-full p-2">

            @foreach($roles as $role)

                <option value="{{ $role->name }}">
                    {{ $role->name }}
                </option>

            @endforeach

        </select>

    </div>

    <div class="mb-6">

        <label class="font-semibold">
            Permissões
        </label>

        @foreach($permissions as $permission)

        <label class="block">

        <input
            type="checkbox"
            name="permissions[]"
            value="{{ $permission->name }}"
            @checked($user->hasPermissionTo($permission->name))>

        {{ $permission->name }}

        </label>

        @endforeach

    </div>

    <button
        class="bg-blue-600 text-white px-4 py-2 rounded">

    Atualizar

    </button>

</form>

@endsection