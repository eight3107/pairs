<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InterestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('interests')->insert([
            [
            'id' => 1,
            'name' => '野球好き',
            ],
            [
            'id' => 2,
            'name' => 'サッカー好き',
            ],
            [
            'id' => 3,
            'name' => '映画好き',
            ],
            [
            'id' => 4,
            'name' => '温泉好き',
            ],
            [
            'id' => 5,
            'name' => '旅行好き',
            ],
            [
            'id' => 6,
            'name' => 'ギャンブル好き',
            ],
            [
            'id' => 7,
            'name' => 'ライブ好き',
            ],
            [
            'id' => 8,
            'name' => '音楽好き',
            ],
            [
            'id' => 9,
            'name' => 'スイーツ好き',
            ],

      ]);
    }
}
