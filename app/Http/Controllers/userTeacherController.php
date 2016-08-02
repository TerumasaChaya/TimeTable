<?php
    //{ユーザ}教師一覧コントローラ
    //作成日:2016/7/12~2016/7/
    //作成者:村上 慧

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Excel;
use \File;
use Carbon\Carbon;
use App\account_table;
use App\college_table;
use App\class_table;
use App\classDay_table;
use App\room_table;
use App\area_table;
use App\subject_table;
use App\repTeacher_table;
use App\Teacher_table;
use Illuminate\Support\Facades\Input;

class userTeacherController extends Controller
{

    //教師一覧
    public function index()
    {
        //教師の名前一覧を取得-----------------------------------------------------------------------------
        //格カレッジデータを格納する配列
        $it = array();
        $game = array();
        $desi = array();
        $cg = array();
        $eng = array();
        $kyo = array();
        $sin = array();
        $new = array();
        //テーブルオブジェクト作成
        $college_table = new college_table();
        $teacher_table = new Teacher_table();

        //IT
        $row = $college_table::where("collegeName", "=", "IT")->first();
        $it = $teacher_table::where("assignCollege_Id", "=", $row->id)->get();
        //ゲーム
        $row = $college_table::where("collegeName", "=", "ゲーム")->first();
        $game = $teacher_table::where("assignCollege_Id", "=", $row->id)->get();
        //デザイン
        $row = $college_table::where("collegeName", "=", "デザイン")->first();
        $desi = $teacher_table::where("assignCollege_Id", "=", $row->id)->get();
        //CG
        $row = $college_table::where("collegeName", "=", "CG")->first();
        $cg = $teacher_table::where("assignCollege_Id", "=", $row->id)->get();
        //英会話
        $row = $college_table::where("collegeName", "=", "英会話")->first();
        $eng = $teacher_table::where("assignCollege_Id", "=", $row->id)->get();
        //教務
        $row = $college_table::where("collegeName", "=", "教務")->first();
        $kyo = $teacher_table::where("assignCollege_Id", "=", $row->id)->get();
        //進路
        $row = $college_table::where("collegeName", "=", "進路")->first();
        $sin = $teacher_table::where("assignCollege_Id", "=", $row->id)->get();
        //新任
        $row = $college_table::where("collegeName", "=", "新任")->first();
        $new = $teacher_table::where("assignCollege_Id", "=", $row->id)->get();

        $img = public_path()."/teacherImage/image.jpg";

        //viewへ配列を渡すためのハッシュ配列
        $hash = array(
            "it"  => $it,
            "game"   => $game,
            "desi" => $desi,
            "cg" => $cg,
            "eng" => $eng,
            "kyo" => $kyo,
            "sin" => $sin,
            "new" => $new,
            "img" => $img
        );

        return view('user/teacher-list')->with($hash);
    }

    //教師詳細画面表示
    public function detail($id)
    {
        //テーブルオブジェクト作成
        $teacher_table = new Teacher_table();

        //教師データ取得
        $teacher = $teacher_table::where("id", "=", $id)->first();

        //曜日、時限取得
        //現在時刻の取得
        $date = new Carbon(Carbon::now());

        //曜日配列の生成
        $week = array('日', '月', '火', '水', '木', '金', '土');

        //現在の曜日取得
        $w = $week[$date->dayOfWeek];

        //時限用変数
        $period = -1;

        //時限判定
        if($date->hour == 9 &&  $date->minute >= 15){
            $period = 1;
        }elseif($date->hour == 10 && $date->minute <= 45){
            $period = 1;
        }elseif($date->hour == 11) {
            $period = 2;
        }elseif($date->hour == 12 && $date->minute <= 30) {
            $period = 2;
        }elseif($date->hour == 13 && $date->minute >= 30){
            $period = 3;
        }elseif($date->hour == 14){
            $period = 3;
        }elseif($date->hour == 15 && $date->minute >= 15) {
            $period = 4;
        }elseif($date->hour == 16 && $date->minute <= 45){
            $period = 4;
        }elseif($date->hour == 17) {
            $period = 5;
        }elseif($date->hour == 18 && $date->minute <= 30){
            $period = 5;
        }elseif($date->hour == 7 && $date->minute >= 30) {
            $period = 0;
        }elseif($date->hour == 8){
            $period = 0;
        }

        //教室名
        $classDay_table = new classDay_table();
        $now = $classDay_table::where("day", "=", $w)
            ->where("period", "=", $period)
            ->where("subrep_m", "=", $id)
            ->first();

        if($now == null){
            $classDay_table = new classDay_table();
            $now = $classDay_table::where("day", "=", $w)
                ->where("period", "=", $period)
                ->where("subrep_t", "=", $id)->first();
        }

        return view('user/teacher-detail')->with("teacher",$teacher)->with("now",$now);
    }
    
}

