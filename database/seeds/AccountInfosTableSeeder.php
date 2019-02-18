<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountInfosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Modules\AccountInfo\Models\AccountInfo::class, 15)->create();
    }
}
