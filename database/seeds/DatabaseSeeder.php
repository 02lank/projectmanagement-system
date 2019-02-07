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
        $this->call(AccountInfosTableSeeder::class);
        $this->call(UserTypesTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(AccountsTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(TasksTableSeeder::class);
    }
}
