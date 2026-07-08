<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

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
    }
}