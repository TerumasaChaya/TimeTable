<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users_table extends Model
{
    protected $table = "users";

    //primaryKeyの変更
    protected $primaryKey = "id";

    protected $fillable = [
        "id","name","email","password","class","created_at","updated_at"
    ];
}
