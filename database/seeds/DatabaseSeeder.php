<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(AccountTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(AreaTableSeeder::class);
        $this->call(ClassDayTableSeeder::class);
        $this->call(ClassTableSeeder::class);
        $this->call(CollegeTableSeeder::class);
        $this->call(ResponsibleTeacherTableSeeder::class);
        $this->call(RoomTableSeeder::class);
        $this->call(SubjectAreaTableSeeder::class);
        $this->call(SubjectTableSeeder::class);
        $this->call(TeacherTableSeeder::class);

    }
}
