<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use App\subject_table;
use App\elective_table;
use App\users_table;
use Auth;
use Request;

class ElectiveController extends Controller
{
    //ログインユーザーの選択科目一覧作成 <user>
    public function index()
    {
        //空の配列
        $val = array();

        //選択科目テーブルの全行取得
        $elective_table = elective_table::where('id','!=','')->get();

        //科目テーブル読み込み (選択科目のみ)
        $allElective = subject_table::where('elective','=',true)->get();

        //val に全選択科目を保存
        foreach ($allElective as $value){
            $val[$value->id] = $value;
        }

        //全選択科目
        foreach ($allElective as $sub) {
            //選択科目テーブル
            foreach ($elective_table as $el) {
                //ログインユーザーIDと データベースに保存しているユーザーIDが同じかつ
                //すでに申請している科目の場合
                if (Auth::user()->id == $el->user_Id && $sub->id == $el->subject_Id) {
                    //全選択科目 $val から 科目を削除
                    unset($val[$sub->id]);
                }
            }
        }
        //view に $val の値を渡す
        return view("/user/offer-elective")->with("subName",$val);
    }

    //申請確認画面 <user>
    public function appConfirm($id){
        //引数 (科目ID)

        //テーブルオブジェクト作成
        $subject_table = new subject_table();

        //科目データ取得
        $subject = $subject_table::where("id", "=", $id)->first();

        return view('user/confirm-elective')->with("subject",$subject);
    }

    //データベース登録 <user>
    public function insert($id){
        //引数 (科目ID)

        //テーブルオブジェクト作成
        $elective_table = new elective_table();

        //ログインユーザーのID の登録
        $elective_table->user_Id = Auth::user()->id;
        //受け取った科目ID の登録
        $elective_table->subject_Id = $id;

        $elective_table->save();

        //空の配列
        $val = array();

        //選択科目テーブルの全行取得
        $elective_table = elective_table::where('id','!=','')->get();

        //科目テーブル読み込み (選択科目のみ)
        $allElective = subject_table::where('elective','=',true)->get();

        //val に全選択科目を保存
        foreach ($allElective as $value){
            $val[$value->id] = $value;
        }

        //全選択科目
        foreach ($allElective as $sub) {
            //選択科目テーブル
            foreach ($elective_table as $el) {
                //ログインユーザーIDと データベースに保存しているユーザーIDが同じかつ
                //すでに申請している科目の場合
                if (Auth::user()->id == $el->user_Id && $sub->id == $el->subject_Id) {
                    //全選択科目 $val から 科目を削除
                    unset($val[$sub->id]);
                }
            }
        }

        //view に $val の値を渡す
        return view("/user/offer-elective")->with("subName",$val);
    }

    //申請済み選択科目一覧<user>
    public  function appList(){
        //空の配列
//        $val = array();
        $result = array();
        $permit = array();

        //選択科目テーブルのログインユーザーの行を取得
        $elective_table = elective_table::where('user_Id','=',Auth::user()->id)->get();

        //elective_table が空のとき
        if($elective_table->isEmpty()){
            return view('user/elective-emp')->with('msg',"現在 申請している科目はありません")->with('title',"選択科目一覧");
        }
        
        //科目テーブル読み込み (選択科目のみ)
        $allElective = subject_table::where('elective','=',true)->get();

        //val に全選択科目を保存
//        foreach ($allElective as $value){
//            $val[$value->id] = $value;
//        }

        //全選択科目
        foreach ($allElective as $sub) {
            //選択科目テーブル
            foreach ($elective_table as $el) {
                //ログインユーザーIDと データベースに保存しているユーザーIDが同じかつ
                //すでに申請している科目の場合
                if ($sub->id == $el->subject_Id) {
                    //全選択科目 $val から 科目を削除
                    $result[$el->id] = $sub;
                    if($el->permit == false){
                        $permit[$sub->id]='未承認';
                    }else{
                        $permit[$sub->id]='承認済み';
                    }
                }
            }
        }

        //view に $val の値を渡す
        return view("/user/app-list")->with("appEl",$result)->with('permit', $permit);
    }

    //認証する科目の一覧作成<admin>
    public function permitSubList(){

        //空の配列
        $val = array();

        //選択科目テーブルの全行取得
        $elective_table = elective_table::where('id','!=','')->get();

        //elective_table が空のとき
        if($elective_table->isEmpty()){
            return view('admin/elective-emp')->with('msg',"現在 申請している生徒はいません")->with('title',"選択科目一覧");
        }

        //科目テーブル読み込み 選択科目フラグが true
        $allElective = subject_table::where('elective','=',true)->get();

        foreach ($allElective as $value){
            foreach ($elective_table as $el){
                //electiveテーブルに存在する科目を subjectテーブルから探して格納
                if($value->id == $el->subject_Id){
                    $val[$el->subject_Id] = $value;
                }
            }
        }

        //view に $val の値を渡す
        return view("/admin/elective-list")->with("subName",$val);
    }

