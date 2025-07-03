<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            ['user_id' => '1', 'post' => 'おはよう'],
            ['user_id' => '1', 'post' => 'こんにちは'],
            ['user_id' => '1', 'post' => 'こんばんは'],

            ['user_id' => '2', 'post' => 'User2の投稿です。'],

            ['user_id' => '3', 'post' => 'User3の投稿です。'],

            ['user_id' => '4', 'post' => 'User4の投稿です。'],

            ['user_id' => '5', 'post' => 'User5の投稿です。'],

            ['user_id' => '6', 'post' => 'User6の投稿です。'],

            ['user_id' => '7', 'post' => 'User7の投稿です。'],

            ['user_id' => '8', 'post' => 'User8の投稿です。'],

            ['user_id' => '9', 'post' => 'User9の投稿です。'],

            ['user_id' => '10', 'post' => 'User10の投稿です。'],

            ['user_id' => '11', 'post' => 'User11の投稿です。'],

            ['user_id' => '12', 'post' => 'User12の投稿です。'],

            ['user_id' => '13', 'post' => 'User13の投稿です。'],

            ['user_id' => '14', 'post' => 'User14の投稿です。'],

            ['user_id' => '15', 'post' => 'User15の投稿です。'],
        ]);
    }
}
