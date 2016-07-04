<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admins')->truncate();
        DB::table('admins')->insert([
            'name' => 'shizuka',
            'email' => 'shizuka@namco.com',
            'password' => bcrypt('shizuka'),
        ]);
    }
}
