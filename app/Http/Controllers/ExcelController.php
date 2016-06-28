<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Excel;
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

class ExcelController extends Controller
{

    public function getFile()
    {
        ini_set('max_execution_time', 30000);

        $this->college();
        $this->teacher();
        $this->class_a();
        $this->room();
        $this->area();
        $this->subject();
        $this->repteacher();
        $this->classDay();
    }
    //所属カレッジ
    private function college(){
        $fileName = public_path() . "/xlsData/2016前期時間割.xlsx";
        Excel::load($fileName, function ($reader) {

            //------------テーブル挿入テンプレート----------------------------------------------------------------------
            //所属カレッジテーブル作成
            //教員一覧テーブルの読み込み
            $reader->setActiveSheetIndex(16);

            //空の配列指定
            $var = array();
            $rowflag = false;

            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {
//
//            if ($rowflag == false) {
//                $rowflag = true;
//                continue;
//            }

                $flag = 0;

                foreach ($row->getCellIterator() as $cell) {

                    if ($flag == 1) {
                        if (preg_replace("/( |　)/", "", $cell->getValue()) != "") {
                            array_push($var, $cell->getValue());
                        }
                        break;
                    }
                    $flag += 1;
                }
            }
            //
            $rowflag = false;

            //重複削除
            $var = array_unique($var);
            $var = array_values($var);

            //データベース登録
            foreach ($var as $value){

                if($rowflag == true){
                    $college_table = new college_table();
                    $college_table->collegeName = $value;
                    $college_table->save();
                }
                $rowflag = true;
            }
            //------------テーブル挿入テンプレート----------------------------------------------------------------------

        });
    }

    //教師
    private function teacher(){
        $fileName = public_path() . "/xlsData/2016前期時間割.xlsx";
        Excel::load($fileName, function ($reader) {

            //教師テーブル作成
            //教員一覧テーブルの読み込み
            $reader->setActiveSheetIndex(16);

            //空の配列指定
            $var = array();
            $rowflag = false;

            //行と列
            $rcnt = 0;
            $ccnt = 0;

            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {

                if($rowflag == false){
                    $rowflag = true;
                    continue;
                }

                $flag = 0;

                foreach ($row->getCellIterator() as $cell) {

                    if($flag == 0){
                        if(preg_replace("/( |　)/", "", $cell->getValue()) != "") {
                            $var[$rcnt][$ccnt] = $cell->getValue();
                        }
                    }
                    if($flag == 1){
                        //var_dump($cell->getValue());
                        $college_table = college_table::where('collegeName', $cell->getValue())->first();
                        $var[$rcnt][$ccnt] = $college_table->id;
                    }
                    if($flag == 3){
                        if(preg_replace("/( |　)/", "", $cell->getValue()) != "") {
                            $var[$rcnt][$ccnt] = $cell->getValue();
                        }
                        break;
                    }
                    $flag += 1;
                    $ccnt += 1;
                }
                $rcnt += 1;
                $ccnt = 0;
            }

            //データベース登録
            foreach ($var as $value){
                $Teacher_table = new Teacher_table();
                $Teacher_table->TeacherName = $value[0];
                $Teacher_table->assignCollege_Id = $value[1];
                if(isset($value[3])){
                    $Teacher_table->hireForm = $value[3];
                }
                $Teacher_table->save();
            }
        });
    }

    //担当教師
    private function repteacher(){
        $fileName = public_path() . "/xlsData/2016前期時間割.xlsx";
        Excel::load($fileName, function ($reader) {

            //担当教師テーブル作成
            //元データシートの読み込み
            $reader->setActiveSheetIndex(1);

            //空の配列指定
            $var = array();
            $rowflag = 0;

            //行と列
            $rcnt = 0;
            $ccnt = 0;

            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {

                if($rowflag <= 0){
                    $rowflag += 1;
                    continue;
                }
                $flag = 0;

                foreach ($row->getCellIterator() as $cell) {

                    if($flag == 7){
                        if($cell->getValue() != null && preg_replace("/( |　)/", "", $cell->getValue()) != "") {
                            $subject_table = subject_table::where('subject', $cell->getValue())->first();
                            $var[$rcnt][$ccnt] = $subject_table->id;
                        }
                    }

                    if($flag == 13){
                        if($cell->getValue() != null && preg_replace("/( |　)/", "", $cell->getValue()) != "") {
                            $var[$rcnt][$ccnt] = $cell->getValue();
                        }
                    }

                    if($flag == 14){
                        if($cell->getValue() != null && preg_replace("/( |　)/", "", $cell->getValue()) != ""){
                            $Teacher_table = Teacher_table::where('TeacherName', $cell->getValue())->first();
                            $var[$rcnt][$ccnt] = $Teacher_table->id;
                        }else{
                            $var[$rcnt][$ccnt] = 1;
                        }
                        break;
                    }
                    $flag += 1;
                    $ccnt += 1;
                }
                $rcnt += 1;
                $ccnt = 0;

            }

            //データベース登録
            foreach ($var as $value){
                    //var_dump($value[7]);
                $repTeacher_table = new repTeacher_table();
                if(isset($value[7])){
                    $repTeacher_table->subject_Id = $value[7];
                }

                if(isset($value[13])){
                    $repTeacher_table->role = $value[13];
                }

                if(isset($value[14])){
                    $repTeacher_table->teacher_Id = $value[14];
                }
                $repTeacher_table->save();
            }

        });
    }

