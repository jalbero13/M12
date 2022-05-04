<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{   
    private $arrayUsers = array(
		array(
			'nom' => 'Juan José',
			'cognoms' => 'Molina Cebolleta', 
			'modificat_per' => 'System', 
			'email' => 'jmolina@inscamidemar.cat',
			'password' => 'aaaAAA333', 
			'role_id' => 1,
		),
		array(
			'nom' => 'Claudia',
			'cognoms' => 'Patatas Pérez', 
			'modificat_per' => 'System', 
            'email' => 'cpatata@inscamidemar.cat', 
			'password' => 'aaaAAA333', 
			'role_id' => 2,
		)
	);
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        self::seedUser();
        $this->command->info('Tabla users inicializada con datos');
        // \App\Models\User::factory(10)->create();
    }
    private function seedUser(){
        DB::table('users')->delete();
        foreach($this->arrayUsers as $usuario){
            $user = new User;
            $user->nom = $usuario['nom'];
            $user->cognoms = $usuario['cognoms'];
            $user->modificat_per = $usuario['modificat_per'];
            $user->email = $usuario['email'];
            $user->password = Hash::make($usuario['password']);
            $user->role_id = $usuario['role_id'];
            $user->save();
        }

    }
}
