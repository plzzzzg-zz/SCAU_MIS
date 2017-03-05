<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    //
    protected $fillable = ['name','belongs_to','place','note','total','available'];
}