    //クラス
    private function class_a(){
        $fileName = public_path() . "/xlsData/2016前期時間割.xlsx";
        Excel::load($fileName, function ($reader) {

            //クラステーブル作成
            $reader->setActiveSheetIndex(14);

            //クラス名------------------------------------------------------------------------------
            $cn = array();
            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {
                $flag = 0;
                foreach ($row->getCellIterator() as $cell) {
                    if ($flag == 0) {
                        if (preg_replace("/( |　)/", "", $cell->getValue()) != "") {
                            array_push($cn, $cell->getValue());
                        }
                        break;
                    }
                    $flag += 1;
                }
            }

            //学年------------------------------------------------------------------------------
            $gr = array();
            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {
                $flag = 0;
                foreach ($row->getCellIterator() as $cell) {
                    if ($flag == 5) {
                        if (preg_replace("/( |　)/", "", $cell->getValue()) != "") {
                            array_push($gr, $cell->getValue());
                        }
                        break;
                    }
                    $flag += 1;
                }
            }

            //学科名------------------------------------------------------------------------------
            $dp = array();
            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {
                $flag = 0;
                foreach ($row->getCellIterator() as $cell) {
                    if ($flag == 2) {
                        if (preg_replace("/( |　)/", "", $cell->getValue()) != "") {
                            array_push($dp, $cell->getValue());
                        }
                        break;
                    }
                    $flag += 1;
                }
            }

            //コース名------------------------------------------------------------------------------
            $co = array();
            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {
                $flag = 0;
                foreach ($row->getCellIterator() as $cell) {
                    if ($flag == 3) {
                        if (preg_replace("/( |　)/", "", $cell->getValue()) != "") {
                            array_push($co, $cell->getValue());
                        }
                        break;
                    }
                    $flag += 1;
                }
            }

            //カレッジ------------------------------------------------------------------------------
            $cl = array();
            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {
                $flag = 0;
                foreach ($row->getCellIterator() as $cell) {
                    if ($flag == 9) {
                        if (preg_replace("/( |　)/", "", $cell->getValue()) != "") {
                            array_push($cl, $cell->getValue());
                        }
                        break;
                    }
                    $flag += 1;
                }
            }

            //クラス人数------------------------------------------------------------------------------
            $cs = array();
            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {
                $flag = 0;
                foreach ($row->getCellIterator() as $cell) {
                    if ($flag == 6) {
                        if (preg_replace("/( |　)/", "", $cell->getValue()) != "") {
                            array_push($cs, $cell->getValue());
                        }
                        break;
                    }
                    $flag += 1;
                }
            }

            //教師ID------------------------------------------------------------------------------
            $name = array();
            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {
                $flag = 0;
                foreach ($row->getCellIterator() as $cell) {
                    if ($flag == 8) {
                            array_push($name, $cell->getValue());
                        break;
                    }
                    $flag += 1;
                }
            }

            //クラステーブルに値を格納-------------------------------------------------------------
            for($i = 1; $i < count($name); $i++){
                $class_table = new class_table();
                //クラス名格納
                $class_table->className = $cn[$i];
                //学年格納
                if(isset($gr[$i])) {
                    $class_table->grade = $gr[$i];
                }
                //学科名格納
                if(isset($dp[$i])) {
                    $class_table->dept = $dp[$i];
                }
                //コース名
                if(isset($co[$i])) {
                    $class_table->course = $co[$i];
                }
                //カレッジ
                $class_table->college = $cl[$i];
                //クラス人数
                if(isset($cs[$i])) {
                    $class_table->person = $cs[$i];
                }
                //教師ID格納
                $Teacher_table = new Teacher_table();
                $r = $Teacher_table::where("TeacherName", '=', $name[$i])->first();
                if($r != null){
                    $class_table->teacher_Id = $r->id;
                }

                $class_table->save();
            }
        });
    }

