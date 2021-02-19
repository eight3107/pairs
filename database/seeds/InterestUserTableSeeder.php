<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InterestUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('interest_user')->insert([
            [
            'interest_id' => 2,
            'user_id' => 2
            ],
            [
            'interest_id' => 2,
            'user_id' => 3
            ],
            [
            'interest_id' => 2,
            'user_id' => 4
            ],
            [
            'interest_id' => 3,
            'user_id' => 5
            ],
            [
            'interest_id' => 2,
            'user_id' => 6
            ]
            ]);
    }
}
