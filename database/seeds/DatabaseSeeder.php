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
        DB::table('users')->insert([
         "name"=>'superadmin',
         'email'=>'topadmin@gmail.com',
         'password'=> Hash::make("secret"),
         'isactive'=>'1',
         'image'=>'image',
         'role'=>'admin'
        ]);
    }
}
