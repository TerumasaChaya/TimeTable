<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class RoomTableSeeder extends Seeder
{
    /**
     * データベース初期値設定の実行
     *
     * @return void
     */
    public function run()
    {
        DB::table('room')->insert([
            'id' => 1,
            'roomName' => '1201',
            'roomKind' => '講義教室',
            'roomCapa' => 40,
            'building' => '1号館',
            'Floor' => '2階'
        ]);

        DB::table('room')->insert([
            'id' => 2,
            'roomName' => '2403',
            'roomKind' => '実習教室',
            'roomCapa' => 30,
            'building' => '2号館',
            'Floor' => '4階'
        ]);

        DB::table('room')->insert([
            'id' => 3,
            'roomName' => '3301',
            'roomKind' => 'ノートPC対応教室',
            'roomCapa' => 40,
            'building' => '3号館',
            'Floor' => '3階'
        ]);

    }
}
