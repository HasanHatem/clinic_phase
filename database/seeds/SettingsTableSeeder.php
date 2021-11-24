<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'facebook' => 'https://facebook.com',
            'instagram' => 'https://instagram.com',
            'mobile_number' => '05123456789'
        ]);

        DB::table('setting_translations')->insert([
            'locale' => 'ar',
            'name' => 'Clinic Phase',
            'setting_id' => 1
        ]);

        DB::table('setting_translations')->insert([
            'locale' => 'en',
            'name' => 'Clinic Phase',
            'setting_id' => 1
        ]);
    }
}
