<?php
/**
 * Created by PhpStorm.
 * User: 2130109
 * Date: 2016/06/27
 * Time: 10:14
 */

namespace App\Http\Controllers\DataBaseControllers;


use App\Http\Controllers\Controller;
use App\classDay_table;
use App\subject_table;
use App\room_table;
use Carbon\Carbon;
use Auth;
use Symfony\Component\DomCrawler\Crawler;

class Day extends Controller
{
    //1日分の時間割表示
    public function getDay()
    {

        //現在時刻の取得
        $date = new Carbon(Carbon::now());

        //曜日配列の生成
        $week = array('日', '月', '火', '水', '木', '金', '土');

        //現在の曜日取得
        $w = $week[$date->dayOfWeek];

        //クラスID取得
        $classId = Auth::user()->class;

        //classDay_tableのクラスID、曜日が合致した行をすべて取得
        $weekDay = classDay_table::distinct()
            ->where('class_Id','=',$classId)
            ->where('day','=', $w)
            ->groupBy('period')
            ->orderBy('period', 'ASC')
            ->distinct()
            ->get();

//        var_dump($w)
//        var_dump($weekDay);
        //ビューにテーブルのデータ送信
        return view('user.day',['weekDay' => $weekDay]);
    }

    //授業の詳細を表示
    public function getInfo($id){

        $day = classDay_table::where('id','=',$id)
            ->first();
        

//        var_dump($day->room->id);
        return view('user.subject-info',['day' => $day],['room' => $day->room]);
    }
}