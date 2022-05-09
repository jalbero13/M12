<?php

namespace Database\Seeders;

use App\Models\Alumne;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlumneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
      
    }
    private function seedAlumne(){
        DB::table('alumnes')->delete();
        $alumne = new Alumne;
        $alumne->nom = 'Almudena';
        $alumne->cognoms = 'Garcia Pérez';
        $alumne->direccio = 'Carrer de les roses 14, El Vendrell (Tarragona)';
        $alumne->data_naixement = '23-02-2003';
        $alumne->dni = '09865642E';
        $alumne->telefon = '654879123';
        $alumne->modificat_per = 'System';
        $alumne->save();
    }
}
