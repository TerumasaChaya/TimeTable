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

        return view('user/teacher-detail')->with("teacher",$teacher);
    }
    

}

