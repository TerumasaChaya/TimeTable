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
            //授業担当...メイン
            $table->string('subrep_m');
            //授業担当...チューター
            $table->string('subrep_t');
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
