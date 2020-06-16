<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       $admin = new \App\User;
       $admin->name = "Admin Penjualan 2";
       $admin->email = "admin2@penjualan.test";
       $admin->password = Hash::make("penjualan2");

       $admin->save();

    }
}
