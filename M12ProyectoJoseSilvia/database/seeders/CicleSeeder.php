<?php

namespace Database\Seeders;

use App\Models\Cicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        self::seedCicle();
        $this->command->info('Tabla cicles inicializada con datos');
    }
    private function seedCicle(){
        DB::table('cicles')->delete();
        $cicle = new Cicle;
        $cicle->nom = 'DAW II';
        $cicle->modificat_per = 'System';
        $cicle->save();
    }
}
