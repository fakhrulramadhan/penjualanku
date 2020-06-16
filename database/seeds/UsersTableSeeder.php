<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([

        	'name' => 'Admin Penjualan',
        	'email' => 'admin@penjualan.test',
        	'password' => bcrypt('penjualan'),
        	'status' => true
        ]);
    }
}
