<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectAreaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjectArea', function (Blueprint $table) {
            
            ///P_科目分野ID
            $table->increments('id');
            //F_科目分野ID
            $table->integer('area_Id');
            //科目分野名
            $table->string('subjectArea');
            
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
        Schema::drop('subjectArea');
    }
}
