<?php
/**
 * Created by PhpStorm.
 * User: 2130109
 * Date: 2016/06/14
 * Time: 14:39
 */

namespace App\Http\Controllers\DataBaseControllers;

use App\Http\Controllers\Controller;
use App\room_table;
use App\subject_table;
use App\classDay_table;
use App\class_table;

class TestDataBaseController extends Controller{
    public function  test(){

        $class = class_table::find(1);
        $class_cd = $class->classDay;

//        $subject = classDay_table::where('subject_Id','=','1')->get();
//
//        //var_dump($s);
//
//        foreach ($subject as $ss){
//            var_dump($ss->id);
//        }

        $mon = array();
        $tue = array();
        $wed = array();
        $thu = array();
        $fri = array();


        $first = array();
        $second = array();
        $third = array();
        $fourth = array();


        foreach ($class_cd as $classDay) {

            if($classDay->day == "月"){
               $mon[$classDay->period] = $classDay->subject->subject;
            }

            if($classDay->day == "火"){
                $tue[$classDay->period] = $classDay->subject->subject;
            }

            if($classDay->day == "水"){
                $wed[$classDay->period] = $classDay->subject->subject;
            }

         }
        //print($mon. "<br />");
        print_r($mon);
        print("<br />");
        print_r($tue);
        print("<br />");
        print_r($wed);
    }



}
