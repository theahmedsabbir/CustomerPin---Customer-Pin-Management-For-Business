<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Admin::create([
        	'username' 	=> 'admin',
        	'email' 	=> 'admin@gmail.com',
        	'password' 	=> bcrypt('123'),
        ]);
    }
}
