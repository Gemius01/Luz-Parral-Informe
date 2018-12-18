<?php

use Illuminate\Database\Seeder;
use App\User;

class RootUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Parral Root',
	        'email' => 'luzparral',
	        'password' => '$2y$10$2dTOU5z1WEQ2mkGKLvlTjOFjeU6OTeKn.RCIQmH/968YDR.DkGsdK', // luzparralroot
	        //'remember_token' => str_random(10),
        ]);

        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 1,
        ]);
    }
}
