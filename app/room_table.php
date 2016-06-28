<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class room_table extends Model
{
    protected $table = "room";

    //primaryKeyの変更
    protected $primaryKey = "id";

    protected $fillable = [
        "id","roomName","roomKind","roomCapa","building","Floor"
    ];
    //hasMany設定
    public function subject()
    {
        return $this->hasMany('App\subject_table','room_Id');
    }
}
