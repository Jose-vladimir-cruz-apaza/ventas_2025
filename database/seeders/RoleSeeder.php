<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rols')->delete();
        Rol::create(['name' => 'admin', 'description' => 'Administrador del sistema']);
        Rol::create(['name' => 'empleado', 'description' => 'Empleado estándar']);
        $this->command->info('✅ Roles creados correctamente!');
    }
}
