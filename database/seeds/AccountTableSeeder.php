<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AccountTableSeeder extends Seeder


{
    /**
     * データベース初期値設定の実行
     *
     * @return void
     */
    public function run()
    {
        DB::table('account')->insert([
            //P_アカウントID
            'id' => 2130000,
            //メールアドレス
            'email' =>'2130000@ecc.com',
            //パスワード
            'password' => '000000'

        ]);

        DB::table('account')->insert([
            //P_アカウントID
            'id' => 2130001,
            //メールアドレス
            'email' =>'2130001@ecc.com',
            //パスワード
            'password' => '000001'

        ]);

        DB::table('account')->insert([
            //P_アカウントID
            'id' => 2130002,
            //メールアドレス
            'email' =>'2130002@ecc.com',
            //パスワード
            'password' => '000002'

        ]);
    }
}
