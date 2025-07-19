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
            [
                'username' => 'Atlas一郎',
                'email' => 'atlas-01@sample.com',
                'password' => Hash::make('password01'),
                'bio' => '初めまして！',
                'icon_image' => 'icons/icon1.png'
            ],

            [
                'username' => 'Atlas二郎',
                'email' => 'atlas-02@sample.com',
                'password' => Hash::make('password02'),
                'bio' => '初めまして！！',
                'icon_image' => 'icons/icon2.png'
            ],

            [
                'username' => 'Atlas三郎',
                'email' => 'atlas-03@sample.com',
                'password' => Hash::make('password03'),
                'bio' => '初めまして！！！',
                'icon_image' => 'icons/icon3.png'
            ],

            [
                'username' => 'Atlas四郎',
                'email' => 'atlas-04@sample.com',
                'password' => Hash::make('password04'),
                'bio' => '初めまして！！！！',
                'icon_image' => 'icons/icon4.png'
            ],

            [
                'username' => 'Atlas五郎',
                'email' => 'atlas-05@sample.com',
                'password' => Hash::make('password05'),
                'bio' => '初めまして！！！！！',
                'icon_image' => 'icons/icon5.png'
            ],

            [
                'username' => 'Atlas六郎',
                'email' => 'atlas-06@sample.com',
                'password' => Hash::make('password06'),
                'bio' => '初めまして！',
                'icon_image' => 'icons/icon6.png'
            ],

            [
                'username' => 'Atlas七郎',
                'email' => 'atlas-07@sample.com',
                'password' => Hash::make('password07'),
                'bio' => '初めまして！！',
                'icon_image' => 'icons/icon7.png'
            ],

            [
                'username' => 'Atlas八郎',
                'email' => 'atlas-08@sample.com',
                'password' => Hash::make('password08'),
                'bio' => '初めまして！！！',
                'icon_image' => 'icons/icon1.png'
            ],

            [
                'username' => 'Atlas九郎',
                'email' => 'atlas-09@sample.com',
                'password' => Hash::make('password09'),
                'bio' => '初めまして！！！！',
                'icon_image' => 'icons/icon2.png'
            ],

            [
                'username' => 'Atlas十郎',
                'email' => 'atlas-10@sample.com',
                'password' => Hash::make('password10'),
                'bio' => '初めまして！！！！！',
                'icon_image' => 'icons/icon3.png'
            ],

            [
                'username' => 'Atlas十一郎',
                'email' => 'atlas-11@sample.com',
                'password' => Hash::make('password11'),
                'bio' => '初めまして！',
                'icon_image' => 'icons/icon4.png'
            ],

            [
                'username' => 'Atlas十二郎',
                'email' => 'atlas-12@sample.com',
                'password' => Hash::make('password12'),
                'bio' => '初めまして！！',
                'icon_image' => 'icons/icon5.png'
            ],

            [
                'username' => 'Atlas十三郎',
                'email' => 'atlas-13@sample.com',
                'password' => Hash::make('password13'),
                'bio' => '初めまして！！！',
                'icon_image' => 'icons/icon6.png'
            ],

            [
                'username' => 'Atlas十四郎',
                'email' => 'atlas-14@sample.com',
                'password' => Hash::make('password14'),
                'bio' => '初めまして！！！！',
                'icon_image' => 'icons/icon7.png'
            ],

            [
                'username' => 'Atlas十五郎',
                'email' => 'atlas-15@sample.com',
                'password' => Hash::make('password15'),
                'bio' => '初めまして！！！！！',
                'icon_image' => 'icons/icon1.png'
            ],
        ]);
    }
}
