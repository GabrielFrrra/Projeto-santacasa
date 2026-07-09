<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::orderBy('name')->get();

        $permissionNames = [
            'users.index' => 'Visualizar Usuários',
            'users.create' => 'Cadastrar Usuários',
            'users.edit' => 'Editar Usuários',
            'users.delete' => 'Excluir Usuários',

            'permissions.index' => 'Visualizar Permissões',
            'permissions.create' => 'Cadastrar Permissões',
            'permissions.edit' => 'Editar Permissões',
            'permissions.delete' => 'Excluir Permissões',

            'modulo.setores' => 'Setores Hospitalares',
            'modulo.especialidades' => 'Especialidades Médicas',
            'modulo.equipamentos' => 'Equipamentos',
            'modulo.unidades' => 'Unidades Assistenciais',
        ];

        return view('permissions.index', compact(
            'permissions',
            'permissionNames'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
   public function create()
    {
        $availablePermissions = [
            'modulo.setores' => 'Setores Hospitalares',
            'modulo.especialidades' => 'Especialidades Médicas',
            'modulo.equipamentos' => 'Equipamentos',
            'modulo.unidades' => 'Unidades Assistenciais',
            'modulo.farmacia' => 'Farmácia',
            'modulo.laboratorio' => 'Laboratório',
        ];

        return view('permissions.create', compact('availablePermissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'unique:permissions,name'],
        ]);

        Permission::create([
            'name' => $validated['name'],
            'guard_name' => 'web',
        ]);

        return redirect()
            ->route('permissions.index')
            ->with('success', 'Permissão cadastrada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        $availablePermissions = [
            'modulo.setores' => 'Setores Hospitalares',
            'modulo.especialidades' => 'Especialidades Médicas',
            'modulo.equipamentos' => 'Equipamentos',
            'modulo.unidades' => 'Unidades Assistenciais',
        ];

        return view('permissions.edit', compact(
            'permission',
            'availablePermissions'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:permissions,name,' . $permission->id,
        ]);

        $permission->update([
            'name' => $validated['name'],
        ]);

        return redirect()
            ->route('permissions.index')
            ->with('success', 'Permissão atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()
            ->route('permissions.index')
            ->with('success', 'Permissão excluída com sucesso.');
    }
}
