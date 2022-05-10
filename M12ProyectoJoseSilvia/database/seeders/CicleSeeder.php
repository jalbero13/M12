<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cicle;
use Illuminate\Support\Facades\DB;

class CicleSeeder extends Seeder
{   
    private $arrayCicles = array(
		array(
			'nom' => 'DAW I',
			'modificat_per' => 'System', 
		),
		array(
			'nom' => 'DAW II',
			'modificat_per' => 'System', 
		)
	);
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        self::seedCicle();
        $this->command->info('Tabla de ciclos inicializada con datos');
        // \App\Models\User::factory(10)->create();
    }
    private function seedCicle(){
        DB::table('cicles')->delete();
        foreach($this->arrayCicles as $cicle){
            $ciclo = new Cicle;
            $ciclo->nom = $cicle['nom'];
            $ciclo->modificat_per = $cicle['modificat_per'];
            $ciclo->save();
        }

    }
}
