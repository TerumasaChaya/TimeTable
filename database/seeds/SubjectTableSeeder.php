<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SubjectTableSeeder extends Seeder
{
    /**
     * データベース初期値設定の実行
     *
     * @return void
     */
    public function run()
    {
        DB::table('subject')->insert([
            'id' => 1,
            'subject' => 'C言語',
            'area_Id' => 1,
            'usePC' => '',
            'useHard' => '',
            'part' => '講義',
            'credits' => 2,
            'role' => 'メイン',
            'firstLecture' => 1,
            'firstExercises' => 1,
            'secondLecture' => 0,
            'secondExercises' => 0,
            'subjectOverview' => '代表的プログラミング言語であるＣ言語の基本を学び、プログラミング能力の基礎を習得する。',
            'subject_Id' => 1,
            'room_Id' => 1,
            'repTeacher_Id' => 1
        ]);


        DB::table('subject')->insert([
            'id' => 2,
            'subject' => 'ゲーム3Dデザイン演習',
            'area_Id' => 2,
            'usePC' => '',
            'useHard' => '',
            'part' => '演習',
            'credits' => 2,
            'role' => 'チューター',
            'firstLecture' => 0,
            'firstExercises' => 0,
            'secondLecture' => 1,
            'secondExercises' => 1,
            'subjectOverview' => '3Dデザインの練習',
            'subject_Id' => 2,
            'room_Id' => 2,
            'repTeacher_Id' => 2
        ]);

        DB::table('subject')->insert([
            'id' => 3,
            'subject' => '国語',
            'area_Id' => 3,
            'usePC' => '電子辞書',
            'useHard' => '広辞苑',
            'part' => '演習',
            'credits' => 100,
            'role' => 'メイン',
            'firstLecture' => 2,
            'firstExercises' => 2,
            'secondLecture' => 2,
            'secondExercises' => 2,
            'subjectOverview' => '日本語勉強しろ',
            'subject_Id' => 3,
            'room_Id' => 3,
            'repTeacher_Id' => 3
        ]);
        
        

    }
}
