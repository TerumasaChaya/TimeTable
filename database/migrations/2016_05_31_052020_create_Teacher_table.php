<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Teacher', function (Blueprint $table) {

            //P_教師ID
            $table->increments('id');
            //教師名
            $table->string('TeacherName');
            //F_所属カレッジID
            $table->integer('assignCollege_Id');
            //雇用形態
            $table->string('hireForm');
            
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
        Schema::drop('Teacher');
    }
}