    //認証待ち 生徒一覧<admin>
    public function studentList($id){
        //引数 (科目ID)

        //空の配列
        $val = array();
        //一時退避配列
        $temporary = array();

        $student = array();

        //渡された科目IDと等しい electiveテーブルの行を取得、選択科目フラグが false
        $elective_table = elective_table::where('subject_Id','=',$id)->where('permit','=',false)->get();

        //elective_table が空のとき
        if($elective_table->isEmpty()){
            return view('admin/elective-emp')->with('msg',"現在 申請している生徒はいません")->with('title',"認証待ち生徒 一覧");
        }

        //科目名取得
        $subName = subject_table::where('id','=',$id)->get()->first();
        $subName = $subName->subject;

        foreach ($elective_table as $el){
            $val[$el->id] = $el;
        }
        //一時退避配列にユーザーテーブルの idが
        //elective_table に保存したuser_Id と等しい行を保存
        foreach ($val as $value){
            $temporary[$value->id] = users_table::where('id','=',$value->user_Id)->get();
        }
        $cnt = 1;
        $order = array();
        foreach ($temporary as $st){
            foreach ($st as $stval){
                $student[$stval->id] = $stval;
                $order[$stval->id] = $cnt++;
            }
        }

        //申請待ち生徒一覧view
        return view('admin/elective-student')->with("student",$student)->with("subject",$subName)->with("order",$order);
    }

    //認証確認 生徒一覧<admin>
    public function result(){
        //認証許可した 生徒一覧
        $result = array();

        //送られてきた値を取得
        $id = Input::get('id');
        $name = Input::get('name');
        $class = Input::get('class');
        $subject = Input::get('subject');

        $subId = subject_table::where('subject','=',$subject)->get()->first();
        $subId = $subId->id;
        $cnt = 0;

        //チェックフラグを保存 on|emp
        foreach ($id as $value){
            $check[$cnt] = Input::get($value);
            $cnt+=1;
        }
        $cnt = 0;

        //チェックボックスがオンのとき、array() にid,name,classの値を保存
        foreach ($check as $value){
            if($value == "on"){
                $result[$cnt]["id"] = $id[$cnt];
                $result[$cnt]["name"] = $name[$cnt];
                $result[$cnt]["class"] = $class[$cnt];
            }
            $cnt+=1;
        }
        //チェックされていないとき
        if(empty($result)){
            return view('admin/elective-emp')->with('msg',"選択している生徒がいません")->with('title',"申請許可 生徒一覧");
        }

        //結果表示view
        return view('admin/elective-result')->with("result",$result)->with("subject",$subject)->with("subId",$subId);
    }

    //認証した生徒のデータベース更新<admin>
    public function update(){

        //送られてきた値を取得
        $id = Input::get('id');
        //科目ID
        $subId = Input::get('subject');

        //選択科目テーブルの申請を許可した科目の行を取得
        $elective_table = elective_table::where('subject_Id','=',$subId)->get();

        //送られてきたユーザーID と等しい選択科目テーブルの、許可フラグをtrue
        //elective_table のpermit 更新
        foreach ($elective_table as $el){
            foreach ($id as $value){
                if($el->user_Id == $value){
                    $el->permit = true;
                    $el->save();
                }
            }
        }
        //選択科目一覧に戻る
        return redirect('admin/elective/');
    }

    //認証済みの生徒一覧<admin>
    public function authorized($id){
        //引数 (科目ID)

        //空の配列
        $val = array();
        //一時退避配列
        $temporary = array();

        $student = array();

        //渡された科目IDと等しい electiveテーブルの行を取得、選択科目フラグが true
        $elective_table = elective_table::where('subject_Id','=',$id)->where('permit','=',true)->get();

        //elective_table が空のとき
        if($elective_table->isEmpty()){
            return view('admin/elective-emp')->with('msg',"現在 認証している生徒はいません")->with('title',"認証済み生徒 一覧");
        }

        //科目名取得
        $subName = subject_table::where('id','=',$id)->get()->first();
        $subName = $subName->subject;

        foreach ($elective_table as $el){
            $val[$el->id] = $el;
        }
        //一時退避配列に
        //ユーザーテーブルのid がelective_table に保存したuser_Id と等しい行を保存
        foreach ($val as $value){
            $temporary[$value->id] = users_table::where('id','=',$value->user_Id)->get();
        }

        foreach ($temporary as $st){
            foreach ($st as $stval){
                $student[$stval->id] = $stval;
            }
        }

        //申請待ち生徒一覧view
        return view('admin/elective-authorized')->with("student",$student)->with("subject",$subName);
    }

    //認証取消 確認
    public function delConfirm(){
        //認証取消した 生徒一覧
        $result = array();

        //送られてきた値を取得
        $id = Input::get('id');
        $name = Input::get('name');
        $class = Input::get('class');
        $subject = Input::get('subject');

        //科目ID 取得
        $subId = subject_table::where('subject','=',$subject)->get()->first();
        $subId = $subId->id;

        $cnt = 0;

        //チェックフラグを保存 on|emp
        foreach ($id as $value){
            $check[$cnt] = Input::get($value);
            $cnt+=1;
        }
        $cnt = 0;

        //チェックボックスがオンのとき、result() にid,name,classの値を保存
        foreach ($check as $value){
            if($value == "on"){
                $result[$cnt]["id"] = $id[$cnt];
                $result[$cnt]["name"] = $name[$cnt];
                $result[$cnt]["class"] = $class[$cnt];
                $cnt+=1;
            }
        }

        //結果表示view
        return view('admin/elective-delete')->with("result",$result)->with("subject",$subject)->with("subId",$subId);
    }

    //認証取消
    public function delete(){

        //送られてきた値を取得
        //ユーザーID
        $id = Input::get('id');
        //科目ID
        $subId = Input::get('subject');

        //選択科目テーブルの申請を許可した科目の行を取得
        $elective_table = elective_table::where('subject_Id','=',$subId)->get();

        //送られてきたユーザーID と等しい選択科目テーブルの、許可フラグをfalse
        //elective_table のpermit 更新
        foreach ($elective_table as $el){
            foreach ($id as $value){
                if($el->user_Id == $value){
                    $el->permit = false;
                    $el->save();
                }
            }
        }
        //選択科目一覧に戻る
        return redirect('admin/elective/');
    }
}