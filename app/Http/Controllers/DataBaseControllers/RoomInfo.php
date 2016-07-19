<?php
/**
 * Created by PhpStorm.
 * User: 2130109
 * Date: 2016/07/19
 * Time: 14:04
 */

namespace App\Http\Controllers\DataBaseControllers;

use App\Http\Controllers\Controller;
use App\room_table;

class RoomInfo extends Controller
{
    public function getRoomList(){

        $roomList1 = room_table::where('building','=','1号館')->get();
        $roomList2 = room_table::where('building','=','2号館')->get();
        $roomList3 = room_table::where('building','=','3号館')->get();
        $otherRoom = room_table::where('building','=','')->get();

        return view('user.room-list',
            [
                'roomList1' => $roomList1,
                'roomList2' => $roomList2,
                'roomList3' => $roomList3,
                'otherRoom' => $otherRoom
            ]
        );
    }

    public function getRoomInfo($id){
        $roomInfo = room_table::where('id','=',$id)->first();
        return view('user.room-info',['roomInfo' => $roomInfo]);
    }
}