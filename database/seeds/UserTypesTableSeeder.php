<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usertypes')->insert([[
            'user_type' => 'Admin',
        ],[
            'user_type' => 'ProjMan',
        ],[
            'user_type' => 'Dev',
        ]]);
    }
}
