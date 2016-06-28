<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repTeacher', function (Blueprint $table) {
            //P_担当教師ID
            $table->increments('id');
            //F_教師名ID
            $table->integer('teacher_Id');
            //F_科目ID
            $table->integer('subject_Id');
            //役割
            $table->string('role');
            
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
        Schema::drop('repTeacher');
    }
}
