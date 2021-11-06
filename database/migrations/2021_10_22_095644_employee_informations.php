<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployeeInformations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_informations', function (Blueprint $table) {
            $table->id();
            $table->string('employee_code');
            $table->string('employee_name');
            $table->bigInteger('academy_id')->unsigned();
            $table->foreign('academy_id')->references('id')->on('academies')->onDelete('cascade');
            $table->bigInteger('employee_category_id')->unsigned();
            $table->foreign('employee_category_id')->references('id')->on('employee_categories')->onDelete('cascade');
            $table->bigInteger('department_id')->unsigned()->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->bigInteger('designation_id')->unsigned();
            $table->foreign('designation_id')->references('id')->on('designations')->onDelete('cascade');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('gender');
            $table->date('date_of_birth')->nullable();
            $table->string('nationality')->nullable();
            $table->string('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
