<?php
/**
 * Created by PhpStorm.
 * User: 2130109
 * Date: 2016/06/14
 * Time: 14:39
 */

namespace App\Http\Controllers;
use App\college_table;

class TestDataBaseController extends Controller{
    public function  test(){


        $members = college_table::find(100);
        return view('test',['id' => $members->collegeName]);
    }
}