<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class account_table extends Model
{
    
    protected $table = "account";

    protected $fillabel = [
        "id","email","password"
    ];
}
