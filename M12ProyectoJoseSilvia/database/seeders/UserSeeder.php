<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        self::seedUser();
        $this->command->info('Tabla users inicializada con datos');
    }
    private function seedUser(){
        DB::table('users')->delete();
        $admin = new User;
        $admin->name = 'Juan José';
        $admin->cognoms = 'Molina Cebolleta';
        $admin->modificat_per = 'System';
        $admin->email = 'jmolina@inscamidemar.cat';
        $admin->password = Hash::make('aaaAAA333');
        $admin->role_id = 1;
        $admin->save();
        $prof = new User;
        $prof->name = 'Claudia';
        $prof->cognoms = 'Patatas Pérez';
        $prof->modificat_per = 'System';
        $prof->email = 'cpatatas@inscamidemar.cat';
        $prof->password = Hash::make('aaaAAA333');
        $prof->role_id = 2;
        $prof->save();
        
    }
}
