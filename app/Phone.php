<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    //

    protected $fillable = [
        'phone_movil',
        'phone_local',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}




