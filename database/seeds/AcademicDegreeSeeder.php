<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcademicDegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('academic_degrees')->insert([
            ['name' => 'academic_degree_1'],
            ['name' => 'academic_degree_2'],
            ['name' => 'academic_degree_3'],
        ]);
    }
}
