<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->truncate();
        DB::table('users')->insert([
            'name' => 'chihaya',
            'email' => 'chihaya@namco.com',
            'password' => bcrypt('chihaya'),
            'class' => 'ie4a',
        ]);
    }
}
