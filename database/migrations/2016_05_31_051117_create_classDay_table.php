<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassDayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classDay', function (Blueprint $table) {

            //P_クラス曜日ID
            $table->increments('id');
            //F_科目ID
            $table->integer('subject_Id');
            //F_教室ID
            $table->integer('room_Id');
            //F_クラスID
            $table->integer('class_Id');
            //曜日
            $table->string('day');
            //時限
            $table->integer('period');
            
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
        Schema::drop('classDay');
    }
}
