<?php

use Illuminate\Database\Seeder;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Teacher')->insert([
            'id' => 1,
            'TeacherName' => 'ジェイソン・ステイサム',
            'assignCollege_Id' => 1,
            'hireForm' =>'専任'
        ]);

        DB::table('Teacher')->insert([
            'id' => 2,
            'TeacherName' => 'シルベスター・スタローン',
            'assignCollege_Id' => 2,
            'hireForm' =>'非常勤'
        ]);

        DB::table('Teacher')->insert([
            'id' => 3,
            'TeacherName' => 'ロバート・ダウー・Jr',
            'assignCollege_Id' => 3,
            'hireForm' =>'非常勤'
        ]);

        DB::table('Teacher')->insert([
            'id' => 4,
            'TeacherName' => 'アーノルド・シュワルズ・ネッカー',
            'assignCollege_Id' => 1,
            'hireForm' =>'専任'
        ]);
    }
}
