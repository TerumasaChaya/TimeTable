<?php
/**
 * Created by PhpStorm.
 * User: 2130109
 * Date: 2016/06/27
 * Time: 10:14
 */

namespace app\Http\Controllers;


use App\Http\Controllers\Controller;
use App\classDay_table;
use Carbon\Carbon;
use Symfony\Component\DomCrawler\Crawler;

class WeekDay extends Controller
{
    public function getDay()
    {
        //現在時刻の取得
        $date = new Carbon(Carbon::now());

        //曜日配列の生成
        $week = array('日', '月', '火', '水', '木', '金', '土');

        //現在の曜日取得
        $w = $week[$date->dayOfWeek];

        //クラスID取得
        $classId = 1;

        //classDay_tableのクラスID、曜日が合致した行をすべて取得
        $classDay = classDay_table::where('class_Id','=',$classId)
            ->where('day','=', $w)
            ->get();


//        var_dump($w);
//        var_dump($classDay->subject->subject);
        return view('pc',['classDay' => $classDay]);
    }

}