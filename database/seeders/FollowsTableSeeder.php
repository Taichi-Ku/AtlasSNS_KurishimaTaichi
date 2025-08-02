<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('follows')->insert([
            ['following_id' => '1', 'followed_id' => '2'],
            ['following_id' => '1', 'followed_id' => '3'],
            ['following_id' => '1', 'followed_id' => '4'],
            ['following_id' => '1', 'followed_id' => '5'],
            ['following_id' => '1', 'followed_id' => '6'],
            ['following_id' => '1', 'followed_id' => '7'],
            ['following_id' => '1', 'followed_id' => '8'],
            ['following_id' => '1', 'followed_id' => '9'],
            ['following_id' => '1', 'followed_id' => '10'],
            ['following_id' => '1', 'followed_id' => '11'],
            ['following_id' => '1', 'followed_id' => '12'],
            ['following_id' => '1', 'followed_id' => '13'],
            ['following_id' => '1', 'followed_id' => '14'],
            ['following_id' => '1', 'followed_id' => '15'],

            ['following_id' => '2', 'followed_id' => '3'],
            ['following_id' => '2', 'followed_id' => '4'],
            ['following_id' => '2', 'followed_id' => '5'],

            ['following_id' => '3', 'followed_id' => '4'],
            ['following_id' => '3', 'followed_id' => '5'],

            ['following_id' => '4', 'followed_id' => '5'],


            ['following_id' => '5', 'followed_id' => '1'],
            ['following_id' => '6', 'followed_id' => '1'],
            ['following_id' => '7', 'followed_id' => '1'],
            ['following_id' => '8', 'followed_id' => '1'],
            ['following_id' => '9', 'followed_id' => '1'],
            ['following_id' => '10', 'followed_id' => '1'],
            ['following_id' => '11', 'followed_id' => '1'],
            ['following_id' => '12', 'followed_id' => '1'],
            ['following_id' => '13', 'followed_id' => '1'],
            ['following_id' => '14', 'followed_id' => '1'],
            ['following_id' => '15', 'followed_id' => '1'],
        ]);
    }
}
