<?php
//場所の登録
namespace App\Http\Controllers;

//ライブラリの読み込み
use App\Http\Controllers\Mobile_Detect;

class deviceController extends Controller {

    public function selectDevice(){

        /*phpでスマホ,PCの判定*/
        //参照url https://syncer.jp/how-to-use-mobile-detect

        // インスタンスの作成
        $detect = new Mobile_Detect ;

        //ビューに送る用の変数
        $device = '';

        if ($detect->isMobile() || $detect->isTablet()) {
            // モバイル・タブレット
            //resources/views/sumaho.blade.php　に飛ぶ
            return view('sumaho');
        }
        else {
            // PC
            //resources/views/desktop.blade.php　に飛ぶ
            return view('pc');
        }
    }
}