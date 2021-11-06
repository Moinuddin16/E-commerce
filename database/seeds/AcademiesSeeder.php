<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcademiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('academies')->insert([
            ['name' => 'academies_1'],
            ['name' => 'academies_2'],
            ['name' => 'academies_3'],
        ]);
    }
}
