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
        $this->call(PrefecturesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(InterestsTableSeeder::class);
        $this->call(InterestUserTableSeeder::class);
    }
}
