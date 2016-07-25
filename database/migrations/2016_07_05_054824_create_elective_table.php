<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElectiveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elective', function (Blueprint $table) {
            //P_選択科目ID
            $table->increments('id');
            //F_ユーザーID
            $table->integer('user_Id');
            //F_科目ID
            $table->integer('subject_Id');
            //許可フラグ
            $table->boolean('permit');

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
        Schema::drop('elective');
    }
}
