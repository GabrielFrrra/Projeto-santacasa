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

            <a href="#" class="block px-6 py-3 hover:bg-slate-700">
                Dashboard
            </a>

            <a href="#" class="block px-6 py-3 hover:bg-slate-700">
                Usuários
            </a>

            <a href="#" class="block px-6 py-3 hover:bg-slate-700">
                Permissões
            </a>

            <hr class="my-4 border-slate-700">

            <a href="#" class="block px-6 py-3 hover:bg-slate-700">
                Setores Hospitalares
            </a>

            <a href="#" class="block px-6 py-3 hover:bg-slate-700">
                Especialidades Médicas
            </a>

            <a href="#" class="block px-6 py-3 hover:bg-slate-700">
                Equipamentos
            </a>

            <a href="#" class="block px-6 py-3 hover:bg-slate-700">
                Unidades Assistenciais
            </a>

        </nav>

    </aside>

    <!-- Conteúdo -->
    <main class="flex-1">

        <header class="bg-white shadow px-8 py-5 flex justify-between">

            <h1 class="text-xl font-semibold">
                Sistema Administrativo
            </h1>

            <div>

                {{ Auth::user()->name }}

            </div>

        </header>

        <section class="p-8">

            @yield('content')

        </section>

    </main>

</div>

</body>
</html>