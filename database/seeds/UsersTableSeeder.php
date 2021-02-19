<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


for( $i = 1; $i <= 100; $i++ ) {
            User::create([
            'id' => $i,
            'name' => 'test' .$i,
            'email' => 'aa' .$i . '@aa.com',
            'password' => Hash::make('12345678'),
            'gender' => rand(0,1),
            'age' => rand(18,30),
            'sentence' => 'はじめましてー！',
            'prefecture_id' => rand(1,47),
        ]);
    }
}
}
