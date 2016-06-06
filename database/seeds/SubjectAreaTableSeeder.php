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
            'areaid' => 1,
            'Area' => '情報処理'
        ]);

        DB::table('subjectArea')->insert([
            'id' => 1,
            'areaid' => 2,
            'Area' => 'ネットワーク'
        ]);

        DB::table('subjectArea')->insert([
            'id' => 1,
            'areaid' => 3,
            'Area' => 'DB'
        ]);

        DB::table('subjectArea')->insert([
            'id' => 2,
            'areaid' => 1,
            'Area' => 'ゲームCG'
        ]);

        DB::table('subjectArea')->insert([
            'id' => 2,
            'areaid' => 2,
            'Area' => 'ゲームプログラミング（基礎）'
        ]);

        DB::table('subjectArea')->insert([
            'id' => 2,
            'areaid' => 3,
            'Area' => 'ゲーム企画（制作進行）'
        ]);

        DB::table('subjectArea')->insert([
            'id' => 3,
            'areaid' => 1,
            'Area' => 'CG'
        ]);

        DB::table('subjectArea')->insert([
            'id' => 3,
            'areaid' => 2,
            'Area' => 'アニメーション制作'
        ]);

        DB::table('subjectArea')->insert([
            'id' => 3,
            'areaid' => 3,
            'Area' => 'クリエイター作品制作'
        ]);

    }
}
