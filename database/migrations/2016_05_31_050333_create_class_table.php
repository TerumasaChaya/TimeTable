<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class', function (Blueprint $table) {

            //P_クラスID
            $table->increments('id');
            //F_教師ID
            $table->integer('teacher_Id');
            //クラス名
            $table->string('className');
            //学年
            $table->integer('grade');
            //学科名
            $table->string('dept');
            //コース名
            $table->string('course');
            //カレッジ名
            $table->string('college');
            //クラス人数
            $table->integer('person');
            
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
        Schema::drop('class');
    }
}
