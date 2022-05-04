<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        self::seedRole();
        $this->command->info('Tabla roles inicializada con datos');
    }

    private function seedRole(){
        DB::table('roles')->delete();
        $rol1 = new Role;
        $rol1->rol = 'Administrador';
        $rol1->save();
        $rol2 = new Role;
        $rol2->rol = 'Professor';
        $rol2->save();
    }
}
