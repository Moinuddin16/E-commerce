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
            ['username' => "admin" , "password" => '$2y$10$S8JdcagN45xfzj26hO8WbOp6ly0g3q6ibpwaJ8ntGdHNI9xtzr8B.'],
        ]);
    }
}
