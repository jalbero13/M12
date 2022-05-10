<?php

namespace Database\Seeders;

use App\Models\Uf;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UfSeeder extends Seeder
{
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
        $uf1 = new Uf;
        $uf1->nom = 'UF1';
        $uf1->descripcio = 'Sintaxi del llenguatge. Objectes predefinits del llenguatge';
        $uf1->modificat_per = 'System';
        $uf1->hores = '40';
        $uf1->cicle_id = '1';
        $uf1->save();
        $uf2 = new Uf;
        $uf2->nom = 'UF2';
        $uf2->descripcio = 'Estructures definides pel programador. Objectes';
        $uf2->modificat_per = 'System';
        $uf2->hores = '40';
        $uf2->cicle_id = '1';
        $uf2->save();
    }
}
