<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Administrativo</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-slate-800 text-white">

        <div class="p-6 text-xl font-bold border-b border-slate-700">
            Santa Casa
        </div>

        <nav class="mt-6">

            <a href="{{ route('dashboard') }}" class="block px-6 py-3 hover:bg-slate-700">
                Dashboard
            </a>

            @role('Administrador')

                <a href="{{ route('users.index') }}" class="block px-6 py-3 hover:bg-slate-700">
                    Usuários
                </a>

                <a href="{{ route('permissions.index') }}" class="block px-6 py-3 hover:bg-slate-700">
                    Permissões
                </a>

            @endrole

            <hr class="my-4 border-slate-700">

            @can('modulo.setores')
                <a href="{{ route('setores.index') }}" class="block px-6 py-3 hover:bg-slate-700">
                    Setores Hospitalares
                </a>
            @endcan

            @can('modulo.especialidades')
                <a href="{{ route('especialidades.index') }}" class="block px-6 py-3 hover:bg-slate-700">
                    Especialidades Médicas
                </a>
            @endcan

            @can('modulo.equipamentos')
                <a href="{{ route('equipamentos.index') }}" class="block px-6 py-3 hover:bg-slate-700">
                    Equipamentos
                </a>
            @endcan

            @can('modulo.unidades')
                <a href="{{ route('unidades.index') }}" class="block px-6 py-3 hover:bg-slate-700">
                    Unidades Assistenciais
                </a>
            @endcan

        </nav>

    </aside>

    <!-- Conteúdo -->
    <main class="flex-1">

        <header class="bg-white shadow px-8 py-5 flex justify-between">

            <h1 class="text-xl font-semibold">
                Sistema Administrativo
            </h1>

            <div class="flex items-center gap-4">

                <span>
                    {{ Auth::user()->name }}
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                        Sair
                    </button>
                </form>

            </div>

        </header>

        <section class="p-8">

            @yield('content')

        </section>

    </main>

</div>

</body>
</html>