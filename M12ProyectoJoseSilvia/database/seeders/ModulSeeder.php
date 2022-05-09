<?php

namespace Database\Seeders;

use App\Models\Modul;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModulSeeder extends Seeder
{
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
        $modul1 = new Modul;
        $modul1->nom = 'M07';
        $modul1->descripcio = 'Desenvolupament daplicacions web';
        $modul1->hores = '150';
        $modul1->modificat_per = 'System';
        $modul1->cicle_id = '1';
        $modul1->save();

    }
}
