<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SubjectAreaTableSeeder extends Seeder
{
    /**
     * データベース初期値設定の実行
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjectArea')->insert([
            'id' => 1,
            'area_id' => 1,
            'subjectArea' => '情報処理'
        ]);

        DB::table('subjectArea')->insert([
            'id' => 2,
            'area_id' => 2,
            'subjectArea' => 'ネットワーク'
        ]);

        DB::table('subjectArea')->insert([
            'id' => 3,
            'area_id' => 3,
            'subjectArea' => 'DB'
        ]);

        DB::table('subjectArea')->insert([
            'id' => 4,
            'area_id' => 1,
            'subjectArea' => 'ゲームCG'
        ]);

        DB::table('subjectArea')->insert([
            'id' => 5,
            'area_id' => 2,
            'subjectArea' => 'ゲームプログラミング（基礎）'
        ]);

        DB::table('subjectArea')->insert([
            'id' => 6,
            'area_id' => 3,
            'subjectArea' => 'ゲーム企画（制作進行）'
        ]);

        DB::table('subjectArea')->insert([
            'id' => 7,
            'area_id' => 1,
            'subjectArea' => 'CG'
        ]);

        DB::table('subjectArea')->insert([
            'id' => 8,
            'area_id' => 2,
            'subjectArea' => 'アニメーション制作'
        ]);

        DB::table('subjectArea')->insert([
            'id' => 9,
            'area_id' => 3,
            'subjectArea' => 'クリエイター作品制作'
        ]);

    }
}
