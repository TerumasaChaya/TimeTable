<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subject_table extends Model
{
    protected $table = "subject";

    //primaryKeyの変更
    protected $primaryKey = "id";
    protected $fillable = [
        "id","subject","area_Id","usePC","useHard","part","credits","role","firstLecture","firstExercises","secondLecture","secondExercises","subjectOverview"
    ];

    //hasMany設定
    public function room()
    {
        return $this->belongsTo('App\room_table','id');
    }
    //hasMany設定
    public function repTeacher()
    {
        return $this->belongsTo('App\repTeacher_table');

    }
    public function area()
    {
        return $this->belongsTo('App\area_table');

    }

    public  function  classDay()
    {
        return $this->hasMany('App\classDay_table','subject_Id');
    }

}
