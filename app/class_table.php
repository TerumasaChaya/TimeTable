<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class class_table extends Model
{

    protected $table = "class";

    protected $fillabel = [

        "id","teacher_Id","className","grade","dept","course","college","person"
    ];
    public function classDay()
    {
        return $this->hasManyThrough('App\subject_table', 'App\classDay_table', 'class_Id');

    }

    //hasMany設定
    public function users()
    {
        return $this->hasMany('App\users_table');

    }
}
