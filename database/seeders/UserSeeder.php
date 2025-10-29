<?php

namespace Database\Seeders;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {        
        DB::table('users')->delete();
        
        $adminRole = Rol::where('name', 'admin')->first();
        $empleadoRole = Rol::where('name', 'empleado')->first();

        User::create([
            'name' => 'Ana García',
            'email' => 'ana@empresa.com',
            'password' => Hash::make('password123'),
            'rol_id' => $adminRole->id,
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Luis Martínez',
            'email' => 'luis@empresa.com',
            'password' => Hash::make('password123'),
            'rol_id' => $empleadoRole->id,
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Marta Rodríguez',
            'email' => 'marta@empresa.com',
            'password' => Hash::make('password123'),
            'rol_id' => $empleadoRole->id,
            'email_verified_at' => now(),
        ]);

        $this->command->info('✅ Usuarios creados exitosamente!');


        $this->command->info('✅ 3 usuarios creados exitosamente!');
        $this->command->info('👤 Admin: ana@empresa.com / password123');
        $this->command->info('👥 Empleados: luis@empresa.com, marta@empresa.com / password123');
    }
}