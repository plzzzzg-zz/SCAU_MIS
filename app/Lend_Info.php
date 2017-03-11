<?php

namespace App;

use Carbon\Carbon;
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
//    protected $dates ='lend_time';

//    public function setLendTimeAttribute($date){
//        $this->attributes['lend_time'] = Carbon::createFromFormat('Y-m-d',$date);
//    }

    public function scopeNotreturned($query)
    {
        $query->where('status','未归还');
    }
}

