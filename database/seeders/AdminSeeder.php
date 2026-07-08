<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            [
                'email' => 'admin@santacasa.org.br',
            ],
            [
                'name' => 'Administrador',
                'password' => Hash::make('password'),
            ]
        );

        $admin->assignRole('Administrador');

        $admin->syncPermissions(
            Permission::pluck('name')->toArray()
        );
    }
}