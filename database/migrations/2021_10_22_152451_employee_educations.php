<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployeeEducations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_educations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_information_id')->unsigned();
            $table->foreign('employee_information_id')->references('id')->on('employee_informations')->onDelete('cascade');
            $table->string('academic_degree');
            $table->string('board');
            $table->string('major_subject');
            $table->string('result');
            $table->string('passing_year');
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
