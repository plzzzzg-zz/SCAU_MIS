<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lend_Info extends Model
{
    //
    protected $fillable = [
        'lend_from_contact',
        'lend_contact',
        'lend_from',
        'lend_num',
        'lend_to',
        'name',
        'note',
    ];
    protected $table='lend_info';
}
