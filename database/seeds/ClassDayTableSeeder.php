<?php
use Illuminate\Database\Seeder;

class ClassDayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classDay')->insert([
            'id' => 1,
            'class_Id' => 1,
            'day' => '月',
            'period' =>1,
            'subject_Id' => 1,
        ]);

        DB::table('classDay')->insert([
            'id' => 2,
            'class_Id' => 2,
            'day' => '火',
            'period' =>1,
            'subject_Id' => 1,
        ]);

        DB::table('classDay')->insert([
            'id' => 3,
            'class_Id' => 3,
            'day' => '水',
            'period' =>1,
            'subject_Id' => 2,
        ]);

        DB::table('classDay')->insert([
            'id' => 4,
            'class_Id' => 1,
            'day' => '木',
            'period' =>1,
            'subject_Id' => 3,
        ]);

        DB::table('classDay')->insert([
            'id' => 5,
            'class_Id' => 2,
            'day' => '金',
            'period' =>3,
            'subject_Id' => 4,
        ]);
    }
}
