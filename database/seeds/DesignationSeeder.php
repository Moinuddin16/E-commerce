<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('designations')->insert([
            ['name' => 'designation_1'],
            ['name' => 'designation_2'],
            ['name' => 'designation_3'],
        ]);
    }
}
