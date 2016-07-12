<?php
    //{管理者}教師一覧コントローラ
    //作成日:2016/7/4~2016/7/12
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

class adminTeacherController extends Controller
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

        return view('admin/teacher-list')->with($hash);
    }

    //教師編集画面表示
    public function edit($id)
    {
        //テーブルオブジェクト作成
        $teacher_table = new Teacher_table();

        //教師データ取得
        $teacher = $teacher_table::where("id", "=", $id)->first();
        
        return view('admin/teacher-edit')->with("teacher",$teacher);
    }

    //教師編集画面機能
    public function setTeacherImage(Request $request)
    {
        //テーブルオブジェクト作成
        $teacher_table = new Teacher_table();

        //送られたコメント取得&データベースにコメントを格納------------------------------------------------
        //渡された教師IDを格納
        $id = $request->input("teacherId");
        //渡されたコメントを格納
        $comment = $request->input("comment");
        //教師データ取得
        $teacher = $teacher_table::where("id", "=", $id)->first();
        //データベースにコメントを格納
        $teacher->comment = $comment;
        $teacher->save();

        //アップロードされた画像格納&データベースにファイル名格納-----------------------------------------
        //画像取得
        $image = $request->file('upfile');
        //画像を変更する場合のみ通す
        if($image) {
            //保存先
            $save_path = public_path() . '/teacherImage/';
            //画像名を変更し、拡張子を付属
            $name = str_random(20) . '.' . $image->getClientOriginalExtension();
            //アップロードしたファイルを保存先へ格納
            $request->file('upfile')->move($save_path, $name);
            //データベースにファイル名を格納
            $teacher->fileName = $name;
            $teacher->save();
        }

        return view('admin/teacher-edit')->with("teacher",$teacher);
    }

}

