<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher_table extends Model
{
    protected $table = "Teacher";

    protected $fillable = [
        "id","TeacherName","assignCollege_Id","hideForm","fileName","comment"
        
    ];

    //hasMany設定
    public function college()
    {
        return $this->belongsTo('App\college_table');

    }
    //hasMany設定
    public function mainTeacher()
    {
        return $this->hasMany('App\classDay_table','id');

    }

    public function subTeacher()
    {
        return $this->hasMany('App\classDay_table','id');

    }

}
