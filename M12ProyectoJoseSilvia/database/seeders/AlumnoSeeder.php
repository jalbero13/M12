<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alumne;
use Illuminate\Support\Facades\DB;

class AlumnoSeeder extends Seeder
{   
    private $arrayAlumnes = array(
		array(
			'nom' => 'Sandra',
            'cognoms' =>'Bulldog Sánchez',
            'direccio' =>'Calle falsa 123',
            'data_naixement' => '1994-04-13',
            'dni' => '21457899S',
            'telefon' => '674814785',
            'mail' => 'sbulldog@inscamidemar.cat',
			'modificat_per' => 'System', 
		),
		array(
			'nom' => 'Cristian',
            'cognoms' =>'Rodriguez Esposo',
            'direccio' =>'Calle verdadera 321',
            'data_naixement' => '1989-08-21',
            'dni' => '87495218L',
            'telefon' => '648718532',
            'mail' => 'crodriguez@inscamidemar.cat',
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
        self::seedAlumno();
        $this->command->info('Tabla de alumnos inicializada con datos');
        // \App\Models\User::factory(10)->create();
    }
    private function seedAlumno(){
        DB::table('alumnes')->delete();
        foreach($this->arrayAlumnes as $alumne){
            $alumno = new Alumne;
            $alumno->nom = $alumne['nom'];
            $alumno->cognoms = $alumne['cognoms'];
            $alumno->direccio = $alumne['direccio'];
            $alumno->data_naixement = $alumne['data_naixement'];
            $alumno->dni = $alumne['dni'];
            $alumno->telefon = $alumne['telefon'];
            $alumno->mail = $alumne['mail'];
            $alumno->modificat_per = $alumne['modificat_per'];
            $alumno->save();
        }

    }
}
