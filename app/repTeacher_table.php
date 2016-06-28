<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class repTeacher_table extends Model
{
    protected $table = "repTeacher";

    protected $fillabel = [
        "id","teacher_Id","subject_Id","hrTeacherFlag"
    ];
    //hasMany設定
    public function Teacher()
    {
        return $this->belongsTo('App\Teacher_table');

    }
    //hasMany設定
    public function subject()
    {
        return $this->hasMany('App\subject_table');

    }
}
