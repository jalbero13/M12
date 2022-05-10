<?php

namespace Database\Seeders;

use App\Models\Modul;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModulSeeder extends Seeder
{
    private $arrayModuls = array(
		array(
			'nom' => 'M06',
            'descripcio' =>'Desenvolupament Web en entorn Client',
			'modificat_per' => 'System',
            'hores' =>'400',
            'cicle_id' =>2
		),
		array(
			'nom' => 'M03',
            'descripcio' =>'Programació II',
			'modificat_per' => 'System',
            'hores' =>'500',
            'cicle_id' => 2
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
        self::seedModul();
        $this->command->info('Tabla moduls inicializada con datos');
    }
    private function seedModul(){
        DB::table('moduls')->delete();
        foreach($this->arrayModuls as $modul){
            $modulo = new Modul;
            $modulo->nom = $modul['nom'];
            $modulo->descripcio = $modul['descripcio'];
            $modulo->modificat_per = $modul['modificat_per'];
            $modulo->hores = $modul['hores'];
            $modulo->cicle_id = $modul['cicle_id'];
            $modulo->save();
        }

    }
}
