<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class area_table extends Model
{
    protected $table = "area";

    //primaryKeyの変更
    protected $primaryKey = "area_Id";

    protected $fillable = [
        "id","area_id","created_at","updated_at"
    ];
    //hasMany設定
    public function subject()
    {
        return $this->hasMany('App\subject_table');
    }
}
