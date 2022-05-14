<?php

namespace Database\Seeders;

use App\Models\Uf;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UfSeeder extends Seeder
{
    private $arrayUfs = array(
		array(
			'nom' => 'UF1',
            'descripcio' =>'Sintaxi del llenguatge. Objectes predefinits del llenguatge',
            'hores' => 40,
			'modificat_per' => 'System', 
            'modul_id' => 1
		),
		array(
			'nom' => 'UF2',
            'descripcio' =>'Estructures definides pel programador. Objectes',
            'hores' => 40,
			'modificat_per' => 'System', 
            'modul_id' => 1,
        ),
        array(
			'nom' => 'UF4',
            'descripcio' =>'Programació orientada a objectes. Fonaments',
            'hores' => 40,
			'modificat_per' => 'System', 
            'modul_id' => 2
		),
		array(
			'nom' => 'UF5',
            'descripcio' =>'POO. Llibreries de classes fonamentals',
            'hores' => 40,
			'modificat_per' => 'System', 
            'modul_id' => 2,
		)
	);
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        self::seedUf();
        $this->command->info('Tabla ufs inicializada con datos');
    }
    private function seedUf(){
        DB::table('ufs')->delete();
        foreach($this->arrayUfs as $ufs){
            $uf = new Uf;
            $uf->nom = $ufs['nom'];
            $uf->descripcio = $ufs['descripcio'];
            $uf->modificat_per = $ufs['modificat_per'];
            $uf->hores = $ufs['hores'];
            $uf->modul_id = $ufs['modul_id'];
            $uf->save();
        }
    }
}
