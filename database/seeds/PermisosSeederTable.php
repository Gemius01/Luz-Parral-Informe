<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermisosSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        Permission::create([
        	'name' => 'Mostrar Datos',
        	'slug' => 'datos.index',
        	'description' => 'Muestra los datos estáticos',
        ]);
        Permission::create([
        	'name' => 'Editar Datos',
        	'slug' => 'datos.edit',
        	'description' => 'Edición de los datos estáticos',
        ]);
        
    }
}
