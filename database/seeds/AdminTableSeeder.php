<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AdminTableSeeder extends Seeder


{
    /**
     * データベース初期値設定の実行
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            //P_管理者ID
            'id' => 0000000,
            //管理者名
            'adminName' =>'adminName001',
            //F_アカウントID
            'account_Id' => '2130000'

        ]);

        DB::table('admin')->insert([
            //P_管理者ID
            'id' => 0000001,
            //管理者名
            'adminName' =>'adminName002',
            //F_アカウントID
            'account_Id' => '2130001'
        ]);

        DB::table('admin')->insert([
            //P_管理者ID
            'id' => 0000002,
            //管理者名
            'adminName' =>'adminName003',
            //F_アカウントID
            'account_Id' => '2130002'

        ]);
    }
}
