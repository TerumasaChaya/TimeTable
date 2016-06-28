<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject', function (Blueprint $table) {

            //P_科目ID
            $table->increments('id');
            //科目名
            $table->string('subject');
            //F_分野ID
            $table->integer('area_Id');
            //使用PC名
            $table->string('usePC');
            //使用ハード名
            $table->string('useHard');
            //区分
            $table->string('part');
            //単位
            $table->integer('credits');
            //前期講義数
            $table->integer('firstLecture');
            //前期演習数
            $table->integer('firstExercises');
            //後期講義数
            $table->integer('secondLecture');
            //後期演習数
            $table->integer('secondExercises');
            //科目概要
            $table->string('subjectOverview');
            
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
        Schema::drop('subject');
    }
}
