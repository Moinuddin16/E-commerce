<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['username' => "admin" ,"is_admin"=>1, "password" => '$2y$10$S8JdcagN45xfzj26hO8WbOp6ly0g3q6ibpwaJ8ntGdHNI9xtzr8B.'],
            ['username' => "user_0" ,"is_admin"=>0, "password" => '$2y$10$S8JdcagN45xfzj26hO8WbOp6ly0g3q6ibpwaJ8ntGdHNI9xtzr8B.'],
            ['username' => "user_1" ,"is_admin"=>0, "password" => '$2y$10$S8JdcagN45xfzj26hO8WbOp6ly0g3q6ibpwaJ8ntGdHNI9xtzr8B.'],
            ['username' => "user_2" ,"is_admin"=>0, "password" => '$2y$10$S8JdcagN45xfzj26hO8WbOp6ly0g3q6ibpwaJ8ntGdHNI9xtzr8B.'],
            ['username' => "user_3" ,"is_admin"=>0, "password" => '$2y$10$S8JdcagN45xfzj26hO8WbOp6ly0g3q6ibpwaJ8ntGdHNI9xtzr8B.'],
            ['username' => "user_4" ,"is_admin"=>0, "password" => '$2y$10$S8JdcagN45xfzj26hO8WbOp6ly0g3q6ibpwaJ8ntGdHNI9xtzr8B.'],
        ]);
    }
}
