<?php

use App\SmsStudent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\factory\SmsStudentFactory;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AcademiesSeeder::class);
        $this->call(AcademicDegreeSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(DesignationSeeder::class);
        $this->call(EmployeeCategoriesSeeder::class);
        $this->call(UserSeeder::class);
        
    }
}
