<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee_categories')->insert([
            ['academy_id'=>1,'name' => 'employee_categories_1_1'],
            ['academy_id'=>1,'name' => 'employee_categories_1_2'],
            ['academy_id'=>1,'name' => 'employee_categories_1_3'],
            ['academy_id'=>2,'name' => 'employee_categories_2_1'],
            ['academy_id'=>2,'name' => 'employee_categories_2_2'],
            ['academy_id'=>2,'name' => 'employee_categories_2_3'],
            ['academy_id'=>3,'name' => 'employee_categories_3_1'],
            ['academy_id'=>3,'name' => 'employee_categories_3_2'],
            ['academy_id'=>3,'name' => 'employee_categories_3_3'],
        ]);
    }
}