    //教室
    private function room(){
        $fileName = public_path() . "/xlsData/2016前期時間割.xlsx";
        Excel::load($fileName, function ($reader) {

            //教室テーブル作成
            $reader->setActiveSheetIndex(17);

            //教室名------------------------------------------------------------------------------
            $rn = array();
            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {
                $flag = 0;
                foreach ($row->getCellIterator() as $cell) {
                    if ($flag == 0) {
                        if (preg_replace("/( |　)/", "", $cell->getValue()) != "") {
                            array_push($rn, $cell->getValue());
                        }
                        break;
                    }
                    $flag += 1;
                }
            }

            //教室種別------------------------------------------------------------------------------
            $rk = array();
            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {
                $flag = 0;
                foreach ($row->getCellIterator() as $cell) {
                    if ($flag == 1) {
                        if (preg_replace("/( |　)/", "", $cell->getValue()) != "") {
                            array_push($rk, $cell->getValue());
                        }
                        break;
                    }
                    $flag += 1;
                }
            }

            //教室定員------------------------------------------------------------------------------
            $rc = array();
            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {
                $flag = 0;
                foreach ($row->getCellIterator() as $cell) {
                    if ($flag == 2) {
                        if (preg_replace("/( |　)/", "", $cell->getValue()) != "") {
                            array_push($rc, $cell->getValue());
                        }
                        break;
                    }
                    $flag += 1;
                }
            }

            //号館名------------------------------------------------------------------------------
            $bd = array();
            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {
                $flag = 0;
                foreach ($row->getCellIterator() as $cell) {
                    if ($flag == 3) {
                        if (preg_replace("/( |　)/", "", $cell->getValue()) != "") {
                            array_push($bd, $cell->getValue());
                        }
                        break;
                    }
                    $flag += 1;
                }
            }

            //階名------------------------------------------------------------------------------
            $fl = array();
            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {
                $flag = 0;
                foreach ($row->getCellIterator() as $cell) {
                    if ($flag == 4) {
                        if (preg_replace("/( |　)/", "", $cell->getValue()) != "") {
                            array_push($fl, $cell->getValue());
                        }
                        break;
                    }
                    $flag += 1;
                }
            }

            //クラステーブルに値を格納-------------------------------------------------------------
            for($i = 1; $i < count($rn); $i++){
                $room_table = new room_table();
                //教室名格納
                $room_table->roomName = $rn[$i];
                //教室種別格納
                $room_table->roomKind = $rk[$i];
                //教室定員格納
                if(isset($rc[$i])) {
                    $room_table->roomCapa = $rc[$i];
                }
                //号館名格納
                if(isset($bd[$i])) {
                    $room_table->building = $bd[$i];
                }
                //階名格納
                if(isset($fl[$i])) {
                    $room_table->Floor = $fl[$i];
                }
                $room_table->save();
            }

        });
    }

    //分野
    private function area(){
        $fileName = public_path() . "/xlsData/2016前期時間割.xlsx";
        Excel::load($fileName, function ($reader) {

            //分野テーブル
            $reader->setActiveSheetIndex(15);

            //空の配列指定
            $area = array();

            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {
                $flag = 0;
                foreach ($row->getCellIterator() as $cell) {
                    if($flag == 2){
                        if(preg_replace("/( |　)/", "", $cell->getValue()) != "") {
                            array_push($area, $cell->getValue());
                        }
                        break;
                    }
                    $flag += 1;
                }
            }

            $area = array_unique($area);
            $area = array_values($area);

            for($i = 1; $i < count($area); $i++){
                $area_table = new area_table();
                $area_table->Area = $area[$i];
                $area_table->save();
            }

        });
    }

