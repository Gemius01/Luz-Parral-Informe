<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesSeeder::class);
        $this->call(RootUserSeeder::class);
        $this->call(DatosEstaticosSeeder::class);
        $this->call(PermisosSeederTable::class);
        $this->call(AdminPermisosSeederTable::class);
    }
}
