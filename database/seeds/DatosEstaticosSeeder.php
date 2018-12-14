<?php

use Illuminate\Database\Seeder;
use App\Datos;

class DatosEstaticosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Datos::create([
            'rut_empresa' => '96884450',
            'dv' => '4',
            'cod_empresa' => '420',
            'region' => 7,

        ]);
    }
}
