<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class class_table extends Model
{

    protected $table = "class";

    protected $fillabel = [
        "id","teacher_Id","className","grade","dept","course","college","person"
    ];
    //hasMany設定
    public function classDay()
    {
        return $this->hasMany('App\classDay_table');

    }
    //hasMany設定
    public function users()
    {
        return $this->hasMany('App\users_table');

    }
}
