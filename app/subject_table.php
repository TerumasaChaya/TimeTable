<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subject_table extends Model
{
    protected $table = "subject";

    //primaryKeyの変更
    protected $primaryKey = "id";
    protected $fillable = [
        "id","subject","area_Id","usePC","useHard","part","credits","role","firstLecture","firstExercises","secondLecture","secondExercises","subjectOverview","elective"
    ];

    //hasMany設定
    public function repTeacher()
    {
        return $this->hasMany('App\repTeacher_table','subject_Id');

    }
    public function area()
    {
        return $this->belongsTo('App\area_table');

    }

    public  function  classDay()
    {
        return $this->hasMany('App\classDay_table','subject_Id');
    }
    public function elective()
    {
        return $this->hasMany('elective_table','subject_Id');
    }

}
