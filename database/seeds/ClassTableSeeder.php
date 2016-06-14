<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ClassTableSeeder extends Seeder


{
    /**
     * データベース初期値設定の実行
     *
     * @return void
     */
    public function run()
    {
        DB::table('class')->insert([
            'id' => 1,
            'className' =>'IE1A',
            'grade' => 1,
            'dept' => '高度情報処理研究学科',
            'course' => 'IT開発エキスパートコース',
            'college' => 'ITカレッジ',
            'person' => 30
        ]);

        DB::table('class')->insert([
            'id' => 2,
            'className' =>'GO2A',
            'grade' => 2,
            'dept' => 'マルチメディア研究学科',
            'course' => 'ゲームプログラム開発コース',
            'college' => 'ゲームカレッジ',
            'person' => 20
        ]);

        DB::table('class')->insert([
            'id' => 3,
            'className' =>'CG3A',
            'grade' => 3,
            'dept' => 'マルチメディア研究学科',
            'course' => 'CGデザインコース',
            'college' => 'CGカレッジ',
            'person' => 40
        ]);
    }
}
