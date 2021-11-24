<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'      => 'Rami Esber',
            'email'     => 'resber83@gmail.com',
            'password'  => Hash::make('123123123'),
            'is_admin'  => 1
        ]);

        DB::table('users')->insert([
            'name'      => 'Hasan Hatem',
            'email'     => 'hasan.hatem95@gmail.com',
            'password'  => Hash::make('123123123'),
            'is_admin'  => 1
        ]);
    }
}