    //科目
    private function subject(){
        $fileName = public_path() . "/xlsData/2016前期時間割.xlsx";
        Excel::load($fileName, function ($reader) {

            //科目テーブル作成
            $reader->setActiveSheetIndex(15);

            //科目名------------------------------------------------------------------------------
            $sub = array();
            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {
                $flag = 0;
                foreach ($row->getCellIterator() as $cell) {
                    if ($flag == 0) {
                        if (preg_replace("/( |　)/", "", $cell->getValue()) != "") {
                            array_push($sub, $cell->getValue());
                        }
                        break;
                    }
                    $flag += 1;
                }
            }

            //分野ID------------------------------------------------------------------------------
            $areaId = array();
            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {
                $flag = 0;
                foreach ($row->getCellIterator() as $cell) {
                    if($flag == 2){
                        if($cell->getValue() == "分野"){
                            break;
                        }
                        if(preg_replace("/( |　)/", "", $cell->getValue()) != "") {
                            $area_table = new area_table();
                            $r = $area_table::where("Area", '=', $cell->getValue())->first();
                            if($r != null) {
                                array_push($areaId, $r->id);
                            }
                        }
                        break;
                    }
                    $flag += 1;
                }
            }

            //区分------------------------------------------------------------------------------
            $part = array();
            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {
                $flag = 0;
                foreach ($row->getCellIterator() as $cell) {
                    if ($flag == 11) {
                        if (preg_replace("/( |　)/", "", $cell->getValue()) != "") {
                            array_push($part, $cell->getValue());
                        }
                        break;
                    }
                    $flag += 1;
                }
            }

            //単位------------------------------------------------------------------------------
            $cre = array();
            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {
                $flag = 0;
                foreach ($row->getCellIterator() as $cell) {
                    if ($flag == 12) {
                        if (preg_replace("/( |　)/", "", $cell->getValue()) != "") {
                            array_push($cre, $cell->getValue());
                        }
                        break;
                    }
                    $flag += 1;
                }
            }

            //前期講義数------------------------------------------------------------------------------
            $fl = array();
            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {
                $flag = 0;
                foreach ($row->getCellIterator() as $cell) {
                    if ($flag == 7) {
                        if (preg_replace("/( |　)/", "", $cell->getValue()) != "") {
                            array_push($fl, $cell->getValue());
                        }
                        break;
                    }
                    $flag += 1;
                }
            }

            //前期演習数------------------------------------------------------------------------------
            $fe = array();
            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {
                $flag = 0;
                foreach ($row->getCellIterator() as $cell) {
                    if ($flag == 8) {
                        if (preg_replace("/( |　)/", "", $cell->getValue()) != "") {
                            array_push($fe, $cell->getValue());
                        }
                        break;
                    }
                    $flag += 1;
                }
            }

            //後期講義数------------------------------------------------------------------------------
            $sl = array();
            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {
                $flag = 0;
                foreach ($row->getCellIterator() as $cell) {
                    if ($flag == 9) {
                        if (preg_replace("/( |　)/", "", $cell->getValue()) != "") {
                            array_push($sl, $cell->getValue());
                        }
                        break;
                    }
                    $flag += 1;
                }
            }

            //後期演習数...Excelデータでは講実！！---------------------------------------------------
            $se = array();
            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {
                $flag = 0;
                foreach ($row->getCellIterator() as $cell) {
                    if ($flag == 10) {
                        if (preg_replace("/( |　)/", "", $cell->getValue()) != "") {
                            array_push($se, $cell->getValue());
                        }
                        break;
                    }
                    $flag += 1;
                }
            }

            //科目概要------------------------------------------------------------------------------
            $subover = array();
            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {
                $flag = 0;
                foreach ($row->getCellIterator() as $cell) {
                    if ($flag == 13) {
                        if (preg_replace("/( |　)/", "", $cell->getValue()) != "") {
                            array_push($subover, $cell->getValue());
                        }
                        break;
                    }
                    $flag += 1;
                }
            }

            //科目テーブルに値を格納-------------------------------------------------------------
            for($i = 1; $i < count($sub); $i++){
                $subject_table = new subject_table();
                //科目名格納
                $subject_table->subject = $sub[$i];
                //分野ID格納
                $subject_table->area_Id = $areaId[$i - 1];
                //区分格納
                $subject_table->part = $part[$i];
                //単位格納
                $subject_table->credits = $cre[$i];
                //前期講義数格納
                $subject_table->firstLecture = $fl[$i];
                //前期演習数格納
                $subject_table->firstExercises = $fe[$i];
                //後期講義数格納
                $subject_table->secondLecture = $sl[$i];
                //後期演習数格納...Excelデータでは講実！！
                $subject_table->secondExercises = $se[$i];
                //科目概要格納
                if(isset($subover[$i])) {
                    $subject_table->subjectOverview = $subover[$i];
                }
                $subject_table->save();
            }

            //科目テーブル作成...元データシート切り替え！！
            $reader->setActiveSheetIndex(1);

            //使用ハード名------------------------------------------------------------------------------
            //元データから使用ハードを配列に格納
            $hard = array();
            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {
                $flag = 0;
                foreach ($row->getCellIterator() as $cell) {
                    if ($flag == 23) {
                        array_push($hard, $cell->getValue());
                        break;
                    }
                    $flag += 1;
                }
            }

            //元データから科目名を配列に格納
            $hardSub = array();
            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {
                $flag = 0;
                foreach ($row->getCellIterator() as $cell) {
                    if ($flag == 7) {
                        array_push($hardSub, $cell->getValue());
                        break;
                    }
                    $flag += 1;
                }
            }

            //使用ハードが存在する行を検索し、ヒットした科目名を配列に格納
            $i = 0;
            $hardSubHit = array();
            foreach($hard as $hardHit){
                if($hardHit != ""){
                    array_push($hardSubHit,$hardSub[$i]);
                }
                $i += 1;
            }
            //元データから使用ハードを配列に格納(空白無し)
            $hard = array();
            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {
                $flag = 0;
                foreach ($row->getCellIterator() as $cell) {
                    if ($flag == 23) {
                        if (preg_replace("/( |　)/", "", $cell->getValue()) != "") {
                            array_push($hard, $cell->getValue());
                        }
                        break;
                    }
                    $flag += 1;
                }
            }

            $i = 0;
            //科目テーブルの使用ハード名を格納
            foreach($hardSubHit as $value){
                $subject_table = new subject_table();
                $r = $subject_table::where("subject",'=',$value)->first();
                if($r != null){
                    $std = $hard[$i];
                    $r->useHard = $std;
                    $r->save();
                }
                $i += 1;
            }
        });
    }

