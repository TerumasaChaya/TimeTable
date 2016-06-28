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

class WeekDay extends Controller
{
    public function test()
    {
        $datetime = new DateTime();
        $week = array("日", "月", "火", "水", "木", "金", "土");
        $w = (int)$datetime->format('w');

        $classId = 1;

        $classDay = classDay_table::where('class_Id','==',$classId);
        $weekDay = $classDay->where('day','==',$w);

        var_dump($classId);
        //return view('pc',['weekDay' => $weekDay]);
    }

}