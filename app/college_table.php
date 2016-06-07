<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class college_table extends Model
{

    protected $table = "college";

    protected $fillabel = [
        "id","collegeName","created_at","updated_at"
    ];
}