    //クラス曜日
    private function classDay(){
        $fileName = public_path() . "/xlsData/2016前期時間割.xlsx";
        Excel::load($fileName, function ($reader) {

            //科目テーブル作成
            $reader->setActiveSheetIndex(1);

            //科目(データ格納時にしようするfor文用)----------------------------------------------
            $sub = array();
            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {
                $flag = 0;
                foreach ($row->getCellIterator() as $cell) {
                    if ($flag == 7) {
                        array_push($sub, $cell->getValue());
                        break;
                    }
                    $flag += 1;
                }
            }

            //クラス------------------------------------------------------------------------------
            $class = array();
            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {
                $flag = 0;
                foreach ($row->getCellIterator() as $cell) {
                    if ($flag == 2) {
                        if (preg_replace("/( |　)/", "", $cell->getValue()) != "") {
                            array_push($class, $cell->getValue());
                        }
                        break;
                    }
                    $flag += 1;
                }
            }

            //曜日------------------------------------------------------------------------------
            $day = array();
            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {
                $flag = 0;
                foreach ($row->getCellIterator() as $cell) {
                    if ($flag == 15) {
                        if(strlen($cell->getValue()) > 7){
                            array_push($day, "");
                        }else{
                            array_push($day, $cell->getValue());
                        }
                        break;
                    }
                    $flag += 1;
                }
            }

            //教室------------------------------------------------------------------------------
            $room = array();
            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {
                $flag = 0;
                $i = 0;
                foreach ($row->getCellIterator() as $cell) {
                    if ($flag == 17) {
                        if($day[$i] == ""){
                            array_push($room, "");
                        }else{
                            array_push($room, $cell->getValue());
                        }
                        break;
                    }
                    $flag += 1;
                }
            }

            //時限------------------------------------------------------------------------------
            $per = array();
            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {
                $flag = 0;
                foreach ($row->getCellIterator() as $cell) {
                    if ($flag == 16) {
                        array_push($per, $cell->getValue());
                        break;
                    }
                    $flag += 1;
                }
            }

            //var_dump($day,$per);

            //クラス曜日テーブルに値を格納-------------------------------------------------------------
            for($i = 1; $i < count($day); $i++){
                $subject_table = new subject_table();
                $class_table = new class_table();
                $classDay_table = new classDay_table();
                $room_table = new room_table();
                //曜日格納
                if(isset($day[$i])) {
                    $classDay_table->day = $day[$i];
                }
                //時限格納
                if(isset($per[$i])) {
                    $classDay_table->period = $per[$i];
                }
                //科目ID格納
                $s = $subject_table::where("subject",'=',$sub[$i])->first();
                if($s != null){
                    $classDay_table->subject_Id = $s->id;
                    $classDay_table->save();
                }
                //教室ID格納
                $r = $room_table::where("roomName","=",$room[$i])->first();
                if($r != null){
                    $classDay_table->room_Id = $r->id;
                    $classDay_table->save();
                }
                //クラスID格納
                $c = $class_table::where("className",'=',$class[$i])->first();
                if($c != null){
                    $classDay_table->class_Id = $c->id;
                    $classDay_table->save();
                }

                $classDay_table->save();
            }
        });
    }
}

