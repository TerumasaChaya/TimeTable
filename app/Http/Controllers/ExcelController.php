<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Excel;
use App\account_table;
use App\college_table;
use Illuminate\Support\Facades\Input;

class ExcelController extends Controller
{
    public function getFile()
    {

        $fileName = public_path()."/xlsData/2016前期時間割.xlsx";
        Excel::load($fileName, function($reader){

//            $reader->setActiveSheetIndex(2);
//            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {
//                foreach ($row->getCellIterator() as $cell) {
//                    if ($cell->getValue() <> "") {
//                         var_dump($cell->getValue());
//                    }
//                }
//            }

            //所属カレッジテーブル作成
            //教員一覧テーブルの読み込み
            $reader->setActiveSheetIndex(16);

            //空の配列指定
            $var = array();
            
            foreach ($reader->getActiveSheet()->getRowIterator() as $row) {
                $flag = 0;

                foreach ($row->getCellIterator() as $cell) {

                        $flag += 1;

                        if($flag == 2){
                            if(preg_replace("/( |　)/", "", $cell->getValue()) != "") {
                                array_push($var, $cell->getValue());
                            }
                          break;
                        }
                }
            }

            $var = array_unique($var);
            $var = array_values($var);

            foreach ($var as $value){

                $college_table = new college_table();
                var_dump($value);
                $college_table->collegeName = $value;
                $college_table->save();
            }


        });
    }

}

