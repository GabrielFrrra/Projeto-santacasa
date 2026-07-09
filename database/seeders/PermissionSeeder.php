<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [

            // Usuários
            'users.index',
            'users.create',
            'users.edit',
            'users.delete',

            // Permissões
            'permissions.index',
            'permissions.create',
            'permissions.edit',
            'permissions.delete',

            // Módulos
            'modulo.setores',
            'modulo.especialidades',
            'modulo.equipamentos',
            'modulo.unidades',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }

        $adminRole = Role::firstOrCreate([
            'name' => 'Administrador',
            'guard_name' => 'web',
        ]);

        $adminRole->syncPermissions([
            'users.index',
            'users.create',
            'users.edit',
            'users.delete',

            'permissions.index',
            'permissions.create',
            'permissions.edit',
            'permissions.delete',
        ]);

        Role::firstOrCreate([
            'name' => 'Colaborador',
            'guard_name' => 'web',
        ]);
    }
}