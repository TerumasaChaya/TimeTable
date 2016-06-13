<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ResponsibleTeacherTableSeeder extends Seeder
{
    /**
     * データベース初期値設定の実行
     *
     * @return void
     */
    public function run()
    {
        DB::table('repTeacher')->insert([
            'id' => 1,
            'teacher_Id' => 1,
            'hrTeacherFlag' => 1
        ]);

        DB::table('repTeacher')->insert([
            'id' => 2,
            'teacher_Id' => 2,
            'hrTeacherFlag' => 0
        ]);

        DB::table('repTeacher')->insert([
            'id' => 3,
            'teacher_Id' => 3,
            'hrTeacherFlag' => 0
        ]);

        DB::table('repTeacher')->insert([
            'id' => 4,
            'teacher_Id' => 4,
            'hrTeacherFlag' => 1
        ]);
    }
}
