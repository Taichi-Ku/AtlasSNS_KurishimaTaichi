<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['username' => 'Atlas一郎',
            'email' => 'atlas-01@sample.com',
            'password' => Hash::make('password-01'),
            'icon_image' => 'icon1.png'],

            ['username' => 'Atlas二郎',
            'email' => 'atlas-02@sample.com',
            'password' => Hash::make('password-02'),
            'icon_image' => 'icon2.png'],

            ['username' => 'Atlas三郎',
            'email' => 'atlas-03@sample.com',
            'password' => Hash::make('password-03'),
            'icon_image' => 'icon3.png'],

            ['username' => 'Atlas四郎',
            'email' => 'atlas-04@sample.com',
            'password' => Hash::make('password-04'),
            'icon_image' => 'icon4.png'],

            ['username' => 'Atlas五郎',
            'email' => 'atlas-05@sample.com',
            'password' => Hash::make('password-05'),
            'icon_image' => 'icon5.png'],
        ]);
    }
}
