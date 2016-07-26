<?php
/**
 * Created by PhpStorm.
 * User: 2130109
 * Date: 2016/06/14
 * Time: 14:39
 */

namespace App\Http\Controllers\DataBaseControllers;

use App\classDay_table;
use App\Http\Controllers\Controller;
use App\room_table;
use App\subject_table;
use App\elective_table;
use App\class_table;

use Auth;

class TestDataBaseController extends Controller{
    public function  test(){

        $class = class_table::where('id',Auth::user()->class)->first();
        $class_cd = $class->classDay;

        $elective = elective_table::where('user_Id',Auth::user()->id)->where('permit',1)->get();





        $mon = $tue = $wed = $thu = $fri= array(
            array('period'=>1,'subject'=>'','class'=>'','teacher'=>''),
            array('period'=>2,'subject'=>'','class'=>'','teacher'=>''),
            array('period'=>3,'subject'=>'','class'=>'','teacher'=>''),
            array('period'=>4,'subject'=>'','class'=>'','teacher'=>''),
            array('period'=>5,'subject'=>'','class'=>'','teacher'=>''));

        $weekDay = array();

        $weekPeriod = array();

        $day = array ('period','subject','class','teacher');
        $period = array('period','subject', 'class', 'teacher');




        foreach ($class_cd as $classDay) {
            $subjectName = $classDay;
            $roomName = $classDay->room;
            $teacherName = $classDay->mainTeacher;
            //$teacherName = $classDay->subject->repTeacher->first()->Teacher->TeacherName;


            if($classDay->day == "月"){

                $a = array($classDay->period -1  => array_combine($day, array($classDay->period, $subjectName ,$roomName,$teacherName)));
                $mon = array_replace($mon,$a);
            }
            if($classDay->day == "火"){

                $a = array($classDay->period -1  => array_combine($day, array($classDay->period, $subjectName ,$roomName,$teacherName)));
               $tue = array_replace($tue,$a);

            }
            if($classDay->day == "水"){

                $a = array($classDay->period -1  => array_combine($day, array($classDay->period, $subjectName ,$roomName,$teacherName)));
                $wed = array_replace($wed,$a);

            }
            if($classDay->day == "木"){

                $a = array($classDay->period -1  => array_combine($day, array($classDay->period, $subjectName ,$roomName,$teacherName)));
                $thu = array_replace($thu,$a);
            }
            if($classDay->day == "金"){

                $a = array($classDay->period -1  => array_combine($day, array($classDay->period, $subjectName ,$roomName,$teacherName)));
                $fri = array_replace($fri,$a);

                }
            }

        foreach ($elective as $e){
            $classD = classDay_table::where('subject_Id',$e->subject_Id)->first();

            $subjectName = $classD;
            $roomName = $classD->room;
            $teacherName = $classD->mainTeacher;

            if($classD->day == "月"){

                $a = array($classD->period -1  => array_combine($day, array($classD->period, $subjectName ,$roomName,$teacherName)));
                $mon = array_replace($mon,$a);
            }
            if($classD->day == "火"){

                $a = array($classD->period -1  => array_combine($day, array($classD->period, $subjectName ,$roomName,$teacherName)));
                $tue = array_replace($tue,$a);

            }
            if($classD->day == "水"){

                $a = array($classD->period -1  => array_combine($day, array($classD->period, $subjectName ,$roomName,$teacherName)));
                $wed = array_replace($wed,$a);

            }
            if($classD->day == "木"){

                $a = array($classD->period -1  => array_combine($day, array($classD->period, $subjectName ,$roomName,$teacherName)));
                $thu = array_replace($thu,$a);
            }
            if($classD->day == "金"){

                $a = array($classD->period -1  => array_combine($day, array($classD->period, $subjectName ,$roomName,$teacherName)));
                $fri = array_replace($fri,$a);

            }
        }


            //echo ($classD->day);



        //array_push($weekDay,$mon,$tue,$wed,$thu,$fri);




        for($i=0;$i<5;$i++){
            array_push($weekPeriod,array_combine($period,array($mon[$i]['period'],$mon[$i]['subject'],$mon[$i]['class'],$mon[$i]['teacher']))) ;
            array_push($weekPeriod,array_combine($period,array($tue[$i]['period'],$tue[$i]['subject'],$tue[$i]['class'],$tue[$i]['teacher']))) ;
            array_push($weekPeriod,array_combine($period,array($wed[$i]['period'],$wed[$i]['subject'],$wed[$i]['class'],$wed[$i]['teacher']))) ;
            array_push($weekPeriod,array_combine($period,array($thu[$i]['period'],$thu[$i]['subject'],$thu[$i]['class'],$thu[$i]['teacher']))) ;
            array_push($weekPeriod,array_combine($period,array($fri[$i]['period'],$fri[$i]['subject'],$fri[$i]['class'],$fri[$i]['teacher']))) ;

        }

        return view('user.week',['weekperiod'=>$weekPeriod]);

    }


}
