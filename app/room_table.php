<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class room_table extends Model
{
    protected $table = "room";



    protected $fillable = [
        "id","roomName","roomKind","roomCapa","building","Floor"
    ];
    //hasMany設定
    public function classDay()
    {
        return $this->hasMany('App\classDay_table','room_Id');
    }
    
}
