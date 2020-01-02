<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'country',
        'city',
        'location',
        'code_postal'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }
}




