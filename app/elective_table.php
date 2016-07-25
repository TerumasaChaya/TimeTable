<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class elective_table extends Model
{

    protected $table = "elective";

    //primaryKeyの変更
    protected $primaryKey = "id";

    protected $fillable = [
        "id",'user_Id','subject_Id','permit',"created_at","updated_at"
    ];
}
