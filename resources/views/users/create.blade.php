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

<form action="{{ route('users.store') }}" method="POST">

    @csrf

    <div class="mb-4">
        <label>Nome</label>

        <input
            type="text"
            name="name"
            class="border rounded w-full p-2"
            required>
    </div>

    <div class="mb-4">
        <label>E-mail</label>

        <input
            type="email"
            name="email"
            class="border rounded w-full p-2"
            required>
    </div>

    <div class="mb-4">
        <label>Senha</label>

        <input
            type="password"
            name="password"
            class="border rounded w-full p-2"
            required>
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

            <div>

                <label>

                    <input
                        type="checkbox"
                        name="permissions[]"
                        value="{{ $permission->name }}">

                    {{ $permission->name }}

                </label>

            </div>

        @endforeach

    </div>

    <button
        class="bg-blue-600 text-white px-4 py-2 rounded">

        Salvar

    </button>

</form>

@endsection