<?php

use Illuminate\Database\Seeder;

class CollegeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('college')->insert([
            'id' => 1,
            'collegeName' => 'ITカレッジ',

        ]);

        DB::table('college')->insert([
            'id' => 2,
            'collegeName' => 'ゲームカレッジ',


        ]);

        DB::table('college')->insert([
            'id' => 3,
            'collegeName' => 'デザインカレッジ',

        ]);
    }
}
