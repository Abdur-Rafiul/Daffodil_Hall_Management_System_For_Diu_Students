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
        Schema::create('login_hostel',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('student_id');
            $table->string('student_name');
            $table->string('student_Email');
            $table->string('student_Phone');
            $table->string('student_Password');
           
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
