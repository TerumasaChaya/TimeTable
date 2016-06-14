<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AreaTableSeeder extends Seeder
{
    /**
     * データベース初期値設定の実行
     *
     * @return void
     */
    public function run()
    {
        DB::table('area')->insert([
            'id' => 1,
            'Area' =>'IT'
        ]);

        DB::table('area')->insert([
            'id' => 2,
            'Area' =>'ゲーム'
        ]);

        DB::table('area')->insert([
            'id' => 3,
            'Area' =>'クリエイター'
        ]);
    }
}
