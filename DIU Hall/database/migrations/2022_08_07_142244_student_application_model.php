<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submit',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('student_id');
            $table->string('student_name');
            $table->string('student_img');
            $table->string('student_fatherName');
            $table->string('student_fatherContact');
            $table->string('student_motherName');
            $table->string('student_motherContact');
            $table->string('floor_name');
            $table->string('unit_name');
            $table->string('profession');
            $table->string('student_des');
            $table->string('student_age');
            $table->string('student_phone');
            $table->string('student_email');
            $table->string('student_university');
            $table->string('DOB');
            $table->string('student_presentAddress');
            $table->string('student_permanentAddress');
            $table->string('admin_permission');
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
};
