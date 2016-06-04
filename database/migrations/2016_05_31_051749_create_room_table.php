<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room', function (Blueprint $table) {
            
            //P_教室テーブルID
            $table->increments('id');
            //教室名
            $table->string('roomName');
            //教室種別
            $table->string('roomKind');
            //教室定員
            $table->integer('roomCapa');
            //号館名
            $table->string('building');
            //階名
            $table->string('Floor');
            
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
        Schema::drop('room');
    }
}
